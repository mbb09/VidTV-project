<?php 

require_once("config.php");
require_once("Constants.php");
require_once("Account.php");
require_once("classes/formSanitizer.php");

$account = new Account($con);

if(isset($_POST['submitBtn'])) {
    $firstname = formSanitizer::sanitizeFormStr($_POST["fname"]);
    $lastname = formSanitizer::sanitizeFormStr($_POST["lname"]);
    $username = formSanitizer::sanitizeFormUsername($_POST["username"]);
    $email = formSanitizer::sanitizeFormEmail($_POST["email"]);
    $confirmEmail = formSanitizer::sanitizeFormEmail($_POST["email2"]);
    $password = formSanitizer::sanitizeFormPassword($_POST["password"]);
    $confirmPassword = formSanitizer::sanitizeFormPassword($_POST["password2"]);

    $wasSuccessful = $account->register($firstname, $lastname, $username, $email, $confirmEmail, $password, $confirmPassword);
    if($wasSuccessful) {
        $_SESSION['userLoggedIn'] = $username;
        header("location: index.php");
    }
    
}

function getUserDetails($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>VidTV</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">
                <div class="header">
                    <img title="logo" alt="Site Logo" src="icons/VidTV.png">
                    <h3>Sign Up</h3>
                    <span>To continue to VidTV</span>
                </div>

                <div class="loginForm">
                    <form action="signup.php" method="POST">
                    <?php echo $account->getError(Constants::$firstnameMinChars); ?>
                    <input type="text" name="fname" placeholder="First Name" value= "<?php getUserDetails("fname");?>" autocomplete="off" required>
                    <?php echo $account->getError(Constants::$lastnameMinChars); ?>
                    <input type="text" name="lname" placeholder="Last Name" value= "<?php getUserDetails("lname");?>" autocomplete="off" required>
                    <?php echo $account->getError(Constants::$usernameMinChars); ?>
                    <?php echo $account->getError(Constants::$usernameExists); ?>
                    <input type="text" name="username" placeholder="Username" value= "<?php getUserDetails("username");?>" autocomplete="off" required>
                    <?php echo $account->getError(Constants::$emailMatching); ?>
                    <?php echo $account->getError(Constants::$invalidEmail); ?>
                    <?php echo $account->getError(Constants::$emailExists); ?>
                    <input type="email" name="email" placeholder="Email" value= "<?php getUserDetails("email");?>" autocomplete="off" required>
                    <input type="email" name="email2" placeholder="Confirm Email" value= "<?php getUserDetails("email2");?>" autocomplete="off" required>
                    <?php echo $account->getError(Constants::$passwordMatching); ?>
                    <?php echo $account->getError(Constants::$invalidPassword); ?>
                    <?php echo $account->getError(Constants::$passwordlen); ?>
                    <input type="password" name="password" placeholder="Password" value= "<?php getUserDetails("password");?>" autocomplete="off" required>
                    <input type="password" name="password2" placeholder="Confirm password" value= "<?php getUserDetails("confirmPassword");?>" autocomplete="off" required>
                    <input type="submit" name="submitBtn" value="Submit">
                    </form>
                </div>

                <a href="signin.php" class="signInMessage">
                    Already have an account? Sign in here!
                </a>
            </div>
        </div>
    </body>
    </html>