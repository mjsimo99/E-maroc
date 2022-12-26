<?php
	  if(isset($_POST['submit'])){

    $data = new FurnitureController();
    $data->addcatégorie();  
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
      <form method="post" enctype="multipart/form-data" class="mr-1">
        <div class="form-group">
          <label for="libelle">Nom*</label>
          <input type="text" name="nom" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">description*</label>
          <input type="text" name="description" class="form-control">
        </div>
        <!-- <div class="form-group">
          <label for="catégorie">catégorie*</label>
          <input type="text" name="catégorie" class="form-control">
        </div> -->
        <div class="form-group mb-3">
              <label for="image">image*</label>
              <input type="file" name="image" id="image" class="form-control" placeholder="image">
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