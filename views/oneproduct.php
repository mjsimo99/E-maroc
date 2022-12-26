<?php
if (isset($_POST['IdPrd'])) {
  $existproduct = new FurnitureController();
  $product = $existproduct->getOneProduct();
}

?>
<div class="container mt-5 d-flex justify-content-center align-items-center">
  <div class="card text-center mb-3 mt-5 mx-5" style="width: 25rem;">
  <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product->image) . '" />'; ?>

    <div class="card-body">
      <div class="form-group">
        <input type="hidden" name="IdPrd" value="<?php echo $product->IdPrd; ?>">
      </div>

      <h3 class="card-title text-primary"><?php echo $product->libelle; ?></h3>
      <p class="card-text"><?php echo $product->description;?></p>
      <p class="card-text"><small class="text-muted">Product reference: #<?php echo $product->code_barre; ?></small></p>
      <p class="card-text"><strong class="text-primary">Price: $<?php echo $product->prix_final; ?></strong></p>
      <button type="button" class="btn btn-outline-success btn-lg">Add to Cart</button>
      <button type="button" class="btn btn-outline-primary btn-lg" id="view-details-button">View Details</button>
    </div>
  </div>
  <div id="details-content" class="collapse mt-5">
    <div class="card text-center mb-3 mt-5 mx-5" style="width: 25rem;">
      <div class="card-body">
        <h4 class="card-title text-primary">Product Details</h4>
        <p class="card-text">Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .Additional product details go here.. .</p>
      </div>
    </div>
  </div>
</div>



<script>
  // Get the "View Details" button element
  const viewDetailsButton = document.getElementById('view-details-button');

  // Add a click event listener to the button
  viewDetailsButton.addEventListener('click', function() {
    // Toggle the visibility of the "details-content" element
    const detailsContent = document.getElementById('details-content');
    detailsContent.classList.toggle('show');
  });
</script>