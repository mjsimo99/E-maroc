<?php
if (isset($_POST['id'])) {
    $existfacture = new FurnitureController();
    $facture = $existfacture->getOneProductorder();
    // die(var_dump($facture));
}
?>

<style>
    .container {
        margin-top: 174px;
        margin-bottom: 173px;
    }

    .card {
        margin: 0 auto;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="form-group">
                </div>
                <div class="card-header">


                    <?php
                    $counter = 0; 
                    foreach ($facture as $products) :
                        $counter++; 
                        if ($counter == 1) : 
                    ?>
                            Factur Number: <?php echo $products->oId ?>
                    <?php
                        endif;
                    endforeach;
                    ?>





                </div>
                <div class="card-body">
                    <?php foreach ($facture as $products) : ?>

                        <h5 class="card-title">Product Name: <?php echo $products->libelle ?></h5>
                        <p class="card-text">Product Description: <?php echo $products->description ?>.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Quantity: <?php echo $products->qty ?></li>
                            <li class="list-group-item">Price: <?php echo $products->unitPrice ?></li>
                        </ul>
                    <?php endforeach; ?>
                    <?php
                    $counter = 0; 
                    foreach ($facture as $products) :
                        $counter++; 
                        if ($counter == 1) : 
                    ?>
                            <h1 class="list-group-item">Total: <?php echo $products->totalprice ?></h1>

 <?php
                        endif;
                    endforeach;
                    ?>

                </div>


                <?php
                    $counter = 0; 
                    foreach ($facture as $products) :
                        $counter++; 
                        if ($counter == 1) : 
                    ?>

                    <div class="card-footer text-muted">
                        Date: <?php echo $products->deliveryDate ?>
                    </div>
                    <?php
                        endif;
                    endforeach;
                    ?>


            </div>
        </div>
    </div>
</div>
