<?php

class video {
    private $con, $sqlData, $userLoggedInObj, $videoId;

    public function __construct($con, $sqlData, $userLoggedInObj, $videoID){
        $this->con = $con;
        $this->sqlData = $sqlData;
        
        if (is_array($input)){
            $this->sqlData = $input;

        } else {
            $query = $this->con->prepare("
                SELECT * FROM vids WHERE id=:id
            ");

            $query->bindParam(":id", $id);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getId(){
        return $this->sqlData["id"];
    }

    public function getTitle(){
        return $this->sqlData["title"];
    }

    public function getDescription(){
        return $this->sqlData["description"];
    }

    public function getPrivacy(){
        return $this->sqlData["privacy"];
    }

    public function getFilePath(){
        return $this->sqlData["filePath"];
    }

    public function getCategory(){
        return $this->sqlData["category"];
    }

    public function getUploadDate(){
        return $this->sqlData["uploadDate"];
    }

    public function getViews(){
        return $this->sqlData["views"];
    }

    public function getDuration(){
        return $this->sqlData["duration"];
    }

    public function incrementViews(){
        $query=$this->con->prepare("
        UPDATE vids SET views=views+1 WHERE id=:id
        ");

        $query->bindParam(":id", $id);
        $this->videoID = $this->getId();

        $query->execute();

        $this->sqlData['views'] = $this->sqlData['views'] + 1;
    }

    public function getLikes(){
        $query = $this->con->prepare("
        SELECT count(*) as count FROM likes WHERE videoId=:videoId
        ");

        $query->bindParam(":videoId", $this->videoId);

        $this->videoId = $this->getId();

        $query->execute();

        //getting the number of likes

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data["count"];
    } 

    public function getDislikes(){
        $query = $this->con->prepare("
        SELECT count(*) as count FROM dislikes WHERE videoId=:videoId
        ");

        $query->bindParam(":videoId", $this->videoId);

        $this->videoId = $this->getId();

        $query->execute();

        //getting the number of likes

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data["count"];
    }

    public function like(){
    $videoId = $this->getId();
    $username = $this->userLoggedInObj->getUserName();
    $query = $this -> con-> prepare("
     
    SELECT * from likes WHERE videoId=:videoId AND username=:username
    
    
    ");
    $query->bindParam(":videoId",$videoId);
    $query->bindParam(":username",$username);

    $query->execute();

    if($query->rowCount() > 0) {
        echo "already liked";
    } else {
        $query = $this->con->prepare("
            INSERT INTO likes (videoId, username) VALUES (:videoId, :username)
        ");

        $query->bindParam(":videoId". $videoId);
        $query->bindParam(":username", $username);

        $query->execute();

    }
    
    }

    public function getUploadedBy(){
        return $this -> sqlData["uploadedBy"];
    }
}