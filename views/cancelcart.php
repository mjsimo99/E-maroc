<?php

$IdPrd = $_POST["IdPrd"];

$prix_achat = $_POST["prix_achat"];

$data = new FurnitureController();

$data->emptyCart($IdPrd,$prix_achat);