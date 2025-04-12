<?php
session_start();
$alert = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['btn_submit'])) {
  $user_email = $_POST['email'];
  $connection = mysqli_connect("localhost", "root", "", "projectdb");
  $query = mysqli_query($connection, "SELECT * FROM `tbl_admin` WHERE email='$user_email'");
  $count = mysqli_num_rows($query);
  $data = mysqli_fetch_array($query);
  $userid = $data['admin_id'];
  $user_name = $data['first_name'] . $data['last_name'];
  $user_email = $data['email'];


  if ($count > 0) {

    $otp = mt_rand(100000, 999999);

    //send email
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'glamsalon001@gmail.com';
    $mail->Password   = 'sfwxkgqsicztgdxb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('glamsalon001@gmail.com', 'Glam Salon');
    $mail->addAddress('furkanshaikh2138@gmail.com', 'furkan');     //Add a recipient

    //Content
    $mail->isHTML(true);
    //Set email format to HTML
    $mail->Subject = 'Password Reset OTP';
    $mail->Body    = '<h4>Hey furkan,</h4>
    We got request to reset your password for your account. To proceed with the password reset request, Please use the following One-time Password(OTP):
      <b><br/><br/>OTP :' . $otp . '</b><br/><br/>
      Please note that this otp is valid for 1 minute and only can be use once.<br/>If you did not initiate this password reset request, please desregard this email.<br/><br/><br/>
      Best regards,<br/>Glam salon';
    $mail->send();
    $_SESSION['otp'] = $otp;
    $_SESSION['userid'] = $userid;
    $_SESSION['username'] = $user_name;
    $_SESSION['user_mail'] = $user_email;
    $_SESSION['success'] = true;
    echo "<script>alert('Email sent on your register account')</script>";
    echo "<script>window.location.href='otp-varification.php'</script>";

  } else {
    $alert = true;
  }
}
//
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Forgot Password</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../assets/vendor/fonts/materialdesignicons.css" />

  <!-- Menu waves for no-customizer fix -->
  <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Logo -->
        <div class="card p-2">
          <!-- Forgot Password -->
          <div class="app-brand justify-content-center mt-5">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <span style="color: #9055fd">
                  <svg width="30" height="24" viewBox="0 0 250 196" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z" fill="currentColor" />
                    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black" />
                    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z" fill="currentColor" />
                    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black" />
                    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z" fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z" fill="white" fill-opacity="0.15" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z" fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z" fill="white" fill-opacity="0.3" />
                  </svg>
                </span>
              </span>
              <span class="app-brand-text demo text-heading fw-semibold">Glam Salon</span>
            </a>
          </div>
          <!-- /Logo -->
          <div class="card-body mt-2">
            <h4 class="mb-2">Forgot Password? 🔒</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
            <form id="formAuthentication" class="mb-3" method="post">
              <div class="form-floating form-floating-outline mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
                <label>Email</label>
              </div>
              <?php if ($alert == true) {
                echo '<div class="alert alert-danger" role="alert">
                This Email does not exist — check it out!
               </div>';
              } ?>
              <button type="submit" name="btn_submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
              <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status" id="spinner">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </form>
            <div class="text-center">
              <a href="auth-login.php" class="d-flex align-items-center justify-content-center">
                <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
        <img src="../assets/img/illustrations/tree-3.png" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block" />
        <img src="../assets/img/illustrations/auth-basic-mask-light.png" class="authentication-image d-none d-lg-block" alt="triangle-bg" data-app-light-img="illustrations/auth-basic-mask-light.png" data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
        <img src="../assets/img/illustrations/tree.png" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block" />
      </div>
    </div>
  </div>

  <!-- / Content -->
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script>
    window.addEventListener('load', function() {
      var spinner = document.getElementById('spinner');
      spinner.style.display = 'none';
    });
  </script>
</body>

</html>