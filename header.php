<?php require_once("config.php");
      require_once("classes/User.php");

      $usernameLoggedIn = isset($_SESSION["userLoggedIn"]) ? $_SESSION["userLoggedIn"] : "a";
      $userLoggedInObj = new User($con, $usernameLoggedIn);
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
        <script src="actionsFile.js"></script>
    </head>
    <body>
        <div id="pageContainer">
            <div id="mastHeadContainer">
                <button class="navShowHide">
                    <img src="icons/menu.png">
                </button>

                <a class="logoContainer" href="index.html">
                    <img src = "icons/VidTV.png"/>
                </a>

                <div class="searchBarContainer">
                    <form action="search.php" method="GET">
                        <input type="text" name="term" class="searchBar" placehoder="Search here">
                        <button class="searchButton">
                            <img src="icons/search.png">
                        </button>
                    </form>
                </div>
                <div class="rightIcons">
                <a href="upload.php">
                    <img class="upload" src="icons/upload.png" alt=""/>
                </a>
                <a href="#">
                    <img class="upload" src="icons/user.png" alt=""/>
                </a>
                </div>
            </div>

            <div id="sideNavContainer" style="display:none">

            </div>

            <div id="mainSectionContainer">
            <div id="mainContentContainer">
