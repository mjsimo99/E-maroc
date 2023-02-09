<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr class="thead-light">
                        <th>Produit</th>
                        <th>Prix</th>
                        <th class="text-center">Qte</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION as $name => $product) : ?>  
                        
                        <?php if (substr($name, 0, 9) == "products_") : ?>
                            <tr>
                                <td><?php echo $product["libelle"]; ?></td>
                                <td><?php echo $product["prix_achat"]; ?></td>
                                <td class="text-center">
                                    <input type="number" id="qty-<?php echo $product["IdPrd"]; ?>" min="1" value="<?php echo $product["qty"]; ?>" data-price="<?php echo $product["prix_achat"]; ?>" >
                                </td>
                                <td id="total-<?php echo $product["IdPrd"]; ?>"><?php echo $product["total"]; ?>Dh</td>
                                <td>
                                    <form method="POST" action="<?php echo BASE_URL; ?>cancelcart">
                                        <input type="hidden" name="IdPrd" value="<?php echo $product["IdPrd"]; ?>">
                                        <input type="hidden" name="prix_achat" value="<?php echo $product["prix_achat"]; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                            <i class="fa-solid fa-trash text-center"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <div class="col-4 col-md-4 float-right bg-white">
            <table class="table table-bordered border-primary">
                <tbody>
                    <tr>
                        <th scope="row">Produits</th>
                        <td>
                            <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Total TTC</th>
                        <td>
                            <strong id="amount">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?> <span class="bb-danger">dh</span>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>


            <button type="submit" class="btn btn-primary" id="buy-button">Acheter</button>


            <button type="submit" class="btn btn-danger ms-3">
                Vider le panier
            </button>

            <form method="post" id="addorder" action="<?php echo BASE_URL; ?>addOrder"></form>

            <script>
                document.querySelector("#buy-button").addEventListener("click", function() {
                    var form = document.querySelector("#addorder");
                    if (form) {
                        form.submit();
                    }
                });
            </script>




        </div>
    </div>
    <div class="mt-5" id="achat" style="display: flex;justify-content:center;justify-items: center;"></div>



</div>