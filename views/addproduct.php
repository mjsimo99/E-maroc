<?php
	  if(isset($_POST['submit'])){

    $data = new FurnitureController();
    $data->addProduct();  
    }  
    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
      header("location:index.php");
      }

?>
<div class="container">
  <div class="row content">

    <div class="col-md-6">
      <?php include('./views/includes/alerts.php'); ?>

      <h3 class="signin-text mb-3">Add Product</h3>
      <form method="post" class="mr-1">
        <div class="form-group">
          <label for="libelle">Libelle*</label>
          <input type="text" name="libelle" class="form-control">
        </div>
        <div class="form-group">
          <label for="code_barre">Code Barre*</label>
          <input type="text" name="code_barre" class="form-control">
        </div>
        <div class="form-group">
          <label for="prix_achat">Prix D’achat*</label>
          </label>
          <input type="text" name="prix_achat" class="form-control">
        </div>
        <div class="form-group">
          <label for="prix_final">prix final*</label>
          <input type="text" name="prix_final" class="form-control">
        </div>
        <div class="form-group">
          <label for="Prix_offre">Prix offre*</label>
          <input type="text" name="Prix_offre" class="form-control">
        </div>
        <div class="form-group">
          <label for="description	">description*</label>
          <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
          <label for="catégorie">catégorie*</label>
          <input type="text" name="catégorie" class="form-control">
        </div>
        <!-- <div class="form-group form-check">
          <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
          <label class="form-check-label" for="checkbox">Remember Me</label>
        </div> -->
        <button class="btn btn-class" type="submit" name="submit">Add</button>
      </form>
    </div>
    <div class="col-md-6 mb-3">
      <img src="views/images/mobile.png" width="80%" ;>
    </div>
  </div>
</div>