<?php



if (isset($_POST['IdPrd'])) {
    $producthide = new FurnitureController();

    $hide =  $producthide->hideproduct();

    Redirect::to('pdashboard');

 }
?>