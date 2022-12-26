  // Select the price range input and value span
  const priceRange = document.querySelector('#priceRange');
  const priceRangeValue = document.querySelector('#priceRangeValue');

  // Update the value span when the input value changes
  priceRange.addEventListener('input', () => {
    priceRangeValue.textContent = `${priceRange.value} $`;
  });




