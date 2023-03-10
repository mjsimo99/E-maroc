<?php
$data = new FurnitureController();
$products = $data->getAllproducts();


?>

<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true || $_SESSION['role'] !== 'admin') {
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
    <div class="card p-3 mx-2 text-center statistic mb-3">
        <a href=" <?php echo BASE_URL; ?>odashboard" class="btn btn-dark btn-primary mr-2 mb-2">Client</a>
    </div>
    <div class="card p-3 mx-2 text-center statistic mb-3">
        <a href=" <?php echo BASE_URL; ?>oodashboard" class="btn btn-danger btn-primary mr-2 mb-2">Client-Orders</a>
    </div>
</div>

</div>






<div class="container mt-5 mb-5">
    <div class="row mt-4 mb-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a href=" <?php echo BASE_URL; ?>addproduct" class="btn btn-sm btn-primary mr-2 mb-2">
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
                                    <th scope="col">prix</th>
                                    <th scope="col">quantity</th>

                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo '<img class="imgdash" src="data:image/jpeg;base64,' . base64_encode($product["image"]) . '" />'; ?></td>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $product['libelle']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['description']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['prix_achat']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['qty'] ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['p_status']
                                                    ?
                                                    '<span class="badge text-bg-success">Product showed</span>'
                                                    :
                                                    '<span class="badge text-bg-danger">Product hidden</span>'; ?>
                                        </td>
                                        <td class="d-flex flex-row pt-3 pb-4">
                                            <form method="POST" class="mr-1" action="update">
                                                <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="delete">
                                                <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="hideproduct">
                                                <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                                                <button class="btn btn-sm btn-secondary"><i class="bi bi-eye-slash"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="showproduct">
                                                <input type="hidden" name="IdPrd" value="<?php echo $product['IdPrd']; ?>">
                                                <button class="btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></button>
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