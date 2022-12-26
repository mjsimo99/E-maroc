<?php
$data = new FurnitureController();
$products = $data->getAllproducts();
?>
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
            <div class="form-group mb-2">
                <label for="priceRange">Price Range</label>
                <input type="range" class="form-control-range" id="priceRange" min="0" max="1000" step="50">
                <span id="priceRangeValue"></span>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>


    <!-- Product Grid -->
    <div class="row mt-5 mb-5 ">

        
  <?php foreach ($products as $product) : ?>

        <div class="col-6 col-md-4 mb-3">
            <div class="card h-100">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product["image"]) . '" />'; ?>
                <div class="card-body text-center">
                    <h5 class="card-title text-success"><?php echo $product['libelle']; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>

                    <p class="card-text"><?php echo $product['prix_achat']; ?></p>

                    <form method="post" class="mr-1" action="oneproduct">
                    <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                    <button class="btn btn-outline-success btn-lg">détails</button>
                    </form>

                </div>
            </div>
        </div>
        <?php endforeach; ?>

    
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