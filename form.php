<!DOCTYPE html>
<html>
<head>
  <title>Add Records in Database</title>
  <link rel="stylesheet" href="formstyles.css">
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
</head>
<body>

<?php
include "config.php";

if(isset($_POST['submit']))
{		
    $name = $_POST['name'];
    $des = $_POST['description'];
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "images/".$file_name;

    move_uploaded_file($file_tem_loc,$file_store);

    $x = $pdo->prepare("INSERT INTO games (game_name, `desc`,img_loc) VALUES (?,?,?)");
    $x->execute(array($name,$des,$file_store));
}
?>

<h3>Enter game information here!</h3>

<button id='back' onclick="document.location='mainwindow.php'">Display Page</button>
<br />
<br />
<br />

<div id="emp"></div>
<div class="container">
  <form method="POST" enctype="multipart/form-data">
  <div class="row">
      <input type="text" name="name" placeholder="Game name..">
  </div>
  <br/>
  <div class="row">
      <textarea name="description" placeholder="Write something.." style="height:400px"></textarea>
  </div>
  <div class="row">
    <input type="file" name="file">
  </div>
  <br/>
  <div class="row">
    <input type="submit" name="submit"value="SUBMIT">
  </div>

  </form>
</div>
</body>
</html>