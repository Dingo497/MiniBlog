<?php 
  $pagename = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')); //--> path -> /index.php -> index

  if ($pagename == 'Index') {
    $pagename = 'PC';
  }

  if ($pagename == 'PC') {
    $pagename_data = 'pc';
  }
  if ($pagename == 'COVID-19') {
    $pagename_data = 'covid';
  }
  if ($pagename == 'Stocks') {
    $pagename_data = 'stocks';
  }
  if ($pagename == 'Conspiracy') {
    $pagename_data = 'conspiracy';
  }

?>
<?php

if (isset($_POST['add_btn'])) {
?>
<div>
  <form method="post" class="row justify-content-center m-1">
    <div class="d-flex my-2">
      <div class="px-2">
        <textarea name="title_add" cols="30" rows="1" class="form-control" placeholder="Title of post"></textarea>
      </div>
      <div class="px-2">
        <textarea name="autor_add" cols="30" rows="1" class="form-control" placeholder="Your name please"></textarea>
      </div>
    </div>

    <textarea name="content_add" cols="30" rows="2" class="form-control" placeholder="Content"></textarea>
    <a href="index.php" class="btn btn-info col-3 mr-1 mt-1" name="go_back">Go back</a>

    <input type="submit" name="confrim_add" value="Comfirm" class="btn btn-success col-3 ml-1 mt-1">
  </form> 
</div>
<?php } 


$data = new Databases;
$success_message = '';
if (isset($_POST['confrim_add'])) {
  $insert_data = array(
    'post_title' => mysqli_real_escape_string($data->con, $_POST['title_add']),
    'post_autor' => mysqli_real_escape_string($data->con, $_POST['autor_add']),
    'post_content' => mysqli_real_escape_string($data->con, $_POST['content_add']),
  );

  if ($data->insert("$pagename_data", $insert_data)) {
    $success_message = 'Post Inserted!';
  }
}
?>

<div class="text-center m-4">
  <span class="h1 text-success">
    <?php
      if (isset($success_message)) {
        echo $success_message;
      }
    ?>
  </span>
</div>