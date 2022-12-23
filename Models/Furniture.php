                                                        

<?php

class Furniture{

    /**
     * return @void
     */

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM produit");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
    



    static public function getFurniture($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM produit WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $furniture = $statement->fetch(PDO::FETCH_OBJ);
            return $furniture;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }

    

    static public function add($data)
    {
        $stmt = DB::connect()->prepare("INSERT INTO produit(libelle,code_barre,prix_achat,prix_final,Prix_offre,description) VALUES (:libelle,:code_barre,:prix_achat,:prix_final,:Prix_offre,:description)");
        
        $stmt->bindParam(':libelle', $data['libelle'], PDO::PARAM_STR);
        $stmt->bindParam(':code_barre', $data['code_barre'], PDO::PARAM_STR);
        $stmt->bindParam(':prix_final', $data['prix_final'], PDO::PARAM_STR);
        $stmt->bindParam(':prix_achat', $data['prix_achat'], PDO::PARAM_STR);
        $stmt->bindParam(':Prix_offre', $data['Prix_offre'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        // $stmt->bindParam(':catégorie', $data['catégorie'], PDO::PARAM_STR);
        


        if ($stmt->execute()) {
            return 'ok';


        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
        
    }
    static public function update($data)
    {
        $stmt = DB::connect()->prepare("UPDATE produit SET name = :name,prix = :prix,image = :image WHERE id = :id");

        $stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':name',$data['name']);
		$stmt->bindParam(':prix',$data['prix']);
		$stmt->bindParam(':image',$data['image']);
        
        if ($stmt->execute()) {

            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }



    static public function delete($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM produit WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            if ($statement->execute()) {

                return 'ok';
            } else {
                return 'error';
            }
            $statement->close();
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
}
                                                        
                                                    