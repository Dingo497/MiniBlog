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
$post_data = $data->select("$pagename_data");
foreach ($post_data as $key) {
?>
  <div class="list-group">
    <div class="list-group-item">
      <div class=" d-flex">
        <h2 class="col-9"><?php echo $key['post_title'] ?></h2>
        <form method="post" class="col-3 justify-content-end text-right">
            <input type="submit" name="edit_btn" value="Edit" class="btn btn-info">
            <input type="submit" name="delete" value="X" class="btn btn-danger">
            <input type='hidden' name='id' value="<?php echo $key['id'] ?>">
        </form>
      </div>

      <p class="m-0 p-0">Created at: <?php echo $key['CreatedAt'] ?> by <strong class="text-primary"><?php echo $key['post_autor'] ?></strong></p>
      <p class="text-muted m-0 p-0">Updated at: <?php echo $key['UpdatedAt'] ?> </p>
      <p id="content"><?php echo $key['post_content'] ?></p>
    </div>
  </div>
<?php  

  if (isset($_POST['edit_btn'])) {
    if ($key['id'] == $_POST['id']) {
        if ($key['id'] == $_POST['id']) {
?>
<div>
  <form method="post" class="row justify-content-center m-1">
    <div class="d-flex my-2">
      <div class="px-2">
        <textarea name="title_edit" cols="30" rows="1" class="form-control" placeholder="Title of post"><?php echo $key['post_title'] ?></textarea>
      </div>
      <div class="px-2">
        <textarea name="autor_edit" cols="30" rows="1" class="form-control" placeholder="Your name please"><?php echo $key['post_autor'] ?></textarea>
      </div>
    </div>

    <textarea name="message_edit" cols="30" rows="2" class="form-control" placeholder="Content"><?php echo $key['post_content'] ?></textarea>

    <a href="index.php" class="btn btn-info col-3 mr-1 mt-1" name="go_back">Go back</a>

    <input type="submit" name="confrim_edit" value="Comfirm Edit" class="btn btn-success col-3 ml-1 mt-1">
    <input type='hidden' name='id' value="<?php echo $key['id'] ?>">
  </form> 
</div>
<?php
  } } } } 
?>




            <!-- CONFIRM EDIT POSTU -->
<?php 
if (isset($_POST['confrim_edit'])) {
  foreach ($post_data as $key) {
    if ($_POST['id'] == $key['id']) {
      $message_edit_txt = $_POST['message_edit'];
      $title_edit_txt = $_POST['title_edit'];
      $autor_edit_txt = $_POST['autor_edit'];
      $id_txt = $_POST['id'];

      if ($data->update("$pagename_data", $title_edit_txt, $autor_edit_txt, $message_edit_txt, $id_txt)) {
        header("Refresh:0");
        $success_message = 'Post Edited!';
      }
    }
  }
}
?>




            <!-- DELETE POSTU -->
<?php
if (isset($_POST['delete'])) {
  foreach ($post_data as $key) {
    if ($_POST['id'] == $key['id']) {
      $id_txt = $_POST['id'];

      if ($data->delete("$pagename_data", $id_txt)) {
        header("Refresh:0");
        $success_message = 'Post Deleted!';
      }
    }
  }
}
?>