<?php 

class FurnitureController{

	public function getAllFurniture(){
		$furnitures = Furniture::getAll();

		return $furnitures;
	}
	public function addProduct()
	{


		if (isset($_POST['submit'])) {
			// Check if any of the form fields are empty
			if (empty($_POST['libelle']) || empty($_POST['code_barre']) || empty($_POST['prix_achat']) || empty($_POST['prix_final']) || empty($_POST['Prix_offre']) || empty($_POST['description'])) {
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
					// 'catégorie' => $_POST['catégorie'],

				);
				$result = Furniture::add($data);
				if ($result === 'ok') {
					Session::set('success', 'Produit Ajouté');
				   
	
				Redirect::to('index');
			  // Form was submitted successfully
			}else{
			  echo $result;
			}
		  }
		}
	  }
	public function getOneFurniture(){
		if (isset($_POST['id'])) {
			$data = array(
				'id' => $_POST['id'],
			);
		$furniture = Furniture::getFurniture($data);
		return $furniture;

		}
	}

	
	public function updateFurniture()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id' => $_POST['id'],
				'name' => $_POST['name'],
				'prix' => $_POST['prix'],
			);
	
			// Check if an image was selected
			if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
				// Add the image to the data array
				$data['image'] = file_get_contents($_FILES['image']['tmp_name']);
			} else {
				// Get the old image from the database
				$furniture = Furniture::getFurniture($data);
				// Add the old image to the data array
				$data['image'] = $furniture->image;
			}
	
			$result = Furniture::update($data);
			if ($result === 'ok') {
				Session::set('success','Furniture Modifier');
				Redirect::to('newarrivel');
			} else {
				echo $result;
			}
		}
	}
	public function deleteFurniture(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Furniture::delete($data);
			if($result === 'ok'){
				Session::set('success','Furniture Supprimé');
				Redirect::to('newarrivel');
			}else{
				echo $result;
			}
		}
	}
	
}