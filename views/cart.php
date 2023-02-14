<div class="container">
    <div class="row flex-column">
        <div class="col-md-8 bg-white mt-5">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th class="text-center">Qte</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION as $name => $product) : ?>

                            <?php if (substr($name, 0, 9) == "products_" && isset($product["qty"]) && $product["qty"] > 0) : ?>

                            <tr>
                                <td><?php echo $product["libelle"]; ?></td>
                                <td><?php echo $product["prix_achat"]; ?></td>
                                <td class="text-center">
                                <?php echo $product["qty"]; ?>
                                </td>
                                <td id="total-<?php echo $product["IdPrd"]; ?>"><?php echo $product["total"]; ?>Dh</td>
                                <td>
                                    <form method="POST" action="<?php echo BASE_URL; ?>cancelcart">
                                        <input type="hidden" name="IdPrd" value="<?php echo $product["IdPrd"]; ?>">
                                        <input type="hidden" name="prix_achat" value="<?php echo $product["prix_achat"]; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                            <i class="bi bi-trash2-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <div class="col-4 col-md-4 float-right bg-white mb-5 mt-5">
            <!-- <table class="table table-bordered border-primary"> -->
            <table class="table align-middle mb-0 bg-light mb-5">
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

            <div class="text-center">
                <button type="button" class="btn btn-primary" id="buy-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Acheter
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    vider le panier
                </button>
            </div>
            <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="addOrder" method="post" style="width: 100%; max-width: 500px; padding: 2rem; margin: auto;">

                    </div>
                </div>
            </div> -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to clear the cart?
                        </div>
                        <div class="modal-footer">
                            <form action="clearcart" method="post">
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="clear" value="clear">vider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="addOrder" method="post" style="width: 100%; max-width: 500px; padding: 2rem; margin: auto;">
                            <div class="form-group mb-3">
                                <label for="card-number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="card-number" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="card-holder-name" class="form-label">Cardholder name</label>
                                <input type="text" class="form-control" id="card-holder-name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="expiry-date">Expiry date</label>
                                <input class="form-control expire" type="text" placeholder="MM / YYYY" id="expiry-date" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="security-number">Security Number</label>
                                <input class="form-control ccv" type="text" placeholder="CVC" maxlength="3" id="security-number" required />
                            </div>

                            <div style="text-align: center;">
                                <!-- <button class="btn btn-primary buy" id="buy-button1" type="submit" id="paypalbutton">
                                    <i class="fa fa-cc-paypal fa-brands"></i> Pay
                                </button> -->
                                <input type="submit" name="pay" value="Pay">

                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <form method="post" id="addorder" action="<?php echo BASE_URL; ?>addOrder"></form>



        </div>
    </div>
    <div class="mt-5" id="achat" style="display: flex;justify-content:center;justify-items: center;"></div>



</div>



<!-- <script>
    let qtyInputs = document.querySelectorAll("input[type='number']");

    qtyInputs.forEach(function(input) {
        input.addEventListener("change", function() {
            let qty = input.value;
            let price = input.dataset.price;
            let productId = input.id.split("-")[1];
            let total = qty * price;

            // Update the total TTC for the product
            document.querySelector("#total-" + productId).textContent = total + " Dh";

            // Calculate the new total TTC
            let totalTTC = 0;
            qtyInputs.forEach(function(input) {
                totalTTC += parseInt(input.value) * parseInt(input.dataset.price);
            });
            document.querySelector("#amount").textContent = totalTTC + " Dh";
        });
    });
</script> -->