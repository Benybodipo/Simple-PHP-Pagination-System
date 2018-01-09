# Simple-PHP-Pagination-System
This is a simple and easily usable PHP pagination system made on PDO, perfect for small projects.

## Installation & Usage

- Download the repository Simple-PHP-Pagination-System from github to your project folder
- On config.php, configure the parameters on the config array.
```php
  $params = array(
    'hostName'      =>'',
    'dbName'        =>'',
    'userName'      =>'',
    'password'      =>'',
    'tableName'     =>'',
    'recordsPerPage'=> 4,
    'url'           =>'/myurl',
    'containerClass'=> 'pagination',
    'pagesClass'    => 'pageItem'
  );

```
- Include config.php in the page where you would like to display a pagination.
- Use variables $pageslist and $contents conveniently.
  - $pageslist, display the list of the pages. 
  - $contents, is a array of objects that contain the content to be displayid on the page.

## A Simple Example

```php
<?php   require("config.php"); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container">
      <div class="list-group">
        <?php foreach($contents as $content): ?>
         <a href="#" class="list-group-item"><?php echo $content->body; ?></a>
        <?php endforeach; ?>
      </div>
      
      <?php $pages; ?>
    </div>
  </body>
</html>


```
