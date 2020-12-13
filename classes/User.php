<?php
    class User {
    private $con, $sqlData, $username;

    public function __construct($con, $username){
        $this->con = $con;

        $query = $this->con->prepare("
            SELECT * FROM users WHERE username=:username
        ");

        $query->bindParam(":username", $username);

        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

	
    
    public function getUserName()
	{
		return $this->sqlData["username"];
	}

	public function getFullName()
	{
		return $this->sqlData['firstname'] . $this->sqlData['lastname'];
	}
	public function getEmail()
	{
		return $this->sqlData['email'] ;
	}
	public function getSignUpDate()
	{
		return $this->sqlData['signUpDate'] ;
	}
	public function getProfilePic()
	{
		return $this->sqlData['profilePic'] ;
	}
	
	public function isSubscribedTo(){
		$username = $this->getUserName();
		$query = $this->con->prepare("
		SELECT * FROM subscribers WHERE userTo=:userTo AND userFrom=:userFrom
		");

		$query->bindParam(":userTo", $userTo);
		$query->bindParam(":userFrom", $username);

		$query->execute();

		return $query->rowCount() > 0;
	}

	public function getSubscriberCount(){
		$username = $this->getUserName();
		$query = $this->con->prepare("
		SELECT * FROM subscribers WHERE userTo=:userTo
		");

		$query->bindParam(":userTo", $userTo);

		$query->execute();

		return $query->rowCount() > 0;
	}
}
?> 