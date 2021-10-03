<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>

    

<div class="center">
  <div class="form-input">
    <label for="file-ip-1">Upload Image</label>
    <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
    <div class="preview">
      <img id="file-ip-1-preview">
    </div>
  </div>
</div>



    <script>
        

function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}


    </script>
    
</body>
</html>