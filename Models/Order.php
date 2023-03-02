<?php

class Order
{


    //     static public function createOrder($orderData)
    // {
    //     try {
    //         $stmt = DB::connect()->prepare('INSERT INTO orders (client, libelle, IdPrd, qty, prix_achat, total)
    //             VALUES (:client, :libelle, :IdPrd, :qty, :prix_achat, :total)');
    //         $stmt->bindparam(':client', $_SESSION['id']);
    //         $stmt->bindParam(':libelle', $orderData['libelle']);
    //         $stmt->bindParam(':IdPrd', $orderData['IdPrd']);
    //         $stmt->bindParam(':qty', $orderData['qty']);
    //         $stmt->bindParam(':prix_achat', $orderData['prix_achat']);
    //         $stmt->bindParam(':total', $orderData['total']);

    //         if ($stmt->execute()) {
    //             return 'ok';
    //         } else {
    //             return 'error';
    //         }
    //     } catch (PDOException $e) {
    //         error_log("Error while creating order: " . $e->getMessage());
    //         return 'error';
    //     }
    // }
    public static function createComponentProduct($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO componentproduct (productId, commandId, qty, unitPrice, total)
            VALUES (:productId, :commandId, :qty, :unitPrice, :total)');
            $stmt->bindParam(':productId', $data['productId']);
            $stmt->bindParam(':commandId', $data['commandId']);
            $stmt->bindParam(':qty', $data['qty']);
            $stmt->bindParam(':unitPrice', $data['unitPrice']);
            $stmt->bindParam(':total', $data['total']);

            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            error_log("Error while creating component product: " . $e->getMessage());
            return 'error';
        }
    }

    public static function createOrder($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO `order` (creationdate, totalprice, client)
            VALUES (:creationdate, :totalprice, :client)');
            
            $stmt->bindParam(':creationdate', $data['creationdate']);
            $stmt->bindParam(':client', $_SESSION['id']);

            $stmt->bindParam(':totalprice', $data['totalprice']);
            // die(print_r($data));
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            error_log("Error while creating order: " . $e->getMessage());
            return 'error';
        }
    }












    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function deleteOrder($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM orders WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $order = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }

    static public function updateOrderStatus($id, $status)
    {
        $stmt = DB::connect()->prepare('UPDATE orders SET status = :status WHERE id = :id');
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
