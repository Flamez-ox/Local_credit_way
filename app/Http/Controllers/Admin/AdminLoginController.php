<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Auth;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AdminLoginController extends Controller
{
    //
    public function index()
    {
       return view('admin.pages.login');
    }

    public function forget_password()
    {
       return view('admin.pages.forgot_password');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $admin = Admin::where('id',1)->first();

        if(Auth::guard('admin')->attempt($data)){
        // if($admin->email = $request->email && $admin->password =  $request->password){
            return redirect()->route('admin_dashboard');
        }else {
            return redirect()->route('admin_login')->with('error', 'email or password is incorrect!');
        };
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'You are logged out');
    }

    public function forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $token = hash('sha256', time());

        $admin_data->token = $token;
        $admin_data->update();



        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = ' <a href='.$reset_link.'>Reset password</a>';
        
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
                            $mail->addAddress($request->email,'Admin' );     //$users->email
                            //Cntent
                            $mail->isHTML(true);                                  
                            $mail->Subject = $subject;
                            $mail->Body    = $message;

                            $send = $mail->send();


if($send){
    return redirect()->route('admin_login')->with('success', 'Please check your email');
}else{
    return redirect()->back()->with('error', 'Not working');
}



        
    }
    

    public function reset_password($token, $email)
    {

        $admin_data = Admin::where('token', $token)->where('email',$email)->first();
        if(!$admin_data){
            return redirect()->route('admin_login');
        }
        return view('admin.pages.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        //
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);


       
        $admin_data = Admin::where('token', $request->token)->where('email',$request->email)->first();


        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();


        return redirect()->route('admin_login')->with('success', 'Password changed Successfully');
    }

}
