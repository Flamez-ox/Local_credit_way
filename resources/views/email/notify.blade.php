<!DOCTYPE html>
<html>
  <!-- Mirrored from light.pinsupreme.com/emails_payment_due.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 13:37:02 GMT -->
  <body
    style='background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: "Helvetica Neue", "Segoe UI", Helvetica, Arial, sans-serif;'
  >
    <div
      style="
        max-width: 600px;
        margin: 10px auto 20px;
        font-size: 12px;
        color: #a5a5a5;
        text-align: center;
      "
    >
      If you are unable to see this message,
      <a href="{{ route('user_login') }}" style="color: #a5a5a5; text-decoration: underline"
        >click here to view in browser</a
      >
    </div>
    <div
      style="
        max-width: 600px;
        margin: 0px auto;
        background-color: #fff;
        box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.05);
      "
    >
      <table style="width: 100%">
        <tr>
          <td style="background-color: #fff">
            <img alt="" src="img/logo.png" style="width: 70px; padding: 20px" />
          </td>
          {{-- <td
            style="padding-left: 50px; text-align: right; padding-right: 20px"
          >
            <a
              href="{{ route('user_login') }}"
              style="
                color: #261d1d;
                text-decoration: underline;
                font-size: 14px;
                letter-spacing: 1px;
              "
              >Sign In</a
            ><a
              href="{{ route('reset_pasword') }}"
              style="
                color: #7c2121;
                text-decoration: underline;
                font-size: 14px;
                margin-left: 20px;
                letter-spacing: 1px;
              "
              >Forgot Password</a
            >
          </td> --}}
        </tr>
      </table>
      <div
        style="padding: 60px 70px; border-top: 1px solid rgba(0, 0, 0, 0.05)"
      >
        <h1 style="margin-top: 0px">Raxa</h1>
        <div style="color: #636363; font-size: 14px; margin-bottom: 30px">
            <?php
            $users = Auth::user();
            ?>
          Hello {{ $users->surname }}, 
          <p>{!! $body !!}</p>
        </div>
        
        <h4 style="margin-bottom: 10px">Need Help?</h4>
        <div style="color: #a5a5a5; font-size: 12px">
          <p>
            If you have any questions contact us at
            <a href="#" style="text-decoration: underline; color: #4b72fa"
              >test@example.com</a
            >
          </p>
        </div>
      </div>
      <div style="background-color: #f5f5f5; padding: 40px; text-align: center">
        <div style="margin-bottom: 20px">
          <a href="#" style="display: inline-block; margin: 0px 10px"
            ><img
              alt=""
              src="img/social-icons/twitter.png"
              style="width: 28px" /></a
          ><a href="#" style="display: inline-block; margin: 0px 10px"
            ><img
              alt=""
              src="img/social-icons/facebook.png"
              style="width: 28px" /></a
          ><a href="#" style="display: inline-block; margin: 0px 10px"
            ><img
              alt=""
              src="img/social-icons/linkedin.png"
              style="width: 28px" /></a
          ><a href="#" style="display: inline-block; margin: 0px 10px"
            ><img
              alt=""
              src="img/social-icons/instagram.png"
              style="width: 28px"
          /></a>
        </div>
        <div style="margin-bottom: 20px">
          <a
            href="#"
            style="
              text-decoration: underline;
              font-size: 14px;
              letter-spacing: 1px;
              margin: 0px 15px;
              color: #261d1d;
            "
            >Contact Us</a
          ><a
            href="#"
            style="
              text-decoration: underline;
              font-size: 14px;
              letter-spacing: 1px;
              margin: 0px 15px;
              color: #261d1d;
            "
            >Privacy Policy</a
          >
        </div>
       
        <div style="margin-bottom: 20px">
          <a href="#" style="display: inline-block; margin: 0px 10px"
            ><img
              alt=""
              src="img/market-google-play.png"
              style="height: 33px" /></a
          ><a href="#" style="display: inline-block; margin: 0px 10px"
            ><img alt="" src="img/market-ios.png" style="height: 33px"
          /></a>
        </div>
        <div
          style="
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
          "
        >
          <div style="color: #a5a5a5; font-size: 10px; margin-bottom: 5px">
            1073 Madison Ave, suite 649, New York, NY 10001
          </div>
          <div style="color: #a5a5a5; font-size: 10px">
            Copyright 2018 Light Admin template. All rights reserved.
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- Mirrored from light.pinsupreme.com/emails_payment_due.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 13:37:02 GMT -->
</html>
