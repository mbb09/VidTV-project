<?php 

class VideoDetailsForm {

    private $con;

    public function __construct($con){
        $this->con = $con;
    }
    

    //function that creates a form for uploading a video
    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createPrivateInput();
        $descInput = $this->createDescInput();
        $privInput = $this->createPrivacyInput();
        $categoryInput = $this->createCategoryInput();
        $uploadButton = $this->createUploadButton();
        return "
            <form action='processing.php' method='POST' enctype='multipart/form-data'>
                $fileInput
                $titleInput
                $descInput
                $privInput
                $categoryInput
                $uploadButton
            </form>
        ";
    }

    public function createFileInput() {
        return "
        <div class='form-group'>
            <input type='file' name='fileInput' class='form-control-file' id='exampleFormControlFile1' required>
        </div>
        ";
    }

    private function createPrivateInput() {
        return "
            <div class='form-group'>
            <input type='text' name='titleInput' class='form-control' placeholder='Title' required>
            </div>
        ";
    }

    private function createDescInput() {
        return '
            <div class="form-group">
            <textarea class="form-control" name="descInput" id="exampleFormControlTextarea1" rows="3" placeholder="Description" required></textarea>
            </div>
        ';
    }

    private function createPrivacyInput() {
        return '<div class="form-group">
                <select class="form-control" name="privacyInput" id="exampleFormControlSelect1">
                    <option value="0">Public</option>
                    <option value="1">Private</option>
                </select>
                </div>';
                
    }

    private function createCategoryInput() {
        $query = $this->con->prepare("SELECT * from categories");
        $query->execute();

        $html = '<div class="form-group">
                 <select class="form-control" name="categoryInput">
        ';

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $name=$row["name"];
            $id=$row["id"];
            $html .= "<option value='$id'>$name</option>";

        }

        $html .= "</select></div>";

        return $html;
    }

    private function createUploadButton() {
        $html = "<button name='uploadButton' class='btn btn-primary'>Upload</button>";
        return $html;
    }
   
}
    

?>