<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Electro Maroc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../Satoru-MVC2/views/includes/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


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
            <a class="nav-link active" href="product2">product</a>
          </li>
          <li class="nav-item" style="width: 100px;">
            <a class="nav-link active d-flex align-items-center justify-content-center" href="cart">
              <i class="bi bi-cart4 me-2"></i> Cart
            </a>
          </li>




        </ul>

        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'admin') { ?>




          <div class="d-flex">
            <a href="pdashboard" class="logireg btn btn-outline-success">dashboard</a>

            <div class="dropdown" style="margin-right: 49px;">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 4a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM5.5 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z" />
                </svg>
                <?php echo $_SESSION['username']; ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Logout</a></li>
              </ul>
            </div>

          </div>
        <?php  } ?>
        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'client') { ?>


          </ul>

          <div class="d-flex">
          <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">

            <a href="profile" class="logireg btn btn-outline-success">profile</a>


          <div class="dropdown" style="margin-right: 49px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 4a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM5.5 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z" />
              </svg>
              <?php echo $_SESSION['username']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="adminDropdown">
              <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Logout</a></li>
            </ul>
          </div>


      </div>
    <?php  } ?>
    <?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) { ?>
      </ul>

      <div class="d-flex" style="margin-right:5%;" action="register2">
        <a href="login" class="logireg btn btn-outline-success">Login</a>


        <a href="register2" class="logireg btn btn-outline-success">Register</a>
      </div>
    </div>
  <?php  } ?>


  </div>
  </nav>