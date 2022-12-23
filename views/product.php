<div class="container mt-5">
    <!-- Filter Form -->
    <div class="col-12 col-md-3 mb-3 mx-auto">
        <h5>Filter Products</h5>
        <hr>
        <form>
            <div class="form-group">
                <label for="categorySelect">Category</label>
                <select class="form-control" id="categorySelect">
                    <option>All</option>
                    <option>Electronics</option>
                    <option>Clothing</option>
                    <option>Home &amp; Kitchen</option>
                    <option>Beauty</option>
                </select>
            </div>
            <div class="form-group">
                <label for="priceRange">Price Range</label>
                <input type="range" class="form-control-range" id="priceRange" min="0" max="1000" step="50">
                <span id="priceRangeValue"></span>

            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>


    <!-- Product Grid -->
    <div class="row mt-5 mb-5 ">
        <div class="col-6 col-md-4 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="views/images/laptop.jpg" alt="Product 1">
                <div class="card-body">
                    <h5 class="card-title">Product 1</h5>
                    <p class="card-text">$50</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="views/images/laptop.jpg" alt="Product 2">
                <div class="card-body">
                    <h5 class="card-title">Product 2</h5>
                    <p class="card-text">$100</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="views/images/laptop.jpg" alt="Product 4">
                <div class="card-body">
                    <h5 class="card-title">Product 3</h5>
                    <p class="card-text">$75</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Pagination -->
    <nav aria-label="Product Grid Pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>