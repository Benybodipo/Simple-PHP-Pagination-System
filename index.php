<?php   require("config.php"); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container">
      <div class="list-group">
        <?php foreach ($contents as $content): ?>
         <a href="#" class="list-group-item"><?php echo $content->body; ?></a>
        <?php endforeach; ?>
      </div>
      
      <?php Pagination::paginate(); ?>
    </div>


  </body>
</html>
