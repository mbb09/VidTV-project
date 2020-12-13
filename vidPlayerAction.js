function likeVideo(button,videoId)
{
    alert("Button is pressed");
    $.post("ajax/likeVideo.php",{videoId:videoId})
    .done(function()
    {
        alert(data);
    })
}
