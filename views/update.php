<?php
$data = new FurnitureController();
$catégories = $data->getAllcatégorie();
if (isset($_POST['IdPrd'])) {
    $existProduct = new FurnitureController();
    $product = $existProduct->getOneProduct();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $existProduct = new FurnitureController();
    $existProduct->updateProduct();
}
?>
<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {

    Redirect::to('index');
}
?>
<div class="container">
    <div class="row content">

        <div class="col-md-6">
            <?php include('./views/includes/alerts.php'); ?>

            <h3 class="signin-text mb-3">Add Product</h3>
            <form method="POST" enctype="multipart/form-data" class="mr-1">
                <div class="form-group">
                    <input type="hidden" name="IdPrd" value="<?php echo $product->IdPrd; ?>">
                </div>
                <div class="form-group">
                    <label for="libelle">Libelle*</label>
                    <input type="text" name="libelle" class="form-control" value="<?php echo $product->libelle; ?>">
                </div>
                <div class="form-group">
                    <label for="code_barre">Code Barre*</label>
                    <input type="number" name="code_barre" class="form-control" value="<?php echo $product->code_barre; ?>">
                </div>
                <div class="form-group">
                    <label for="prix_achat">Prix D’achat*</label>
                    </label>
                    <input type="number" name="prix_achat" class="form-control" value="<?php echo $product->prix_achat; ?>">
                </div>
                <div class="form-group">
                    <label for="prix_final">prix final*</label>
                    <input type="number" name="prix_final" class="form-control" value="<?php echo $product->prix_final; ?>">
                </div>
                <div class="form-group">
                    <label for="Prix_offre">Prix offre*</label>
                    <input type="number" name="Prix_offre" class="form-control" value="<?php echo $product->Prix_offre; ?>">
                </div>
                <div class="form-group">
                    <label for="description">description*</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $product->description; ?>">
                </div>
                <div class="form-group">
                    <label for="id_categorie">catégorie*</label>
                    <select class="form-control" id="categorySelect" name="id_categorie">
                        <?php foreach ($catégories as $catégorie) : ?>

                            <option value="<?php echo $catégorie['IdCat']; ?>"><?php echo  $catégorie['nom']; ?></option>

                        <?php endforeach; ?>
           
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="image">image*</label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="image">
                </div>
                <div class="form-group">
                    <label for="qty">description*</label>
                    <input type="number" name="qty" class="form-control" value="<?php echo $product->qty; ?>">
                </div>

                <!-- <div class="form-group form-check">
          <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
          <label class="form-check-label" for="checkbox">Remember Me</label>
        </div> -->
                <button class="btn btn-class" type="submit" name="submit">Add</button>
            </form>
        </div>
        <div class="col-md-6 mb-3">
            <img src="views/images/mobile.png" width="80%" ;>
        </div>
    </div>
</div>
<?php
