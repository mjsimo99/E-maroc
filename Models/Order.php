<?php

class Order
{



// lastvWork

    // // hada dyali
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

    // public static function createOrder($data)
    // {
    //     try {

    //         $stmt = DB::connect()->prepare('INSERT INTO `order` (creationdate, totalprice, client)
    //         VALUES (:creationdate, :totalprice, :client)');
    //         $stmt->bindParam(':creationdate', $data['creationdate']);
    //         $stmt->bindParam(':client', $_SESSION['id']);
    //         $stmt->bindParam(':totalprice', $data['totalprice']);
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











    



    public static function createOrder($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO `order` (creationdate, totalprice, client) VALUES (:creationdate, :totalprice, :client)');
            $stmt->bindParam(':creationdate', $data['creationdate']);
            $stmt->bindParam(':client', $_SESSION['id']);
            $stmt->bindParam(':totalprice', $data['totalprice']);
            
            $result = $stmt->execute();
            
            if ($result) {
                $stmt = DB::connect()->prepare('SELECT id FROM `order` ORDER BY id DESC LIMIT 1');
                $stmt->execute();
                $orderId = $stmt->fetchColumn();
                // die(print_r($orderId));
                return ['result' => 'ok', 'orderId' => $orderId];
            } else {
                return ['result' => 'error'];
            }
        } catch (PDOException $e) {
            error_log("Error while creating order: " . $e->getMessage());
            return ['result' => 'error'];
        }
    }
    

    static public function getAllorder()
    {
        $stmt = DB::connect()->prepare('SELECT users.username, `order`.* FROM `order` INNER JOIN users ON users.id = `order`.client ');
        $stmt->execute();
        return $stmt->fetchAll();
    }



    static public function deleteOrders($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM `order` WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    static public function validorders($id, $status,$deliveryDate)
    {
        $stmt = DB::connect()->prepare('UPDATE `order` SET status = :status ,deliveryDate =:deliveryDate WHERE id = :id');
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':deliveryDate', $deliveryDate);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    static public function sendorders($id, $sendingDate)
    {
        $stmt = DB::connect()->prepare('UPDATE `order` SET sendingDate = :sendingDate WHERE id = :id');
        $stmt->bindParam(':sendingDate', $sendingDate);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
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
?>