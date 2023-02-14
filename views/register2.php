<?php
if (isset($_POST['submit'])) {
    $createUser = new UsersController();
    $createUser->register();
}
?>
<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="views/images/laptop2.png" width="100%">
        </div>
        <div class="col-md-6">
            <h3 class="signin-text mb-3"> Register</h3>
            <form method="post" class="mr-1">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">numéro de téléphone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ville">ville</label>
                    <input type="text" name="ville" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group form-check">
                </div>
                <button class="btn btn-class" name="submit">Register</button>
            </form>
        </div>
    </div>
</div>