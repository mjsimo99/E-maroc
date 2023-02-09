<?php
$data = new FurnitureController();
$products = $data->getAllproducts();
?>

<div class="custom-rounded wave">
  <!-- collapse -->
  <div class="firstone border d-flex justify-content-center align-items-center" style="background-color: antiquewhite;">
    <div class="first-text w-50" style="margin-left: 20px;">
      <h3 class="">We have everything you need</h3>
      <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod elit et congue luctus. Ut cursus diam ac dolor bibendum, ut porttitor magna dictum</p>
      <a href="#" class="logireg btn btn-outline-success rounded-0 bg-dark px-5">Shop Now</a>

    </div>
    <div>
      <img class="front_image" src="views/images/laptop.png" width="90%" ;>
    </div>
  </div>
</div>

<div class="col-12 col-sm-10 mx-auto mt-3">



  <h2 class="display-8 text-center py-2" style="background-color:#FF9900;">Catégorie</h2>
  <div class="row">
    <div class="col-sm-4">
      <a href="#" class="btn btn-primary" data-id="home_DTB_EoYS_Spm_Lessive_HP" data-name="DTB_EoYS_Spm_Lessive_HP" data-creative="" data-position="bannerfloor_6_1" data-track-onclick="eecPromo" data-track-onview="eecPromo" data-track-onclick-bound="true">
        <img data-src="views/images/lapto.png" src="views/images/lapto.png" class="img-fluid" alt="Lessive">
      </a>
    </div>
    <div class="col-sm-4">
      <a href="#" class="btn btn-primary" data-id="home_DTB_EoYS_Spm_EpSucree_HP" data-name="DTB_EoYS_Spm_EpSucree_HP" data-creative="" data-position="bannerfloor_6_2" data-track-onclick="eecPromo" data-track-onview="eecPromo" data-track-onclick-bound="true">
        <img data-src="views/images/lapto.png" src="views/images/lapto.png" class="img-fluid" alt="Lessive">
      </a>
    </div>
    <div class="col-sm-4">
      <a href="#" class="btn btn-primary" data-id="home_DTB_EoYS_Spm_EpSucree_HP" data-name="DTB_EoYS_Spm_EpSucree_HP" data-creative="" data-position="bannerfloor_6_2" data-track-onclick="eecPromo" data-track-onview="eecPromo" data-track-onclick-bound="true">
        <img data-src="views/images/lapto.png" src="views/images/lapto.png" class="img-fluid" alt="Lessive">
      </a>
    </div>
  </div>
</div>


<div class="container mt-5" id="offer">
  <div class="row">
    <div class="col-md-4 py-3 py-md-0 d-flex align-items-center">
      <div>
        <i class="fa fa-truck" style="color:black;"></i>
      </div>
      <div class="ml-3">
        <h5>Free Shipping</h5>
        <p>On orders over $100</p>
      </div>
    </div>

    <div class="col-md-4 py-3 py-md-0 d-flex align-items-center">
      <i class="fa fa-thumbs-up fa-solid"></i>
      <div class="ml-3">
        <h5>Big Choice</h5>
        <p>Of product</p>
      </div>
    </div>

    <div class="col-md-4 py-3 py-md-0 d-flex align-items-center">
      <i class="fa fa-shopping-cart" style="color: black;"></i>
      <div class="ml-3">
        <h5>Fast Delivery</h5>
        <p>World wide</p>
      </div>
    </div>


  </div>
</div>





<div class="banner">
  <div class="content2">
    <h1 class="getup">Get Up To 50% Off</h1>
    <p class="getup">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, animi?</p>
    <div id="bannerbtn"> <a href="#" class="logireg btn btn-outline-success rounded-0 px-5">Shop Now</a>
    </div>
  </div>
</div>



<div class="text-center" style=" margin: 5% 0px;">
  <h1 id="title1">PRODUCT</h1>
</div>
<div class="all d-flex justify-content-around mb-4 flex-wrap col-12 col-sm-10 mx-auto mt-3">

  <?php foreach ($products as $product) : ?>

    <div class="card text-center mb-3" style="width: 20rem;">
      <!-- <img src="views/images/laptop.jpg" class="card-img-top" alt="Image"> -->
      <?php echo '<img class="img_index" src="data:image/jpeg;base64,' . base64_encode($product["image"]) . '" />'; ?>

      <div class="card-body">
        <h5 class="card-title text-success"><?php echo $product['libelle']; ?></h5>
        <p class="card-text"><?php echo $product['description']; ?></p>
        <a href="#" class="btn btn-outline-success btn-lg">Learn More</a>
      </div>
    </div>
  <?php endforeach; ?>






</div>
</div>

<div class="text-center mb-5">
  <a href="product" class="logireg btn btn-outline rounded-0 bg-dark px-5 text-center">View More</a>
</div>