<?php
class Pagination{

    private static $cnx = null;
    private static $perPage = null;
    private static $pages = 1;
    private static $config;


    public function __construct($config){
        self::$config = $config;

        $host = self::$config['hostName'];
        $db = self::$config['dbName'];
        $user = self::$config['userName'];
        $pass = self::$config['password'];

        try{

            self::$cnx = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        self::$perPage = self::$config['recordsPerPage'];

        if(isset($_GET['pg'])){
          self::$pages= $_GET['pg'];
        }

    }

    public static function paginate(){
        $table = self::$config['tableName'];
        $url = self::$config['url'];

        $containerClass = self::$config['containerClass'];
        $pagesClass = self::$config['pagesClass'];

        $sql = "SELECT * FROM activity";
        $query  = self::$cnx->prepare($sql);
        $query->execute();

        $count = $query->rowCount(); //Total number of records from databasa
        $totalPages = ceil($count/self::$perPage); //Total of pages

        $pageNum = 1;//Default page number

        $prev = (self::$pages > 1) ? self::$pages -1 : 1; //Previous button function
        $next = (self::$pages < $totalPages) ? self::$pages +1: $totalPages; // Next button function

        $listofpages = "";

        $listofpages .= "<ul class='".$containerClass."'>";
          $listofpages .= "<li><a href='".$url."?pg=1'  class='".$pagesClass."'>First</a></li>";
          $listofpages .= "<li><a href='".$url."?pg=".$prev."'  class='".$pagesClass."'>Prev</a></li>";
          for($i=0;$i<$count;$i++){

              if(is_integer($i/self::$perPage)){
                $listofpages .= "<li><a href='".$url."?pg=".$pageNum."'  class='".$pagesClass."'>".$pageNum."</a> </li>";
                  $pageNum++;
              }

          }
          $listofpages .= "<li><a href='".$url."?pg=".$next."'  class='".$pagesClass."'>Next</a></li>";
          $listofpages .= "<li><a href='".$url."?pg=".$totalPages."'  class='".$pagesClass."'>Last</a></li>";
        $listofpages .= "</ul>";

        return $listofpages;
    }


    public static function getContent(){
        $page = self::$pages;
        $perPage = self::$perPage;
        $table = self::$config['tableName'];

        $start = $perPage* ($page-1);//Start point from where fetch record

        $sql = "SELECT * FROM {$table} LIMIT {$start},{$perPage}";
        $query  = self::$cnx->prepare($sql);
        $query->execute();

        $content = $query->fetchAll(PDO::FETCH_OBJ);
        return $content;

    }









}
