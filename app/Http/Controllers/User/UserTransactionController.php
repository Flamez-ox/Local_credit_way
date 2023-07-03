<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Notify;
use App\Models\OTP;
use App\Models\TransferTable;
use App\Models\WireTable;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserTransactionController extends Controller
{
    //
    public function send_money(){

        $users = Auth::user();

        return view('user.pages.transfer',compact('users'));
    }


    public function send_money_submit(Request $request){

        $now = \Str::random(4);
        $num = rand(627541, 819761);
        $invoice = $now.$num;
      

        $balance =  User::where('id', $request->user()->id)->first();
        
        $userID = $request->user()->id;
        

        $request->validate([

            'acct_number' => 'required',
            'amount' => 'required',
            'name' => 'required',
            'description' => 'required|max:50',
           
        ], [
            'acct_number' => 'Account Number shoud not be empty. ',
            'description' => 'Description should not be empty and must not be more than 50 words.',
        ]);

        if($balance->acct_balance >= $request->amount){
            
            $transfer = new TransferTable();
            $transfer->acct_name = $request->name;
            $transfer->acct_number = $request->acct_number;
            $transfer->amount = $request->amount;
            $transfer->Description = $request->description;
            $transfer->invoice = $invoice;
            $transfer->user_id = $userID;
            $transfer->save();

            $newBalance = $balance->acct_balance - $request->amount;
            $updateUserBalance = User::where('id', $request->user()->id)->update(['acct_balance'=>$newBalance]);
            $receiverbalance = User::select('acct_balance')->where( 'acct_number', $request->acct_number)->first();

                if ($receiverbalance) {
                    $newReceiverBalance = $receiverbalance->acct_balance +  $request->amount;
                    $updateBeneficiaryBalance = User::where('acct_number', $request->acct_number)->update(['acct_balance'=>$newReceiverBalance]);
                   

                     return redirect()->back()->with('success', 'Money sent');
                }

                return redirect()->route('user_dashboard')->with('success', 'Money sent');

        }else{
            return redirect()->back()->with('error', 'Insuficient Balance'); 
        }
    }

    public function view_pin($id)
    {
        $users = Auth::user();

        $rand = rand(127548, 919768);
        $otp =  new OTP;
        $otp->pins = $rand;
        $otp->wire_id = $id;
        $otp->save();

        $subject = 'noreply Notification';
        $message = 'Your pin Verification is  <h4 style="color:green;">'. $rand. '</h4>. <p><b>This pin will not be valid if redirected and the transaction will be reversed</b></p>';
        


                     require 'PHPMailer/vendor/autoload.php';
                        $mail = new PHPMailer;
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();                                            
                            $mail->Host       = 'stmortgage.online';                 
                            $mail->SMTPAuth   = false;                                   
                            $mail->Username   = "support@stmortgage.online";                     
                            $mail->Password   = "user@test.com";                               
                            $mail->SMTPSecure = 'tls';      
                            $mail->Port       = 587;  
                            $mail->SMTPOptions = array (
                                'ssl' => array (
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            $mail->setFrom('support@stmortgage.online', 'Mortgage');
                            $mail->addAddress($users->email,$users->surname );     //$users->email
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();

                    if($send){
                        return view('user.pages.pin_verify',compact('id'))->with('Success', 'Please Check your email');
                    }else{
                        return redirect()->back()->with('error', 'Not working for sending pin');
                    }

        
    }

    Public function verify_pin(Request $request){

        $users = Auth::user();

        
        $request->validate([

            'pin' => 'required',
        ]);

        
        $wire_transaction = OTP::with('rwire')->where('wire_id',$request->id)->where('pins',$request->pin)->first();

        $otp =  OTP::where('pins', $request->pin)->first();

        // $otp =  OTP::where('pins', $data['tokenValue'])->exist();

        if(!$otp)
        {
            return redirect()->route('wire_money')->with('error', 'OTP is not correct');      
        }else{
            $otp->pins = 0;
             $otp->update();


            
            $wire_transaction->rwire->pin_verify = 'Yes';
            $wire_transaction->rwire->update();
             
            return redirect()->route('user_dashboard')->with('success', 'Your Transaction is being Processed');
        };
            
            
    }
    public function transactions(){

        $users = Auth::user();
        $history = TransferTable::with('rUser')->where('user_id',$users->id)->orWhere('acct_number', $users->acct_number)->Orderby('created_at','desc')->get();


        return view('user.pages.transactions',compact('users', 'history'));
    }

    public function wire_transaction(){

        $users = Auth::user();
        $history = WireTable::with('rUser')->where('user_id',$users->id)->Orderby('created_at','desc')->get();


        return view('user.pages.wire_transactions',compact('users', 'history'));
    }

    public function transaction_history($id){

        $users = Auth::user();
        $history = TransferTable::with('rUser')->where('id',$id)->get();


        return view('user.pages.transaction_history',compact('users', 'history'));
    }

    public function wire_transaction_history($id){

        $users = Auth::user();
        $history = WireTable::with('rUser')->where('id',$id)->get();


        return view('user.pages.wire_transaction_history',compact('users', 'history'));
    }

    public function transaction_statement(){

        $time = Carbon::now()->subMonth()->month;
       

        $users = Auth::user();
        $statement = TransferTable::with('rUser')->where('user_id',$users->id)->orWhere('acct_number', $users->acct_number)->get();
        $wstatement = WireTable::with('rUser')->where('user_id',$users->id)->Orderby('created_at','desc')->get();
       


        return view('user.pages.transaction_statement',compact('users', 'statement', 'time','wstatement'));
    }



    //WIRE AND INTERNATIONAL TRANSACTIONS


    public function wire_money(){

        $users = Auth::user();

        return view('user.pages.wire_transfer',compact('users'));
    }

    public function wire_money_submit(Request $request){

        $now = \Str::random(4);
        $num = rand(12754, 31976);
        $invoice = $now.$num;
      

        $balance =  User::where('id', $request->user()->id)->first();
        
        $userID = $request->user()->id;
       
        

        $request->validate([

            'acct_number' => 'required|max:25|min:7',
            'iban' => 'required|max:50',
            'swiftcode' => 'required|max:20',
            'amount' => 'required',
            'name' => 'required',
            'bank_name' => 'required',
            'description' => 'required|max:100',
           
        ], [
            'acct_number' => 'Account Number shoud not be empty ',
            'description' => 'Description should not be empty and must not be more than 50 words.',
            'iban' => 'IBAN should not be empty and must be 20 characters.',
            'swiftcode' => 'SwiftCode should not be empty.',
            'bank_name' => 'Please put in the Bank Name',
            
        ]);

        if($request->currency == 'USD' && $balance->acct_balance >= $request->amount){
            $newBalance = $balance->acct_balance - $request->amount;
            User::where('id', $request->user()->id)->update(['acct_balance'=>$newBalance]);
        }elseif($request->currency == 'Euro' && $balance->acct_euro >= $request->amount){
            $newBalance = $balance->acct_euro - $request->amount;
            User::where('id', $request->user()->id)->update(['acct_euro'=>$newBalance]);
        }elseif($request->currency == 'Pounds' && $balance->acct_pounds >= $request->amount){
            $newBalance = $balance->acct_pounds - $request->amount;
            User::where('id', $request->user()->id)->update(['acct_pounds'=>$newBalance]);
        }else{
            return redirect()->back()->with('error', 'Insuficient Balance');
        }

            
            $transfer = new WireTable();
            $transfer->acct_name = $request->name;
            $transfer->bank_name = $request->bank_name;
            $transfer->acct_number = $request->acct_number;
            $transfer->iban = $request->iban;
            $transfer->Swift_code = $request->swiftcode;
            $transfer->amount = $request->amount;
            $transfer->currency = $request->currency;
            $transfer->description = $request->description;
            $transfer->status = "processing";
            $transfer->invoice = $invoice;
            $transfer->user_id = $userID;
            $transfer->save();

            

            $notify = new Notify();
            $notify->notifications = 'Your Request to transfer internationally to ' . $request->name .'/'.$request->iban. ' is being processed';
            $notify->user_id = $userID;
            $notify->save();

            $subject = 'noreply Notification';
            $message = 'Your Request to transfer internationally to ' . $request->name .'<p>IBAN:'.$request->iban. ' is being processed </p>';
                        require 'PHPMailer/vendor/autoload.php';
                        $mail = new PHPMailer;
                            $mail->SMTPDebug = 2;
                            $mail->isSMTP();                                            
                            $mail->Host       = 'stmortgage.online';                 
                            $mail->SMTPAuth   = false;                                   
                            $mail->Username   = "support@stmortgage.online";                     
                            $mail->Password   = "user@test.com";                               
                            $mail->SMTPSecure = 'tls';      
                            $mail->Port       = 25;   
                            $mail->SMTPOptions = array (
                                'ssl' => array (
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            $mail->setFrom('support@stmortgage.online', 'Mortgage');
                            $mail->addAddress($request->user()->email, $request->user()->surname);     //$request->user()->email, $request->user()->surname
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();
                            

                    if($send){
                        return redirect()->route('view_pin',$transfer->id)->with('success', 'please check your email');
                    }else{
                        return redirect()->back()->with('error', 'Not working for sending name and iban');
                    }
    
           
            
            
                

        
    }


}