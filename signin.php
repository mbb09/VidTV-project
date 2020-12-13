<?php require_once("config.php");
require_once("Constants.php");
require_once("Account.php");
require_once("classes/formSanitizer.php");

$account = new Account($con);

 
if(isset($_POST['submitBtn']))
{
    $username = formSanitizer::sanitizeFormUsername($_POST["username"]);
    
    $password = formSanitizer::sanitizeFormPassword($_POST["password"]);
    $account->login($username,$password);
    $_SESSION['userLoggedIn'] = $username;
    header("Location : index.php");
    
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
                    <h3>Sign In</h3>
                    <span>To continue to VidTV</span>
                </div>

                <div class="loginForm">
                    <form action="signin.php" method="POST">
                        <?php echo $account->getError(Constants::$invalidLogin); ?>
                        <input type="text" name="username" value="<?php getUserDetails("username");?>" required autocomplete="off">
                        <input type="password" name="password" required/>
                        <input type="submit" name="submitBtn" value="Submit"/>
                    </form>
                </div>

                <a href="signup.php" class="signInMessage">
                    Need a new account? Sign up here!
                </a>
            </div>
        </div>
    </body>
    </html>