

  // Toggle the display of the table when the Add to Cart icon is clicked
  document.getElementById("add-to-cart").addEventListener("click", function() {
    let cartTable = document.getElementById("cart-table");
    if (cartTable.classList.contains("hidden")) {
      cartTable.classList.remove("hidden");
    } else {
      cartTable.classList.add("hidden");
    }
  });





    // // Get the "Add to Cart" button element
    // const addToCartButton = document.getElementById('add-to-cart-button');

    // // Add a click event listener to the button
    // addToCartButton.addEventListener('click', function() {
    //   // Get the product information
    //   const productId = document.querySelector('input[name="IdPrd"]').value;
    //   const productImage = document.querySelector('.image-content').src;
    //   const productName = document.querySelector('.card-title').textContent;
    //   const productPrice = parseFloat(document.querySelector('.prix-primary').textContent.slice(6));
  
    //   // Check if the product is already in the table
    //   const existingRow = document.querySelector(`#cart-table tbody tr[data-id="${productId}"]`);
    //   if (existingRow) {
    //     // If the product is already in the table, increment the quantity and update the total price
    //     const existingQuantityInput = existingRow.querySelector('.quantity');
    //     const existingTotalPrice = parseFloat(existingRow.querySelector('.total-price').textContent);
    //     existingQuantityInput.value = parseInt(existingQuantityInput.value, 10) + 1;
    //     existingRow.querySelector('.total-price').textContent = (existingTotalPrice + productPrice).toFixed(2);
    //     return;
    //   }
  
    //   // If the product is not in the table, add it to the cart
    //   // Get the table body element
    //   const tableBody = document.querySelector('#cart-table tbody');
  
    //   // Create a new row for the product
    //   const newRow = document.createElement('tr');
  
    //   // Add the product information to the row
    //   newRow.innerHTML = `
    //     <td>${productId}</td>
    //     <td><img src="${productImage}" alt="${productName}" width="50"></td>
    //     <td>${productName}</td>
    //     <td>${productPrice.toFixed(2)}</td>
    //     <td><input type="number" class="quantity" value="1" style="width:10%;"></td>
    //     <td class="total-price">${productPrice.toFixed(2)}</td>
    //   `;
    //   newRow.setAttribute('data-id', productId);
  
    //   // Add the new row to the table
    //   tableBody.appendChild(newRow);
    // });
  
