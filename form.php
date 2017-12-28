<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost', 'root', 'mypass123', 'accounts' );

// if it sends through post this statement will become true
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // two matching passwords are equal from password to confirm password
    if ($_POST['password'] == $_POST['confirmpassword']) {
        print_r($_FILES);
        // escapes all the special characters to be used in mysql
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password =md5($_POST['password']); //md5 hash password security: NOTE UPDATE TO BCYRPT SOON
        $avatar_path = $mysqli->real_escape_string('image/'.$_FILES['avatar']['name']); // files of images are stored inside $_FILES

        // makes sure file type is image
        if (preg_match("!image!", $_FILES['avatar']['type'])) {

        }
    }
}
?>
<!DOCTYPE html>
<html> 
    <head>
        <title>Registration Form</title> 
        <link rel="stylesheet" href="form.css" type="text/css">
    </head>
    <body>
         <div class="body-content">
             <div class="module">
                 <h1>Create an account</h1>
                     <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
                         <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
                         <input type="text" placeholder="User Name" name="username" required> 
                         <input type="email" placeholder="Email" name="email" required>
                         <input type="password" placeholder="Password" name="password" auto-complete="new-password"required>
                         <input type="password" placeholder="Confirm password" name="confirmpassword" autocomplete="new-password" required> 
                         <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required>
                         </div>
                         <input type="submit" value="Register" name="register" class="btn btn-block btn-primary"> 
                     </form>
             </div> 
         </div>
    </body> 
</html> 
