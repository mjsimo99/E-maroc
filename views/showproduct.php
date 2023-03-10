<?php



if (isset($_POST['IdPrd'])) {
    $productshow = new FurnitureController();

    $show =  $productshow->showproduct();

    Redirect::to('pdashboard');

 }
?>