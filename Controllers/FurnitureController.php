<?php

class FurnitureController
{




	



	public function getAllProducts_2()
	{
		$page =  ($_SERVER['REQUEST_URI'][(strlen($_SERVER['REQUEST_URI']) - 1)]);
		if ($page == 1 ||  !is_numeric($page)) $count = 0;
		else $count = ($page - 1) * 6;
		$products = Furniture::getAll_2($count);
		return $products;
	}



	public function getAllproducts()
	{
		$furnitures = Furniture::getAll();

		return $furnitures;
	}




	public function addProduct()
	{


		if (isset($_POST['submit'])) {
			// Check if any of the form fields are empty
			if (empty($_POST['libelle']) || empty($_POST['code_barre']) || empty($_POST['prix_achat']) || empty($_POST['prix_final']) || empty($_POST['Prix_offre']) || empty($_POST['description']) || empty($_FILES['image'])  || empty($_POST['code_barre'] || empty($_POST['qty']))) {
				// Display error message
				echo "All form fields are required. Please fill out the form and try again.";
			} else {
				$data = array(
					'libelle' => $_POST['libelle'],
					'code_barre' => $_POST['code_barre'],
					'prix_achat' => $_POST['prix_achat'],
					'prix_final' => $_POST['prix_final'],
					'Prix_offre' => $_POST['Prix_offre'],
					'description' => $_POST['description'],
					'image' => file_get_contents($_FILES['image']['tmp_name']),
					'id_categorie' => $_POST['id_categorie'],
					'qty' => $_POST['qty']

				);
				$result = Furniture::add($data);
				if ($result === 'ok') {
					Session::set('success', 'Produit Ajouté');


					Redirect::to('product');
					// Form was submitted successfully
				} else {
					echo $result;
				}
			}
		}
	}

	public function getOneProductorder()
	{
		if (isset($_POST['id'])) {
			$data = array(
				'id' => $_POST['id'],
			);
			$furniture = Furniture::getProductsOrder($data);
			return $furniture;
		}
	}
	public function getOneProduct()
	{
		if (isset($_POST['IdPrd'])) {
			$data = array(
				'IdPrd' => $_POST['IdPrd'],
			);
			$furniture = Furniture::getProduct($data);
			return $furniture;
		}
	}
	// public function getNameCategorie()
	// {
	// 	if (isset($_POST['id_categorie'])) {
	// 		$data = array(
	// 			'id_categorie' => $_POST['id_categorie'],
	// 		);
	// 		$categorie = Furniture::namecategorie($data);
	// 		return $categorie;
	// 	}
	// }
	public function emptyCart($IdPrd, $prix_achat)
	{
		unset($_SESSION["products_" . $IdPrd]);
		$_SESSION["count"] -= 1;
		$_SESSION["totaux"] -= $prix_achat;
		Redirect::to("cart");
	}



	public function hideproduct()
	{
		$IdPrd = $_POST['IdPrd'];
		$p_status = 0;
		return Furniture::hideproducts($IdPrd, $p_status);
	}
	public function showproduct()
	{
		$IdPrd = $_POST['IdPrd'];
		$p_status = 1;
		return Furniture::hideproducts($IdPrd, $p_status);
	}









	public function updateProduct()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'IdPrd' => $_POST['IdPrd'],
				'libelle' => $_POST['libelle'],
				'code_barre' => $_POST['code_barre'],
				'prix_achat' => $_POST['prix_achat'],
				'prix_final' => $_POST['prix_final'],
				'Prix_offre' => $_POST['Prix_offre'],
				'description' => $_POST['description'],
				'id_categorie' => $_POST['id_categorie'],
				'qty' => $_POST['qty'],
			);
			// die(print_r($data));

			// Check if an image was selected
			if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
				// Add the image to the data array
				$data['image'] = file_get_contents($_FILES['image']['tmp_name']);
			} else {
				// Get the old image from the database
				$furniture = Furniture::getProduct($data);
				// Add the old image to the data array
				$data['image'] = $furniture->image;
			}

			$result = Furniture::update($data);
			if ($result === 'ok') {
				Session::set('success', 'Product Modifier');
				Redirect::to('pdashboard');
			} else {
				echo $result;
				// die(print_r($data));

			}
		}
	}
	public function deleteProduct()
	{
		if (isset($_POST['IdPrd'])) {
			$data['IdPrd'] = $_POST['IdPrd'];
			$result = Furniture::delete($data);
			if ($result === 'ok') {
				Session::set('success', 'Product Supprimé');
				Redirect::to('pdashboard');
			} else {
				echo $result;
			}
		}
	}














	public function getAllcatégorie()
	{
		$furnitures = Furniture::getAllcaté();

		return $furnitures;
	}

	public function addcatégorie()
	{


		if (isset($_POST['submit'])) {
			// Check if any of the form fields are empty
			if (empty($_POST['nom']) || empty($_POST['description_categorie']) || empty($_FILES['image_categorie'])) {
				// Display error message
				echo "All form fields are required. Please fill out the form and try again.";
			} else {
				$data = array(
					'nom' => $_POST['nom'],
					'description_categorie' => $_POST['description_categorie'],
					'image_categorie' => file_get_contents($_FILES['image_categorie']['tmp_name']),
					// 'catégorie' => $_POST['catégorie'],

				);
				$result = Furniture::addcatégorie($data);
				if ($result === 'ok') {
					Session::set('success', 'catégorie Ajouté');


					Redirect::to('product');
					// Form was submitted successfully
				} else {
					echo $result;
				}
			}
		}
	}


	public function getOneCategorie()
	{
		if (isset($_POST['IdCat'])) {
			$data = array(
				'IdCat' => $_POST['IdCat'],
			);
			$furniture = Furniture::getCategorie($data);
			return $furniture;
		}
	}


	public function updateCategorie()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'IdCat' => $_POST['IdCat'],
				'nom' => $_POST['nom'],
				'description_categorie' => $_POST['description_categorie'],
				// 'image_categorie' => file_get_contents($_FILES['image_categorie']['tmp_name']),
			);
			// die(print_r($data));
			if (isset($_FILES['image_categorie']) && !empty($_FILES['image_categorie']['tmp_name'])) {
				// Add the image to the data array
				$data['image_categorie'] = file_get_contents($_FILES['image_categorie']['tmp_name']);
			} else {
				// Get the old image from the database
				$furniture = Furniture::getCategorie($data);
				// Add the old image to the data array
				$data['image_categorie'] = $furniture->image_categorie;
			}

			$result = Furniture::updatecategorie($data);
			if ($result === 'ok') {
				Session::set('success', 'categorie Modifier');
				Redirect::to('cdashboard');
			} else {
				echo $result;
				// die(print_r($data));

			}
		}
	}
	public function deleteCategorie()
	{
		if (isset($_POST['IdCat'])) {
			$data['IdCat'] = $_POST['IdCat'];
			$result = Furniture::deleteCategories($data);
			if ($result === 'ok') {
				Session::set('success', 'categorie Supprimé');
				Redirect::to('cdashboard');
			} else {
				echo $result;
			}
		}
	}
}
