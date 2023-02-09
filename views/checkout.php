<?php

ob_start();
if (isset($_POST["IdPrd"])) {
    $id = $_POST["IdPrd"];
    $data = new FurnitureController();
    $product = $data->getOneProduct();
    // die(var_dump($product));
    if (!isset($_SESSION["products_" . $product->IdPrd])) $_SESSION["products_" . $product->IdPrd] = array();
    if (
        isset($_SESSION["products_" . $product->IdPrd])
        && $_SESSION["products_" . $product->IdPrd]["libelle"] == $_POST["libelle"]
    ) {
        // echo "hghghhg";
        Session::set("info", "Vous avez déja ajouté ce produit au panier");
        Redirect::to("cart");
    } else {
        if ($product->qty < $_POST["qty"]) {
            Session::set("info", "La quantité disponible est : $product->qty");
            Redirect::to("cart");
        } else {
            $_SESSION["products_" . $product->IdPrd] = array(
                "IdPrd" => $product->IdPrd,
                "libelle" => $product->libelle,
                "prix_achat" => $product->prix_achat,
                "qty" => $_POST["qty"],
                "total" => $product->prix_achat * $_POST["qty"],
            );
            $_SESSION["totaux"] += $_SESSION["products_" . $product->IdPrd]["total"];
            $_SESSION["count"] += 1;
            Redirect::to("cart");
        }
    }
} else {
    Redirect::to("cart");
}
