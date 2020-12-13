<?php include_once("header.php");?>
<?php include_once("classes/VideoDetailsForm.php");?>
<div class="column">
    <?php
    
    $formProvider = new VideoDetailsForm($con);

    echo $formProvider->createUploadForm();

    //display categories from database
    
    ?>
</div>

<script>

$("form").submit(function(){
    $("#loadingModal").modal("show");
})

</script>

<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true" data-backdrop = "static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        Video upload is processing
        <img src = "icons/load.gif">
      </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
