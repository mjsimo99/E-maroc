<?php
$data = new FurnitureController();
$products = $data->getAllproducts();
$catégories = $data->getAllcatégorie();

?>


<div class="container mt-5">
    <!-- Filter Form -->
    <div class="col-12 col-md-3 mb-3 mx-auto">
        <?php include('./views/includes/alerts.php'); ?>

        <h5>Filter Products</h5>
        <hr>
        <form>
            <div class="form-group">
                <label for="categorySelect">Category</label>
                <select class="form-control" id="categorySelect" name="categorySelect">
                    <option value="all">Select All</option>
                    <?php foreach ($catégories as $catégorie) : ?>
                        <option><?php echo $catégorie['nom']; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group mb-2">
                <label for="priceRange">Price Range</label>
                <input type="range" class="form-control-range" id="priceRange" min="0" max="1000" step="50">
                <span id="priceRangeValue"></span>

            </div>
            <!-- <div class="text-center">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div> -->
        </form>
    </div>


    <!-- Product Grid -->
    <div class="row mt-5 mb-5">
    <?php foreach ($products as $product) : ?>
        <?php if ($product['p_status'] == 1) : ?>

        <div class="col-sm-6 col-md-4 mb-3 product" data-category="<?php echo Furniture::namecategorie(["id_categorie" => $product["id_categorie"]])->nom; ?>" data-page="1">
            <div class="card h-100">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product["image"]) . '" style="height: 400px; width: auto;" />'; ?>
                <div class="card-body text-center">
                    <h5 class="card-title text-success"><?php echo $product['libelle']; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                    <p class="card-text priceachat"><?php echo $product['prix_achat']; ?></p>
                    <p class="card-text">Categorie: <?php echo Furniture::namecategorie(["id_categorie" => $product["id_categorie"]])->nom; ?></p>
                    <form method="post" class="mr-1" action="oneproduct">
                        <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                        <button class="btn btn-outline-success btn-lg">détails</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif ?>
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
<script>
    document.getElementById("categorySelect").addEventListener("change", function() {
        var selectedCategory = this.value;
        var products = document.getElementsByClassName("product");
        for (var i = 0; i < products.length; i++) {
            var productCategory = products[i].getAttribute("data-category");
            if (selectedCategory === "all" || productCategory === selectedCategory) {
                products[i].style.display = "block";
            } else {
                products[i].style.display = "none";
            }
        }
        // var newUrl = window.location.href.split("?")[0] + "?category=" + selectedCategory;
        // window.history.pushState({}, "", newUrl);
    });
</script>







































<!-- <script>
    var productsPerPage = 6;
    var currentPage = 1;
    function updateDisplayedProducts() {
    var products = document.getElementsByClassName("product");
    for (var i = 0; i < products.length; i++) {
        if ((i >= (currentPage - 1) * productsPerPage) && (i < currentPage * productsPerPage)) {
            products[i].style.display = "block";
        } else {
            products[i].style.display = "none";
        }
    }
}

</script> -->