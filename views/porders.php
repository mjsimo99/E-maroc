<?php
if (isset($_POST['id'])) {
    $existproduct = new FurnitureController();
    $product = $existproduct->getOneProductorder();
}
?>        







<div class="container mt-5 mb-5">
    <div class="row mt-4 mb-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                   
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">libelle</th>
                                    <th scope="col">description</th>
                                    <th scope="col">unitPrice</th>
                                    <th scope="col">total</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product as $products) : ?>
                                    <tr>
                                        <input type="hidden" name="IdPrd" value="<?php echo $products->id; ?>">

                                        <td class="pt-3 pb-4" scope="row"><?php echo $products->id ?></td>
                                        <td class="pt-3 pb-4" scope="row"><?php echo $products->libelle ?></td>
                                        <td class="pt-3 pb-4"><?php echo $products->description ?></td>
                                        <td class="pt-3 pb-4"><?php echo $products->unitPrice ?></td>
                                        <td class="pt-3 pb-4"><?php echo $products->total ?></td>
                                        
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
