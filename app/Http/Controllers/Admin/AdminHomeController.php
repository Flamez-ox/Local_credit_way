<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Notify;
use App\Models\TransferTable;
use App\Models\User;
use App\Models\OTP;
use App\Models\Support;
use App\Models\WireTable;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Mail;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AdminHomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function show_users()
    {
        $users = User::get();
        return view('admin.pages.users',compact('users'));
    }

    public function edit_users($id)
    {
        $users = User::with('rTransfertable')->with('rNotify')->with('rWiretable')->where('id',$id)->first();
        return view('admin.pages.user_edit',compact('users'));
    }

    public function update_user_submit(Request $request, $id){

        $now = time();
     
        $user_data = User::where('id',$id)->first();

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

                if(!empty($user_data->photo)){
                    unlink(public_path('user/clients/img/'.$user_data->photo));
                    $ext = $request->file('photo')->extension();
                    $file = 'photo'.$now.'.'. $ext;
                    $request->file('photo')->move(public_path('user/clients/img/'),$file);

                    $user_data->photo = $file;
    
                }else{
                    $ext = $request->file('photo')->extension();
                $file = 'photo'.$now.'.'. $ext;
                $request->file('photo')->move(public_path('user/clients/img/'),$file);

                $user_data->photo = $file;
                }


            }

            $user_data->first_name = $request->first_name;
            $user_data->surname = $request->surname;
            $user_data->email = $request->email;
            $user_data->address = $request->address;
            $user_data->date_of_birth = $request->date_of_birth;
            $user_data->country = $request->country;
            $user_data->phone = $request->phone;
            $user_data->acct_type = $request->acct_type;
            $user_data->acct_balance = $request->acct_balance;
            $user_data->acct_euro = $request->acct_euro;
            $user_data->acct_pounds = $request->acct_pounds;
            $user_data->show_profile_on_dashboard = $request->show_profile_on_dashboard;
            $user_data->gender = $request->gender;
            $user_data->user_status = $request->user_status;
            $user_data->password = Hash::make($request->password);
            $user_data->update();

            return redirect()->route('show_users')->with('success', 'The user is Updated successfully');
    }

    public function delete_users($id)
    {
        $users = User::with('rTransfertable')->with('rNotify')->with('rWiretable')->where('id',$id)->first();
        $users->delete();

        return redirect()->route('show_users')->with('success', 'The user is Deleted successfully');
    }

    public function local_transactions() {

        $local_transactions = TransferTable::orderBy('created_at', 'desc')->get();
        return view('admin.pages.local_transactions',compact('local_transactions'));
        
    }

    public function edit_local_transaction($id)
    {
        $local_transaction = TransferTable::with('rUser')->where('id',$id)->first();
        return view('admin.pages.edit_local_transaction',compact('local_transaction'));
    }

    public function update_local_transaction(Request $request, $id)
    {
        $local_transaction = TransferTable::with('rUser')->where('id',$id)->first();

        $local_transaction->acct_name = $request->acct_name;
        $local_transaction->acct_number = $request->acct_number;
        $local_transaction->amount = $request->amount;
        $local_transaction->description = $request->description;
        $local_transaction->created_at = $request->created_at;
        $local_transaction->update();

        return redirect()->route('local_transactions')->with('success', 'The Transaction is Updated successfully');
    }


    public function wire_transactions() {

        $wire_transactions = WireTable::orderBy('created_at', 'desc')->get();
        return view('admin.pages.wire_transactions',compact('wire_transactions'));
        
    }

    public function edit_wire_transaction($id)
    {
        $wire_transaction = WireTable::with('rUser')->where('id',$id)->first();
        return view('admin.pages.edit_wire_transaction',compact('wire_transaction'));
    }


    public function update_wire_transaction(Request $request, $id)
    {
        $users = Auth::user();
        $wire_transaction = WireTable::with('rUser')->where('id',$id)->first();
        
                    if($request->status == 'Not approved'){


                                    if(trim($wire_transaction->currency) == 'USD'){
                                        $newBalance = $wire_transaction->rUser->acct_balance + $request->amount;
                                        $wire_transaction->rUser->acct_balance = $newBalance;
                                        $wire_transaction->rUser->update();
                                        $wire_transaction->amount = 0;
                                        
                                    }elseif(trim($wire_transaction->currency) == 'Euro') {
                                        $newBalance = $wire_transaction->rUser->acct_euro + $request->amount;
                                        $wire_transaction->rUser->acct_euro = $newBalance;
                                        $wire_transaction->rUser->update();
                                        $wire_transaction->amount = 0;
                                        
                                    }elseif(trim($wire_transaction->currency) == 'Pounds') {
                                        $newBalance = $wire_transaction->rUser->acct_pounds + $request->amount;
                                        $wire_transaction->rUser->acct_pounds = $newBalance;
                                        $wire_transaction->rUser->update();
                                        $wire_transaction->amount = 0;
                                        
                                    }

                                        $wire_transaction->status = $request->status;
                                        $wire_transaction->acct_name = $request->acct_name;
                                        $wire_transaction->acct_number = $request->acct_number;
                                        $wire_transaction->iban = $request->iban;
                                        $wire_transaction->description = $request->description;
                                        $wire_transaction->created_at = $request->created_at;
                                        $wire_transaction->update();

                                        
                                    $notify = new Notify();
                                    $notify->notifications = 'Your Request to transfer internationally to ' . $request->acct_name .' was not approved, Please Contact your Account Officer';
                                    $notify->user_id = $users->id;
                                    $notify->save();

                                    $subject = 'noreply Notification';
                                    $message = 'Your Request to transfer internationally to ' . $request->acct_name .' was not approved, Please Contact your Account Officer';
                                    
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
                            $mail->addAddress($wire_transaction->rUser->email,$wire_transaction->rUser->surname );      
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();
                            
                            if($send){
                                return redirect()->route('wire_transactions')->with('success', 'The Transaction is Updated successfully');
                            }else{
                                return redirect()->route('wire_transactions')->with('error', 'Email not sent');;
                            }
                            
                                 

                                    
                        }else{
                            
                            
                                        $wire_transaction->status = $request->status;
                                        $wire_transaction->acct_name = $request->acct_name;
                                        $wire_transaction->acct_number = $request->acct_number;
                                        $wire_transaction->amount = $request->amount;
                                        $wire_transaction->iban = $request->iban;
                                        $wire_transaction->description = $request->description;
                                        $wire_transaction->created_at = $request->created_at;
                                        $wire_transaction->update();

                                    $notify = new Notify();
                                    $notify->notifications = 'Your Request to transfer internationally to ' . $request->acct_name .' has been approved';
                                    $notify->user_id = $wire_transaction->rUser->id;
                                    $notify->save();

                                    $subject = 'noreply Notification';
                                    $message = 'Your Request to transfer internationally to ' . $request->acct_name .' has been approved';
            
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
                            $mail->addAddress($wire_transaction->rUser->email,$wire_transaction->rUser->surname );     //$request->user()->email
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();
                            if($send){
                                return redirect()->route('wire_transactions')->with('success', 'The Transaction is Updated successfully');
                            }else{
                                return redirect()->route('wire_transactions')->with('error', 'Email not sent');;
                            }
    
                        } 

                        return redirect()->route('wire_transactions')->with('success', 'The Transaction is Updated successfully');
                                
                    }

        public function delete_wire_transaction($id)
        {
            $wire_transaction = WireTable::with('rUser')->where('id',$id)->first();
            $wire_transaction->delete();
            return redirect()->route('wire_transactions')->with('success', 'The Transaction is Deleted successfully');
        }

        public function pin()
        {
            $pins = OTP::get();
            
            return view('admin.pages.pins', compact('pins'));
        }

        public function delete_pin($id)
        {
            $pins = OTP::where('id',$id)->first();
            $pins->delete();
            return redirect()->back()->with('success', 'Pin Deleted');
        }
        
        public function delete_complaint($id)
        {
            $support = Support::where('id',$id)->first();
            $support->delete();
            return redirect()->back()->with('success', 'Complaint Deleted');
        }

        public function delete_complaint_all()
        {
             $supports = Support::all();
             foreach($supports as $support){
             $support->delete();
             }
            return redirect()->back()->with('success', 'All Complaints Deleted');
        }
        
        public function delete_pin_all()
        {
             OTP::with('rwire')->delete();
            return redirect()->back()->with('success', 'All Pins Deleted');
        }

        public function support()
        {
            $supports = Support::get();
            
            return view('admin.pages.supports', compact('supports'));
        }


        public function reply_users($email)
        {
           
            return view('admin.pages.reply_users', compact('email'));
        }
        

        public function send_user_message(Request $request)
        {
           
            $request->validate([
                'email' => 'required|email',
                'message' => 'required',
            ]);

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
                            $mail->addAddress($request->email);     //$request->email
                            $mail->addReplyTo('support@stmortgage.online', 'Mortgage');
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = 'noreply';
                            $mail->Body    = $request->message;

                            $send = $mail->send();
                            if($send){
                                return redirect()->back()->with('success', 'Email sent');
                            }else{
                                return redirect()->back()->with('error', 'Email not sent');;
                            }
           
        }

        public function email_all_users()
        {
            
          
            return view('admin.pages.email_all');
        }


        public function email_all_users_submit(Request $request)
        {
            $users = User::where('user_status','active')->get();
            

               $request->validate([
                'subject' => 'required',
                'message' => 'required',
            ]);

            
            foreach($users as $user){
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
                            $mail->setFrom('support@stmortgage.online', 'Raxa');
                            $mail->addReplyTo('support@stmortgage.online');
                            $mail->addAddress($user->email, 'User');     //$user->email
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $request->subject;
                            $mail->Body    = $request->message;

                            $send = $mail->send();
                            if($send){
                                return redirect()->back()->with('success', 'Email sent');
                            }else{
                                return redirect()->back()->with('error', 'Email not sent');;
                            }
               }
        }
    }


