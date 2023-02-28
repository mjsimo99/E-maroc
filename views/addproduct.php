<?php
	  if(isset($_POST['submit'])){

    $data = new FurnitureController();
    $data->addProduct();  
    }  
    $data = new FurnitureController();
    $catégories = $data->getAllcatégorie();
    
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
          <label for="libelle">Libelle*</label>
          <input type="text" name="libelle" class="form-control">
        </div>
        <div class="form-group">
          <label for="code_barre">Code Barre*</label>
          <input type="number" name="code_barre" class="form-control">
        </div>
        <div class="form-group">
          <label for="prix_achat">Prix D’achat*</label>
          </label>
          <input type="number" name="prix_achat" class="form-control">
        </div>
        <div class="form-group">
          <label for="prix_final">prix final*</label>
          <input type="number" name="prix_final" class="form-control">
        </div>
        <div class="form-group">
          <label for="Prix_offre">Prix offre*</label>
          <input type="number" name="Prix_offre" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">description*</label>
          <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
          <label for="qty">quantity*</label>
          <input type="text" name="qty" class="form-control">
        </div>
        <div class="form-group">
        <label for="id_catégorie">catégorie*</label>
        <select class="form-control" id="categorySelect" name="id_categorie">
                <?php foreach ($catégories as $catégorie) : ?>

                    <option value="<?php echo $catégorie['IdCat'];?>"><?php echo  $catégorie['nom']; ?></option>

                <?php endforeach; ?>

                </select>
        </div>
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