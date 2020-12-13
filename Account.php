<?php

class Account {
    private $con;
    private $errorArray = array();
    public function __construct($con){
        $this->con = $con;
    }

    public function login($username, $password){
        $password = hash("sha512", $password);

        $query = $this->con->prepare("
            SELECT * from users WHERE username=:username AND password=:password
        ");

        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);

        $query->execute();

        if ($query->rowCount() == 1){
            return true;
        } else {
            array_push($this->errorArray, Constants::$invalidLogin);
            return false;
        }
    }

    public function register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword){
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateUsername($username);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if(empty($this->errorArray)){
            return $this->insertUserDetails($firstName, $lastName, $username, $email, $password);
        } else {
            return false;
        }

    }

    private function insertUserDetails($firstName, $lastName, $username, $email, $password){
        $query = $this->con->prepare("
        INSERT INTO users(firstname, lastname, username, email, password)
        VALUES (:firstname, :lastname, :username, :email, :password)
        ");

        $query->bindParam(":firstname", $firstName);
        $query->bindParam(":lastname", $lastName);
        $query->bindParam(":username", $username);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);

        $query->execute();
    }

    public function validateFirstName($firstName){
        if (strlen($firstName) > 25 || strlen($firstName) < 2) {
            array_push($this->errorArray, Constants::$firstnameMinChars);
        }
    }

    public function validateLastName($lastName){
        if (strlen($lastName) > 25 || strlen($lastName) < 2) {
            array_push($this->errorArray, Constants::$lastnameMinChars);
        }
    }

    public function validateUsername($username){
        if (strlen($username) > 25 || strlen($username) < 2) {
            array_push($this->errorArray, Constants::$usernameMinChars);
            return;
        }

        $query = $this->con->prepare("
            SELECT username FROM users WHERE username=:username
        ");

        $query->bindParam(":username", $username);
        $query->execute();

        if ($query->rowCount() != 0){
            array_push($this->errorArray, Constants::$usernameExists);
        }
    }

    public function getError($error){
        if(in_array($error, $this->errorArray)){
            return "<span class='errorMessage'>$error</span>";
        }
    }

    public function validateEmails($email, $confirmEmail){
        if ($email != $confirmEmail){
            array_push($this->errorArray, Constants::$emailMatching);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$invalidEmail);
            return;
        }

        $query = $this->con->prepare("
            SELECT email FROM users WHERE email=:email
        ");

        $query->bindParam(":email", $email);
        $query->execute();

        if ($query->rowCount() != 0){
            array_push($this->errorArray, Constants::$emailExists);
        }
    }

    public function validatePasswords($password, $confirmPassword){
        if ($password != $confirmPassword){
            array_push($this->errorArray, Constants::$passwordMatching);
            return;
        }

        if (preg_match("/[^A-Za-z0-9]/", $password)) {
            array_push($this->errorArray, Constants::$invalidPassword);
            return;
        }

        if (strlen($password) < 2 || strlen($password) > 25) {
            array_push($this->errorArray, Constants::$passwordlen);
            return;
        }

    }

}



?>