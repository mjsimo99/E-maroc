<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {

Redirect::to('odashboard');} 
?>
<?php 
	if (isset($_POST['id'])) {
		$exitFurniture = new OrdersController();
		$exitFurniture->removeOrder();

 	}
?>

