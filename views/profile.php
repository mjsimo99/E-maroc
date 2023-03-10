<?php
$data = new OrdersController();
$orders = $data->getAllOrder();
?>
<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true || $_SESSION['role'] !== 'client') {
    Redirect::to('index');
}
?>
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
                                    <th scope="col">order</th>
                                    <th scope="col">client</th>
                                    <th scope="col">creationdate</th>
                                    <th scope="col">sendingDate</th>
                                    <th scope="col">deliveryDate</th>
                                    <th scope="col">totalprice</th>
                                    <th scope="col">Product/Facture</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <?php if($_SESSION['username'] == $order['username']) : ?>

                                    <tr>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $order['id']; ?></td>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $order['username']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $order['creationdate']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $order['sendingDate']; ?></td>
                                        <td class="pt-3 pb-4"><?php echo $order['deliveryDate'] ?></td>
                                        <td class="pt-3 pb-4"><?php echo $order['totalprice'] ?></td>
                                        <td class="pt-3 pb-4">
                                            <div class="d-flex justify-content-center">
                                            <form method="post" class="mr-1 mx-2" action="porders">
                                                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                                <button class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill"></i></button>
                                            </form>
                                            <form method="post" class="mr-1" action="facture">
                                                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                                <button class="btn btn-sm btn-warning"><i class="bi bi-credit-card-2-front-fill"></i></button>
                                            </form>
                                            </div>

                                        </td>
                                        <td class="pt-3 pb-4"><?php echo $order['status']
                                                                    ?
                                                                    '<span class="badge text-bg-success">Product Shipped</span>'
                                                                    :
                                                                    '<span class="badge text-bg-danger">Need Validation</span>'; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>