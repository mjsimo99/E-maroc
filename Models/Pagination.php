<?php

// Pagination class
// class Pagination {
//     static public function first4($offset, $limit) {
//         $stmt = DB::connect()->prepare("
//             SELECT *
//             FROM produit
//             ORDER BY id
//             LIMIT :limit OFFSET :offset
//         ");
//         $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
//         $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
//         $stmt->execute();
//         $results = $stmt->fetchAll();
//         // $stmt = null;
//         return $results;
//     }
// }

class Pagination {
//     public static function getAllProducts($offset, $limit) {
//         $stmt = DB::connect()->prepare("
//             SELECT *
//             FROM produit
//             ORDER BY IdPrd
//             LIMIT :limit OFFSET :offset
//         ");
//         $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
//         $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
//         $stmt->execute();
//         $results = $stmt->fetchAll();
//         return $results;
//     }

//     public static function getTotalProducts() {
//         $stmt = DB::connect()->prepare("
//             SELECT COUNT(*) as count
//             FROM produit
//         ");
//         $stmt->execute();
//         $result = $stmt->fetch();
//         return $result['count'];
//     }










}
