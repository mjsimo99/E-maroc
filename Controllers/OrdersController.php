<?php

class OrdersController
{


   



// lastvWork


// public function addOrder($data)
// {
//     $client = $_SESSION['id'];
//     $dateOfCreation = date("Y-m-d H:i:s");
//     $totalprice = "100";
//     // $commendid  = "120";

//     $orderData = array(
//         'creationdate' => $dateOfCreation,
//         'totalprice' => $totalprice,
//         'client' => $client
//     );

//     $result = Order::createOrder($orderData);

//     if ($result === "ok") {
//         // Fetch the last inserted order id using a SELECT statement
//         $stmt = DB::connect()->prepare('SELECT id FROM `order` ORDER BY id DESC LIMIT 1');
//         $stmt->execute();
//         $orderId = $stmt->fetchColumn();

//         foreach ($_SESSION as $name => $product) {
//             if (is_array($product) && isset($product["qty"]) && $product["qty"] > 0) {
//                 $componentData = array(
//                     'productId' => $product['IdPrd'],
//                     'commandId' => $orderId,
//                     'qty' => $product['qty'],
//                     'unitPrice' => $product['prix_achat'],
//                     'total' => $product['prix_achat'] * $product['qty']
//                 );
//                 Order::createComponentProduct($componentData);
//                 unset($_SESSION[$name]);
//                 unset($_SESSION["count"]);
//                 unset($_SESSION["totaux"]);
//             }
//         }
//         Session::set("success", "Commande effectuée");
//         Redirect::to("cart");
//     }
// }








public function addOrder($data)
{
    $client = $_SESSION['id'];
    $dateOfCreation = date("Y-m-d H:i:s");
    $totalprice = $_SESSION['totaux'];

    $orderData = array(
        'creationdate' => $dateOfCreation,
        'totalprice' => $totalprice,
        'client' => $client
    );

    $result = Order::createOrder($orderData);

    if ($result['result'] === "ok") {
        $orderId = $result['orderId'];

        foreach ($_SESSION as $name => $product) {
            if (is_array($product) && isset($product["qty"]) && $product["qty"] > 0) {
                $componentData = array(
                    'productId' => $product['IdPrd'],
                    'commandId' => $orderId,
                    'qty' => $product['qty'],
                    'unitPrice' => $product['prix_achat'],
                    'total' => $product['prix_achat'] * $product['qty']
                );
                Order::createComponentProduct($componentData);
                unset($_SESSION[$name]);
                unset($_SESSION["count"]);
                unset($_SESSION["totaux"]);
            }
        }
        Session::set("success", "Commande effectuée");
        Redirect::to("cart");
    } else {
        Session::set("error", "Erreur lors de la création de la commande");
        Redirect::to("cart");
    }
}







public function getAllOrder()
{
    $orders = Order::getAllorder();
    return $orders;
}

public function removeOrders()
{
    if (isset($_POST["id"])) {
        $data = array(
            "id" => $_POST["id"]
        );
        $result = Order::deleteOrders($data);
        if ($result === "ok") {
            Session::set("success", "Order supprimé");
            Redirect::to("oodashboard");
        } else {
            echo $result;
        }
    }
}


public function validateOrders() {
    $id = $_POST['id'];
    $status = 1;
    $delevryDate = date("Y-m-d H:i:s");
    return Order::validorders($id, $status, $delevryDate);

}


public function sendOrder() {
    $id = $_POST['id'];
    $sendingDate = date("Y-m-d H:i:s");;
    // die($sendingDate);
    return Order::sendorders($id, $sendingDate);


}


























    public function getAllOrders()
    {
        $orders = Order::getAll();
        return $orders;
    }

    public function removeOrder()
    {
        if (isset($_POST["id"])) {
            $data = array(
                "id" => $_POST["id"]
            );
            $result = Order::deleteOrder($data);
            if ($result === "ok") {
                Session::set("success", "Order supprimé");
                Redirect::to("odashboard");
            } else {
                echo $result;
            }
        }
    }

 


    public function validateOrder() {
        $id = $_POST['id'];
        $status = 1;
        return Order::updateOrderStatus($id, $status);

    }
    


    

}

?>