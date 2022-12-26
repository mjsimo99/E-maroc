<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro Maroc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Satoru-MVC2/views/includes/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<style>
  #offer {
  background-color: #f5f5f5;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#offer .col-md-4 {
  display: flex;
  align-items: center;
  justify-content: center;
}

#offer i {
  font-size: 40px;
  color: #333;
}

#offer h5 {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

#offer p {
  margin: 0;
  font-size: 14px;
  color: #666;
}

</style>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">




  <div class="container-fluid">
    
    <a class="navbar-brand ms-5" href="index"><img src="views/images/logo.png" width="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="product">product</a>
        </li>
                  <i class="fa fa-cart-shopping"></i>

        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){ ?>


                  </ul>
      
      <div class="d-flex" style="margin-right:5%;" action="register">
      <li>
									<a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 ">
									<i class="fa fa-user" aria-hidden="true" style="margin-right:10%;"><?php echo $_SESSION['username'];?></i>
									</a></li>
                  <a href=""><i class="fa fa-cart-shopping"></i></a>


    </div>
    <a href="addproduct" class="logireg btn btn-outline-success">addprod</a>
    <a href="addcategorie" class="logireg btn btn-outline-success">addcat</a>


    </div>
									<?php  } ?>
									<?php if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){ ?>
                    </ul>
      
                  <div class="d-flex" style="margin-right:5%;" action="register">
                  <a href="login" class="logireg btn btn-outline-success">Login</a>
                  
                  
                <a href="register" class="logireg btn btn-outline-success">Register</a>
                </div>
                </div>
									<?php  } ?>


  </div>
</nav>