<?php

class OrdersController
{


    // public function addOrder($data)

    // {


    //     if (isset($_POST['pay'])) {
    //         $data = array();
    //         foreach ($_SESSION as $name => $product) {
    //             if (substr($name, 0, 9) == "products_") {
    //                 $data['libelle'] = $product['libelle'];
    //                 $data['IdPrd'] = $product['IdPrd'];
    //                 $data['qty'] = $product['qty'];
    //                 $data['prix_achat'] = $product['prix_achat'];
    //                 $data['total'] = $product['prix_achat'] * $product['qty'];
    //                 Redirect::to('cart');
    //             }
    //         }
    //     }
    //     $result = Order::createOrder($data);
    //     if ($result === "ok") {
    //         foreach ($_SESSION as $name => $product) {
    //             if (substr($name, 0, 9) == "products_") {
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
        // $sendingDate = $data['sendingDate'];
        // $deliveryDate = $data['deliveryDate'];
        // $totalprice = $data['totalprice'];
        $totalprice = "100";

        $orderData = array(
            'creationdate' => $dateOfCreation,
            // 'sendingDate' => $sendingDate,
            // 'deliveryDate' => $deliveryDate,
            'totalprice' => $totalprice,
            'client' => $client
        );

        $result = Order::createOrder($orderData);
        // die(print_r($result));

        if ($result === "ok") {
            foreach ($_SESSION as $name => $product) {
                // if (substr($name, 0, 9) == "products_") {
                    if (is_array($product) && isset($product["qty"]) && $product["qty"] > 0) {

                    $componentData = array(
                        
                        'productId' => $product['IdPrd'],
                        // 'commandId' => $orderData['id'],
                        'qty' => $product['qty'],
                        'unitPrice' => $product['prix_achat'],
                        'total' => $product['prix_achat'] * $product['qty']


                    );
        // die(print_r($componentData));

                    Order::createComponentProduct($componentData);
                    unset($_SESSION[$name]);
                    unset($_SESSION["count"]);
                    unset($_SESSION["totaux"]);
                }
            }
            Session::set("success", "Commande effectuée");
            Redirect::to("cart");
        }
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
