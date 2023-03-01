<?php
if (isset($_POST['submit'])) {
  $loginUser = new UsersController();
  $loginUser->auth();
}
?>


<div class="container" style="margin-top: 172px;">
  <div class="row content">
    <div class="col-md-6 mb-3">
      <img src="views/images/laptop2.png" width="100%" ;>
    </div>
    <div class="col-md-6">
      <?php include('./views/includes/alerts.php'); ?>

      <h3 class="signin-text mb-3"> Sign In</h3>
      <form method="post" class="mr-1">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <input type="hidden" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
          <label class="form-check-label" for="checkbox">Remember Me</label>
        </div>
        <button class="btn btn-class" name="submit">Login</button>
      </form>
    </div>
  </div>
</div>