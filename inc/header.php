<head>

  <?php require_once "includes.php"; ?>

  <?php 

    $pagename = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')); //--> path -> /index.php -> index

    if ($pagename == 'Index') {
      $pagename = 'PC';
    }

  ?>

  <title>
    <?php echo $pagename; ?> &mdash; Blog
  </title>
</head>

<header class="py-3">
    <div class="row">
      <div class="col-4">
        <a href="" class="text-muted">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a href="" class="text-dark" style="font-size: 30px">Blog</a>
      </div>
      <div class="col-4 text-right">
        <a href="" class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a>
      </div>
    </div>
  </header>


<div class="py-1 px-5 mb-2">
	<nav class="nav justify-content-between">
	  <a class="p-2 text-muted" href="index.php">PC</a>
	  <a class="p-2 text-muted" href="COVID-19.php">COVID-19</a>
	  <a class="p-2 text-muted" href="Stocks.php">Stocks</a>
	  <a class="p-2 text-muted" href="Conspiracy.php">Conspiracy</a>
	</nav>
</div>