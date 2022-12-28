
<footer id="footer" class="footer navbar-dark bg-dark">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<div class="footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>	
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>	
					</div>
					<p>
						©copyright. designed and developed by <a href="#"  class="mj">majidi</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top" style="display: block;">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer>

		<!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script> -->


		<script src="../../../Satoru-MVC2/views/includes/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>



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
      // Get the product information
      const productId = document.querySelector('input[name="IdPrd"]').value;
      const productImage = document.querySelector('.image-content').src;
      const productName = document.querySelector('.card-title').textContent;
      const productPrice = parseFloat(document.querySelector('.prix-primary').textContent.slice(6));
  
      // Check if the product is already in the table
      const existingRow = document.querySelector(`#cart-table tbody tr[data-id="${productId}"]`);
      if (existingRow) {
        // If the product is already in the table, increment the quantity and update the total price
        const existingQuantityInput = existingRow.querySelector('.quantity');
        const existingTotalPrice = parseFloat(existingRow.querySelector('.total-price').textContent);
        existingQuantityInput.value = parseInt(existingQuantityInput.value, 10) + 1;
        existingRow.querySelector('.total-price').textContent = (existingTotalPrice + productPrice).toFixed(2);
        return;
      }
  
      // If the product is not in the table, add it to the cart
      // Get the table body element
      const tableBody = document.querySelector('#cart-table tbody');
  
      // Create a new row for the product
      const newRow = document.createElement('tr');
  
      // Add the product information to the row
      newRow.innerHTML = `
        <td>${productId}</td>
        <td><img src="${productImage}" alt="${productName}" width="50"></td>
        <td>${productName}</td>
        <td>${productPrice.toFixed(2)}</td>
        <td><input type="number" class="quantity" value="1" style="width:10%;"></td>
        <td class="total-price">${productPrice.toFixed(2)}</td>
      `;
      newRow.setAttribute('data-id', productId);
  
      // Add the new row to the table
      tableBody.appendChild(newRow);
    });
  









    


















    
</script>
