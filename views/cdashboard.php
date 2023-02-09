<?php
$data = new FurnitureController();
$products = $data->getAllcatégorie();



?>

<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {

    Redirect::to('index');
}
?>

<div class="d-flex mx-5 mt-5 justify-content-center flex-wrap">
    <div class="card p-3 mx-2 text-center statistic mb-3">
    <a href=" <?php echo BASE_URL; ?>pdashboard" class="btn btn-success btn-primary mr-2 mb-2">product</a>
    </div>

    <div class="card p-3 mx-2 text-center statistic mb-3">
    <a href=" <?php echo BASE_URL; ?>cdashboard" class="btn btn-info btn-primary mr-2 mb-2">categorie</a>
    </div>

    </div>

</div>






<div class="container mt-5 mb-5">
    <div class="row mt-4 mb-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a href=" <?php echo BASE_URL; ?>addcategorie" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <?php include('./views/includes/alerts.php'); ?>
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">image</th>
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo '<img class="imgdash" src="data:image/jpeg;base64,' . base64_encode($product["image_categorie"]) . '" />'; ?></td>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $product['nom']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['description_categorie']; ?></td>

                                        <td class="d-flex flex-row pt-3 pb-4">
                                            <form method="POST" class="mr-1" action="updatec">
                                                <input type="hidden" name="IdCat" value="<?php echo $product['IdCat']; ?>">
                                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="deletec">
                                                <input type="hidden" name="IdCat" value="<?php echo $product['IdCat']; ?>">
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- <video src="movie.ogg" autoplay loop muted playsinline></video> -->
