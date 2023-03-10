

<?php

// class paginationController {
//     public function getall() {
//         $limit = 4;
//         $offset = 0;
//         $produits = Pagination::first4($offset, $limit);
//         return $produits;
//     }
// }

class PaginationController {
//     public function index() {
//         $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
//         $limit = 4;
//         $offset = ($currentPage - 1) * $limit;

//         $products = Pagination::getAllProducts($offset, $limit);
//         $totalProducts = Pagination::getTotalProducts();
//         $totalPages = ceil($totalProducts / $limit);

//         require_once 'views/products.php';
//     }










public function getAllProducts_2()
    {
        $page =  ( $_SERVER['REQUEST_URI'][(strlen($_SERVER['REQUEST_URI']) - 1)]);
        if($page == 1 ||  !is_numeric( $page )) $count = 0;
        else $count = ($page - 1) * 3;
        $products = Product::getAll_2($count);
        return $products;
    }
}