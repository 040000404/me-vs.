<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>i left nothing precious in there</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style media="screen">
    *{
      background-color: rgb(168,168,168);
    }
    body{
      display:flex;

    }
    #trial{
      position:absolute;
      display:block;
      z-index:3;
      background-color: rgb(168,168,168);
      background-size: cover;
      height: 100vh;
      width:100vw;
      color:black;
      overflow-y: hidden;
    }
    #blog{
      position: relative;
      overflow-y: auto;
      flex: 1;
      margin-top:15vh;
      height:70vh;

    }
    .images{
      width:300px;
      height:100vh;
      position:relative;
      left:50%;
      top:-50%;
      margin-left:-150px;
      border: 1px solid #dfd0a4;
    }

  </style>
</head>

<body>

  <div id="blog">
    <?php
    $directory = "media";
    $images = glob($directory . "/*.*");

    foreach($images as $image)
    {
    $imageData = base64_encode(file_get_contents($image));
    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
    echo '<img src="', $src, .base64_encode(file_get_contents($image)).'">';

    }
    ?>
  </div>
  <div id="trial">
    <div id="trial_content" style="position:relative;left:50%;top:50%;margin-left:-50px;background-color: rgb(168,168,168);">
    <img src="bach.png" style="width:100px;margin-top:-56px;border: 1px solid #575140;"><br>
    alors, j'y ai rien laissé de précieux
  </div>
  </div>


  <script type="text/javascript">
    //blink
    window.addEventListener("load", function() {
    var f = document.getElementById('trial');
    var g = document.getElementById('blog');
    setInterval(function() {
      f.style.display = (f.style.display == 'none' ? '' : 'none');
      g.style.display = (f.style.display == 'none' ? '' : 'none');
    }, 7000);}, false);
    //images
    $.ajax({
       url: 'images.php',
       success: function(data) {
           $(data).find("a").attr("href", function(i, data) {
               $("#blog").append("<img class='images' src='"+ data + "'><br>");
           });
       }
   });
  </script>
</body>

</html>
