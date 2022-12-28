<style>
  .hidden {
    display: none;
  }
</style>

<!-- Add to Cart icon -->
<!-- <button id="add-to-cart">
  <img src="add-to-cart.png" alt="Add to Cart">
</button> -->

<li class="nav-item bg-dark" id="add-to-cart">
<a href="#" class="nav-link active" id="cart-link">
  <i class="fa fa-shopping-cart" style="font-size: 24px; "></i>
</a>
</li>

<!-- Table that is displayed when the Add to Cart icon is clicked -->

<table  id="cart-table" class="table hidden table-striped table-dark text-white">
  <thead>
    <tr>
      <th>id</th>
      <th>image</th>
      <th>libelle</th>
      <th>prix</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>John</td>
      <td>Doe</td>
      <td>@johndoe</td>
    </tr>

  </tbody>
</table>

<script>
  // Toggle the display of the table when the Add to Cart icon is clicked
  document.getElementById("add-to-cart").addEventListener("click", function() {
    let cartTable = document.getElementById("cart-table");
    if (cartTable.classList.contains("hidden")) {
      cartTable.classList.remove("hidden");
    } else {
      cartTable.classList.add("hidden");
    }
  });
</script>
