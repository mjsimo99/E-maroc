<?php

if (isset($_POST['pay'])) {
    $data = array();
    foreach ($_SESSION as $name => $product) {
        if (substr($name, 0, 9) == "products_") {
            $data['libelle'] = $product['libelle'];
            $data['IdPrd'] = $product['IdPrd'];
            $data['qty'] = $product['qty'];
            $data['prix_achat'] = $product['prix_achat'];
            $data['total'] = $product['prix_achat'] * $product['qty'];
            $addOrder = new OrdersController();
            $addOrder->addOrder($data);
            Redirect::to('cart');
        }
    }
}

?>