<?php
$data = new FurnitureController();
$products = $data->getAllproducts();
?>
<?php
$data = new FurnitureController();
$catégories = $data->getAllcatégorie();
?>


<div class="container mt-5">
    <!-- Filter Form -->
    <div class="col-12 col-md-3 mb-3 mx-auto">
        <h5>Filter Products</h5>
        <hr>
        <form>
            <div class="form-group mb-2 text-center">
                <label for="categorySelect">Category</label>
                <select class="form-control" id="categorySelect" name="categorySelect">
                    <option value="all">Select All</option>
                    <?php foreach ($catégories as $catégorie) : ?>
                        <option><?php echo $catégorie['nom']; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group mb-2 text-center">

                <label for="min_price">Minimum Price*</label>
                <input type="number" id="min_price" name="min_price" class="form-control" min="0" max="10000" step="25" value="0">

                <label for="max_price">Maximum Price*</label>
                <input type="number" id="max_price" name="max_price" class="form-control" min="0" max="10000" step="25" value="100">

                <input type="button" value="Filter" onclick="filterByPrice()" class="btn btn-warning mt-2">

            </div>

        </form>
    </div>


    <!-- Product Grid -->

    <div class="row mt-5 mb-5 ">
        <?php foreach ($products as $product) : ?>

            <div class="col-6 col-md-4 mb-3 product" data-category="<?php echo $product['nom']; ?>" data-page="1">
                <div class="card h-100">
                    <?php echo '<img class="img-size" src="data:image/jpeg;base64,' . base64_encode($product["image"]) . '" />'; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title text-success"><?php echo $product['libelle']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>

                        <p class="card-text priceachat"><?php echo $product['prix_achat']; ?></p>

                        <p class="card-text priceachat"><?php echo $product['nom']; ?></p>

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
        var newUrl = window.location.href.split("?")[0] + "?category=" + selectedCategory;
        window.history.pushState({}, "", newUrl);
    });
</script>


<script>
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
</script>
<script>
    function filterByPrice() {
        var min_price = document.getElementById("min_price").value;
        var max_price = document.getElementById("max_price").value;
        var cards = document.getElementsByClassName("card");
        var parentdiv = document.getElementsByClassName("product");

        for (var i = 0; i < cards.length; i++) {
            var price = parseFloat(cards[i].getElementsByClassName("priceachat")[0].innerHTML);

            if (price >= min_price && price <= max_price) {
                cards[i].style.display = "";

            } else {
                cards[i].style.display = "none";
                parentdiv[i].style.display = "none";

            }
        }
    }
</script>
