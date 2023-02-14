<?php
$data = new OrdersController();
$products = $data->getAllOrders();

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
        <a href=" <?php echo BASE_URL; ?>odashboard" class="btn btn-dark btn-primary mr-2 mb-2">Client-Orders</a>
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
                                    <th scope="col">client</th>
                                    <th scope="col">libelle</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">total</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $product['client']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['libelle']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['qty']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['total'] ?></td>
                                        <td class="pt-3 pb-4"><?php echo $product['status']
                                                    ?
                                                    '<span class="badge text-bg-success">Product Shipped</span>'
                                                    :
                                                    '<span class="badge text-bg-danger">Need Validation</span>'; ?>
                                        </td>
                                        <td class="d-flex flex-row pt-3 pb-4">
                                            <form action="validate" method="post">
                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                                <button class="btn btn-sm btn-success" type="submit" value="Validate"> <i class="bi bi-check-circle-fill"></i>
                                                </button>
                                                    
                                            </form>


                                            <form method="POST" class="ms-1" action="deleteorder">
                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
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