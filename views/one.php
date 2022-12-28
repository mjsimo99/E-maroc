<?php
if (isset($_POST['IdPrd'])) {
  $existproduct = new FurnitureController();
  $product = $existproduct->getOneProduct();
}

?>        
  <li class="nav-item bg-dark" >
<a href="#" class="nav-link active" id="cart-link" onclick="toggleCartContent()">
  <i class="fa fa-shopping-cart" style="font-size: 24px; "></i>
</a>
</li>

<!-- HTML for the product and shopping cart -->
<div id="cart-content" class="collapse">
  <ul id="cart-items"></ul>
</div>

<div class="container mt-5 d-flex justify-content-center align-items-center">
  <div class="card text-center mb-3 mt-5 mx-5" style="width: 25rem;">
    <?php echo '<img class="image-content" src="data:image/jpeg;base64,' . base64_encode($product->image) . '" />'; ?>
    <div class="card-body">
      <div class="form-group">
        <input type="hidden" name="IdPrd" value="<?php echo $product->IdPrd; ?>">
      </div>
      <h3 class="card-title text-primary"><?php echo $product->libelle; ?></h3>
      <p class="card-text"><small class="text-muted">Product reference: #<?php echo $product->code_barre; ?></small></p>
      <p class="card-text"><strong class="text-primary">Price: $<?php echo $product->prix_final; ?></strong></p>
      <button type="button" class="btn btn-outline-success btn-lg" id="add-to-cart-button">Add to Cart</button>
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









<script>
  // Get the "View Details" button element
  const viewDetailsButton = document.getElementById('view-details-button');

  // Add a click event listener to the button
  viewDetailsButton.addEventListener('click', function() {
    // Toggle the visibility of the "details-content" element
    const detailsContent = document.getElementById('details-content');
    detailsContent.classList.toggle('show');
  });

  // Get the "Add to Cart" button element
const addToCartButton = document.getElementById('add-to-cart-button');

// Add a click event listener to the button
addToCartButton.addEventListener('click', function() {
  // Get the values for the item's name, price, and image
  const name = document.querySelector('.card-title').textContent;
  const price = document.querySelector('.text-primary').textContent;
  const image = document.querySelector('.image-content').src;

  // Create a new list item to represent the item in the shopping cart
  const li = document.createElement('li');
  li.innerHTML = `<div class="cart-item-name">${name}</div>
                  <div class="cart-item-price">${price}</div>
                  <img src="${image}" class="cart-item-image">`;

  // Append the new list item to the cart items list
  const cartItems = document.getElementById('cart-items');
  cartItems.appendChild(li);
});
// Get the "Shopping Cart" link element
const shoppingCartLink = document.getElementById('cart-link');

// Add a click event listener to the link
shoppingCartLink.addEventListener('click', function() {
  // Toggle the visibility of the cart content
  const cartContent = document.getElementById('cart-content');
  cartContent.classList.toggle('show');
});


</script>