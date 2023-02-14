<?php



if (isset($_POST['id'])) {
    $ordersController = new OrdersController();

    $ordersController->validateOrder();
    Redirect::to('odashboard');

 }
?>