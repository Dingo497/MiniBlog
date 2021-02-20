
<?php include 'functions/database.php'; ?>

<div class="d-flex py-4 my-4"> 
  <h3 class="col-9 font-italic">Other posts</h3>

  <form method="post" class="col-3 justify-content-end text-right">
    <input type="submit" name="add_btn" value="Add Post" class="btn btn-primary">
  </form>
</div>

<?php include_once "codes/add_post.php"; ?>

<?php include_once "codes/select_edit_delete_post.php"; ?>


