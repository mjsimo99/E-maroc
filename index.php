
<?php

require_once './autoload.php';
include('./views/includes/alerts.php');
require './views/includes/header.php';

$home = new HomeController();
$pages = ['index','update','updatec','delete','deletec','logout','login','register','addproduct','addcategorie','product','product2','oneproduct','text','one','cart','checkout','cancelcart','pdashboard','cdashboard'];
// if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){


// $home->index('delete');
if (isset($_GET['page'])) {
    if (in_array($_GET['page'],$pages)) {
        $page = $_GET['page'];
        $home->index($page);
    }else{
        include('views/includes/404.php');
    }
}else{
    $home->index('index');
}


// }
//  elseif(isset($_GET['page']) && $_GET['page'] ==='register'){
//  $home->index('register');   
// }else{
//     $home->index('login');   

// }


require_once './views/includes/footer.php';
