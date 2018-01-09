<?php
require("Pagination.php");

$config = array(
  'hostName'      =>'localhost',
  'dbName'        =>'todo',
  'userName'      =>'root',
  'password'      =>'',
  'tableName'     =>'activity',
  'recordsPerPage'=> 4,
  'url'           =>'/pagination',
  'containerClass'=> 'pagination',
  'pagesClass'    => 'pageItem'
);

$pagination = new Pagination($config);

$pageslist = Pagination::paginate();
$contents = Pagination::getContent();


?>
