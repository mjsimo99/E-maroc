<?php
if (isset($_POST['IdPrd'])) {
  $existproduct = new FurnitureController();
  $product = $existproduct->getOneProduct();
  // die(var_dump($product));

}

?>        









<div class="container mt-5 d-flex justify-content-center align-items-center">
  <div class="card text-center mb-3 mt-5 mx-5" style="width: 25rem;">
    <?php echo '<img class="image-content" src="data:image/jpeg;base64,' . base64_encode($product->image) . '" />'; ?>
    <div class="card-body">
      <div class="form-group">
        <input type="hidden" name="IdPrd" value="<?php echo $product->IdPrd; ?>">
      </div>
      <h3 class="card-title text-primary"><?php echo $product->libelle; ?></h3>
      <p class="card-text"><small class="text-muted">Product reference: #<?php echo $product->code_barre; ?></small></p>
      <p class="card-text"><strong class="prix-primary">Price: <?php echo $product->prix_final; ?>$</strong></p>
      <!-- <button type="button" class="btn btn-outline-success btn-lg" id="add-to-cart-button">Add to Cart</button> -->

      <form method="post" action="<?php echo BASE_URL; ?>checkout">
        <div class="form-group">
        <input class="text-center custom-input" type="number" name="qty" id="qty" value="1">
          <input type="hidden" name="libelle" value="<?php echo $product->libelle; ?>">
          <input type="hidden" name="IdPrd" value="<?php echo $product->IdPrd; ?>">
        </div>
        <div class="form-group mt-3 mb-3">
          <!-- <input type="submit" class="btn btn-primary mt-3" value="Ajouter au panier"> -->
          <input type="submit" class="btn btn-outline-success btn-lg w-100"  value="Ajouter au panier">

        </div>
      </form>



      <button type="button" class="btn btn-outline-primary btn-lg" id="view-details-button">View Details</button>
    </div>
  </div>
  <div id="details-content" class="collapse mt-5">
    <div class="card text-center mb-3 mt-5 mx-5" style="width: 25rem;">
      <div class="card-body">
        
        <h4 class="card-title text-primary">Product Details</h4>
        <p class="card-text"><?php echo $product->description;?></p>
      </div>
    </div>
    
  </div>



</div>

