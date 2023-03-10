<?php
$data = new UsersController();
$clinets = $data->getAllclients();

// $ordersController = new OrdersController();
// $ordersController->validateOrder($orderId);
// $ordersController = new OrdersController();
// $ordersController->validateOrder($orderId, $status);

?>

<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true || $_SESSION['role'] !== 'admin') {
    Redirect::to('index');
}
?>

<div class="d-flex mx-5 mt-5 justify-content-center flex-wrap">
    <div class="card p-3 mx-2 text-center statistic mb-3">
        <a href=" <?php echo BASE_URL; ?>pdashboard" class="btn btn-success btn-primary mr-2 mb-2">Product</a>
    </div>

    <div class="card p-3 mx-2 text-center statistic mb-3">
        <a href=" <?php echo BASE_URL; ?>cdashboard" class="btn btn-info btn-primary mr-2 mb-2">Categorie</a>
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
                   
                    <?php include('./views/includes/alerts.php'); ?>
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">client</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">adresse</th>
                                    <th scope="col">ville</th>
                                    <th scope="col">email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clinets as $clinet) : ?>
                                    <tr>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $clinet['username']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $clinet['phone']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $clinet['adresse']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $clinet['ville']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $clinet['email'];?></td>
                                        
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