                                                        

<?php

class Furniture
{


    

    static public function getProductsOrder($data)
    {
        $orderId = $data['id'];
        try {
            $query = "SELECT o.id AS oId , o.totalprice , p.libelle, p.description, cp.qty, cp.unitPrice, cp.total, o.deliveryDate
            FROM componentproduct cp
            JOIN produit p ON p.IdPrd = cp.productId
            JOIN `order` o ON o.id = cp.commandId
            WHERE cp.commandId = :id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $orderId));
            $products = $statement->fetchAll(PDO::FETCH_OBJ);
            // die(var_dump($products));
            return $products;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }
    
    

    static public function getAll_2($count)
    {
        $statement = DB::connect()->prepare("SELECT * FROM produit  LEFT JOIN catégorie ON produit.id_categorie = catégorie.IdCat  LIMIT 6 OFFSET $count ");
        $statement->execute();
        return $statement->fetchAll();
    }
   
    


    static public function getAll()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM produit LEFT JOIN catégorie ON produit.id_categorie = catégorie.IdCat;
        ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function getAllcaté()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM catégorie");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }       


    // static public function namecategorie($data) {
    //     $id_categorie = $data['id_categorie'];

    //     try {
    //         $query ="SELECT catégorie.nom FROM catégorie WHERE IdCat = :id_categorie";
    //         $statement = DB::connect()->prepare($query);
    //         $statement->execute(array(":id_categorie" => $id_categorie));
    //         $categorie = $statement->fetch(PDO::FETCH_OBJ);
    //         return $categorie;
    //     } catch (PDOException $ex) {
    //         echo 'erreur' . $ex->getMessage();
    //     }
    // }
    




    static public function hideproducts($IdPrd, $p_status)
    {
        $stmt = DB::connect()->prepare('UPDATE produit SET p_status = :p_status WHERE IdPrd = :IdPrd');
        $stmt->bindParam(':p_status', $p_status);
        $stmt->bindParam(':IdPrd', $IdPrd);

        return $stmt->execute();
    }









    static public function getProduct($data)
    {
        $IdPrd = $data['IdPrd'];
        try {
            $query = "SELECT * FROM produit WHERE IdPrd=:IdPrd";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":IdPrd" => $IdPrd));
            $furniture = $statement->fetch(PDO::FETCH_OBJ);
            return $furniture;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }



    static public function add($data)
    {
        //print_r($data);
        $stmt = DB::connect()->prepare("INSERT INTO produit(libelle,code_barre,prix_achat,prix_final,Prix_offre,description,image,id_categorie,qty,p_status)VALUES (:libelle,:code_barre,:prix_achat,:prix_final,:Prix_offre,:description,:image,:id_categorie,:qty,1)");
        $stmt->bindParam(':libelle', $data['libelle'], PDO::PARAM_STR);
        $stmt->bindParam(':code_barre', $data['code_barre'], PDO::PARAM_STR);
        $stmt->bindParam(':prix_final', $data['prix_final'], PDO::PARAM_STR);
        $stmt->bindParam(':prix_achat', $data['prix_achat'], PDO::PARAM_STR);
        $stmt->bindParam(':Prix_offre', $data['Prix_offre'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(':image', $data['image'], PDO::PARAM_STR);
        $stmt->bindParam(':id_categorie', $data['id_categorie'], PDO::PARAM_INT);
        $stmt->bindParam(':qty', $data['qty'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }

    static public function addcatégorie($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO catégorie(nom,description_categorie,image_categorie) VALUES (:nom,:description_categorie,:image_categorie)");
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':description_categorie', $data['description_categorie'], PDO::PARAM_STR);
        $stmt->bindParam(':image_categorie', $data['image_categorie'], PDO::PARAM_STR);

        // $stmt->bindParam(':catégorie', $data['catégorie'], PDO::PARAM_STR);



        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }
    static public function update($data)
    {
        $stmt = DB::connect()->prepare("UPDATE produit SET libelle = :libelle ,code_barre = :code_barre,prix_achat = :prix_achat,prix_final=:prix_final,Prix_offre=:Prix_offre,description=:description,id_categorie =:id_categorie,qty =:qty , image = :image  WHERE IdPrd  = :IdPrd ");
        
        $stmt->bindParam(':IdPrd', $data['IdPrd']);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':code_barre', $data['code_barre']);
        $stmt->bindParam(':prix_achat', $data['prix_achat']);
        $stmt->bindParam(':prix_final', $data['prix_final']);
        $stmt->bindParam(':Prix_offre', $data['Prix_offre']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id_categorie', $data['id_categorie']);
        $stmt->bindParam(':qty', $data['qty']);
        $stmt->bindParam(':image', $data['image'], PDO::PARAM_LOB);

    
        if ($stmt->execute()) {

            return 'ok';
        } else {
            return 'error';
        }
        
    }
    // static public function update($data)
    // {
    //     $stmt = DB::connect()->prepare("UPDATE produit SET libelle = :libelle ,code_barre = :code_barre,prix_achat = :prix_achat,prix_final=:prix_final,Prix_offre=:Prix_offre,description=:description,id_categorie =:id_categorie,qty =:qty  WHERE IdPrd  = :IdPrd ");
        
    //     $stmt->bindParam(':IdPrd', $data['IdPrd']);
    //     $stmt->bindParam(':libelle', $data['libelle']);
    //     $stmt->bindParam(':code_barre', $data['code_barre']);
    //     $stmt->bindParam(':prix_achat', $data['prix_achat']);
    //     $stmt->bindParam(':prix_final', $data['prix_final']);
    //     $stmt->bindParam(':Prix_offre', $data['Prix_offre']);
    //     $stmt->bindParam(':description', $data['description']);
    //     $stmt->bindParam(':id_categorie', $data['id_categorie']);
    //     $stmt->bindParam(':qty', $data['qty']);
    
    //     if ($stmt->execute()) {
    //         if (isset($data['image']) && !empty($data['image'])) {
    //             $stmt = DB::connect()->prepare("UPDATE produit SET image = :image WHERE IdPrd  = :IdPrd ");
    //             $stmt->bindParam(':IdPrd', $data['IdPrd']);
    //             $stmt->bindParam(':image', $data['image'], PDO::PARAM_LOB);
    //             $stmt->execute();
    //         }
    //         return 'ok';
    //     } else {
    //         return 'error';
    //     }
    // }
    


    static public function delete($data)
    {
        $IdPrd = $data['IdPrd'];
        try {
            $query = "DELETE FROM produit WHERE IdPrd=:IdPrd";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":IdPrd" => $IdPrd));
            if ($statement->execute()) {

                return 'ok';
            } else {
                return 'error';
            }
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }















    static public function getCategorie($data)
    {
        $IdCat = $data['IdCat'];
        try {
            $query = "SELECT * FROM catégorie WHERE IdCat=:IdCat";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":IdCat" => $IdCat));
            $furniture = $statement->fetch(PDO::FETCH_OBJ);
            return $furniture;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }




    static public function updatecategorie($data)
    {
        $stmt = DB::connect()->prepare("UPDATE catégorie SET nom = :nom ,description_categorie = :description_categorie,image_categorie = :image_categorie  WHERE IdCat  = :IdCat ");
        
        $stmt->bindParam(':IdCat', $data['IdCat']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':description_categorie', $data['description_categorie']);
        $stmt->bindParam(':image_categorie', $data['image_categorie'], PDO::PARAM_LOB);

    
        if ($stmt->execute()) {

            return 'ok';
        } else {
            return 'error';
        }
        
    }
    static public function deleteCategories($data)
    {
        $IdCat = $data['IdCat'];
        try {
            $query = "DELETE FROM catégorie WHERE IdCat=:IdCat";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":IdCat" => $IdCat));
            if ($statement->execute()) {

                return 'ok';
            } else {
                return 'error';
            }
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }


}
