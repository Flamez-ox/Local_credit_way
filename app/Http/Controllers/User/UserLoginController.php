<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserLoginController extends Controller
{
    //
    

    public function index () {

     
        return view('frontend.pages.login');

    }

    public function login_submit(Request $request)
    {

        

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $users = User::where('user_status','deactive')->get();
        
            foreach ($users as $user) {
                
            if($request->email == $user->email){
                
                return redirect()->route('user_login')->with('error', 'Your account has been Blocked, Please Contact your Account Officer!');
            
            }

            }


        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];


          

        if(Auth::attempt($data)){


            return redirect()->route('user_dashboard');
               
            }else {
                return redirect()->route('user_login')->with('error', 'email or password is incorrect!');
               
            };
    }

    public function user_logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user_login')->with('success', 'You are logged out');
    }

    public function reset_pasword()
    {
        return view('frontend.pages.reset_password');
    }

    public function reset_pasword_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pwd'  => 'required',
        ]);
        $user_data = User::where('email', $request->email)->first();
        if (!$user_data) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $token = hash('sha256', time());

        $user_data->token = $token;
        $user_data->update();



        $reset_link = url('user/change-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = $reset_link;

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
            $mail->addAddress($request->email,'User' ); 
            //Cntent
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $send = $mail->send();


                    if($send){
                        return redirect()->route('user_login')->with('success', 'Please check your email');
                    }else{
                        return redirect()->back()->with('error', 'Not working');
                    }
        


       

        
    }

    public function change_password($token, $email)
    {

        $user_data = User::where('token', $token)->where('email',$email)->first();
        if(!$user_data){
            return redirect()->route('user_login');
        }
        return view('frontend.pages.change_password', compact('token', 'email'));
    }


    public function change_password_submit(Request $request)
    {
        //

        $request->validate([
            'password' => 'required',
            'pwd' => 'required|same:password',
        ],
                ['pwd' =>'Retype Password']
            );
       
        $user_data = User::where('token', $request->token)->where('email',$request->email)->first();


        $user_data->password = Hash::make($request->password);
        $user_data->token = '';
        $user_data->update();


        return redirect()->route('user_login')->with('success', 'Password changed Successfully');
    }

    public function register_user(){
        
        return view('frontend.pages.register');


    }


    public function register_user_submit(Request $request){


        $alphaString = collect(array_merge(range('A', 'Z')))
        ->shuffle()
        ->take(8)
        ->implode('');


        $now = time();
        $rand = rand(25000,57498);
        $token = hash('sha256', time());
        $acc= $rand.''.date("s");
        $accountnumber='305'.$acc;
        $swiftcode = $alphaString;
        $iban = 'US98 0700 0000 00'.$accountnumber;
        $user_data = new User();

        $request->validate([

            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'date_of_birth' => 'required',
            'residence' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'acct_type' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'pwd' => 'required|same:password',
            'checkbox' => 'required',
        ],
                ['date_of_birth' =>'Date of birth',
                'acct_type' =>'Account Type',
                'pwd' =>'Retype Password']
            );
       
            if($request->hasFile('photo')){
                $request->validate([
                    'photo' => 'image|mimes:jpg,jpeg,png,gif',
                ]);

            $ext = $request->file('photo')->extension();
            $file = $request->surname.$now.'.'. $ext;
            $request->file('photo')->move(public_path('user/clients/img/'),$file);

            $user_data->photo = $file;
            

            }

            $user_data->first_name = $request->first_name;
            $user_data->surname = $request->surname;
            $user_data->email = $request->email;
            $user_data->address = $request->address;
            $user_data->date_of_birth = $request->date_of_birth;
            $user_data->country = $request->country;
            $user_data->phone = $request->phone;
            $user_data->acct_type = $request->acct_type;
            $user_data->iban = $iban;
            $user_data->swiftcode = $swiftcode;
            $user_data->acct_number = $accountnumber;
            $user_data->gender = $request->gender;
            $user_data->user_status = 'active';
            $user_data->token = $token;
            $user_data->password = Hash::make($request->password);
            $user_data->save();

            return redirect()->route('user_login')->with('success', 'Welcome You have Signed Up Successfully');
    }

}
