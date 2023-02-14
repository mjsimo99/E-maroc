<?php
if (isset($_POST['clear'])) {
    foreach ($_SESSION as $name => $product) {
        if (substr($name, 0, 9) == "products_") {
            unset($_SESSION[$name]);
        }
    }
    unset($_SESSION['totaux']);
    unset($_SESSION['count']);

    Redirect::to("cart");
}
?>
