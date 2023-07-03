<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Models\Support;
use App\Models\TransferTable;
use App\Models\WireTable;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use AshAllenDesign\LaravelExchangeRates\ExchangeRate;

use Guzzle\Http\Exception\ClientErrorResponseException;

use carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    //
    public function user_dashboard (Request $request) {

        $users = Auth::user();
        
        $notification = Notify::with('rUser')->where('user_id',$users->id)->count();
        $new_notification = $notification + 1;
        $history = TransferTable::with('rUser')->where('user_id',$users->id)->orWhere('acct_number', $users->acct_number)->Orderby('created_at','desc')->get();
        $whistory = WireTable::with('rUser')->where('user_id',$users->id)->Orderby('created_at','desc')->get();

        
        return view('user.pages.dashboard', compact('users','history', 'new_notification','whistory'));
    }

    public function notification (Request $request) {

        $users = Auth::user();
        $notification = Notify::with('rUser')->where('user_id',$users->id)->Orderby('created_at','desc')->get();

        
        return view('user.pages.notification', compact('users','notification'));
    }
    
    public function all_notification (Request $request) {

        $users = Auth::user();
        $notification = Notify::with('rUser')->where('user_id',$users->id)->delete();

        
        return redirect()->back()->with('success', 'All Notification has been deleted');
    }

    public function delete_notification($id) {

        $users = Auth::user();
        $notification = Notify::with('rUser')->where('user_id',$users->id)->where('id',$id)->first();

        $notification->delete();

         return redirect()->back()->with('success', 'Notification has been deleted');
    }

    public function user_setting (Request $request) {

        $users = Auth::user();

        
        return view('user.pages.profile_setting', compact('users'));
    }

    public function billing_info (Request $request) {

        $users = Auth::user();

        
        return view('user.pages.billing_info', compact('users'));
    }

    public function exchange (Request $request) {

        $users = Auth::user();

        
        return view('user.pages.exchange', compact('users'));
    }


    public function loans (Request $request) {

        $users = Auth::user();

        
        return view('user.pages.loans', compact('users'));
    }



    public function customer_support (Request $request) {

        $users = Auth::user();

        
        return view('user.pages.customer_support', compact('users'));
    }


    public function customer_support_submit (Request $request) {

        $users = Auth::user();

        $num = rand(657,1089);
        $ticket = '#rax'.$num;
        
        $request->validate([

            'subject' => 'required',
            'message' => 'required',
            
        ]);

        $support = new Support();
        $support->subject = $request->subject;
        $support->message = $request->message;
        $support->user_email = $users->email;
        $support->save();

        $subject = 'noreply Notification Ticket number:'.$ticket;
        $message = 'Your Compaliant will be reviewed shortly';
        
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
                            $mail->addReplyTo('support@stmortgage.online');
                            $mail->addAddress($users->email,$users->surname );     //$users->email
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();

                            if($send){
                                return redirect()->back()->with('success', 'Complaint success,  Your message will be reviewed shortly');
                            }else{

                                return redirect()->back()->with('error', 'Error while sending Complaint');
                            }
        
        
    }

    
    public function user_setting_submit(Request $request){

        $now = time();
     
        $users = Auth::user();
        

        $request->validate([

            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'phone' => 'required',
            'acct_type' => 'required',
            'gender' => 'required',
        ]);
       
            if($request->hasFile('photo')){
                $request->validate([
                    'photo' => 'image|mimes:jpg,jpeg,png,gif',
                ]);

                if(!empty($users->photo)){
                    unlink(public_path('user/clients/img/'.$users->photo));
                    $ext = $request->file('photo')->extension();
                    $file = 'photo'.$now.'.'. $ext;
                    $request->file('photo')->move(public_path('user/clients/img/'),$file);

                    $users->photo = $file;
    
                }else{
                    $ext = $request->file('photo')->extension();
                $file = 'photo'.$now.'.'. $ext;
                $request->file('photo')->move(public_path('user/clients/img/'),$file);

                $users->photo = $file;
                }


            }

            $users->first_name = $request->first_name;
            $users->surname = $request->surname;
            $users->email = $request->email;
            $users->address = $request->address;
            $users->date_of_birth = $request->date_of_birth;
            $users->country = $request->country;
            $users->phone = $request->phone;
            $users->password = Hash::make($request->password);
            $users->update();

            return redirect()->back()->with('success', 'Your profile is Updated successfully');
    }


    public function exchangeCurrency(Request $request) {


        $users = Auth::user();

        $amount = ($request->amount)?($request->amount):(1);
  
        $apikey = 'd1ded944220ca6b0c442';
  
        $from_Currency = urlencode($request->from_currency);
        $to_Currency = urlencode($request->to_currency);
        $query = "{$from_Currency}_{$to_Currency}";
  
        // change to the free URL if you're using the free version
        $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&amp;compact=y&amp;apiKey={$apikey}");
  
        $obj = json_decode($json, true);
  
        $val = $obj["$query"];
  
        $total = $val['val'] * 1;
  
        $formatValue = number_format($total, 2, '.', '');
  
        $data = "$amount $from_Currency = $to_Currency $formatValue";
  
        echo $data; die;
  
     }
}
