<?php 

namespace App\Models; 
use Carbon\Carbon;
use PDO;

class Product extends BaseModel {

    public $table = 'products';
    public $id; 
    public $category_id; 
    public $name; 
    public $price; 
    public $offer_price; 
    public $description; 
    public $image;
    public $created_at; 
    public $updated_at; 

    public function save()
    {

        try {
            //code...
            $query = "INSERT INTO $this->table (category_id, name, price, offer_price, description, image, created_at, updated_at)
                  VALUES (:category_id, :name, :price, :offer_price, :description, :image, :created_at, :updated_at)";
        
            $statement = $this->conn->prepare($query);
            
            $statement->bindParam(':category_id', $this->category_id);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':offer_price', $this->offer_price);
            $statement->bindParam(':description', $this->description);
            $statement->bindParam(':image', $this->image);
            $statement->bindParam(':created_at', Carbon::now());
            $statement->bindParam(':updated_at', Carbon::now());

            $statement->execute();

            return true;
        } catch (\Throwable $th) {
            //throw $th;

            logError('Saving Product- '.$th->getMessage());
            return false;
        }
        
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        $statement = $this->conn->query($query);
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function update()
    {
        try {
            //code...
            $query = "UPDATE products SET 
                                    category_id = :category_id,
                                    name = :name,
                                    price = :price,
                                    offer_price = :offer_price,
                                    description = :description";

            // Check if the image property is set and not empty
            if (isset($this->image) && !empty($this->image)) {
                $query .= ", image = :image";
            }
            $query .= " WHERE id = :id";

            $statement = $this->conn->prepare($query);
        
            $statement->bindParam(':category_id', $this->category_id);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':offer_price', $this->offer_price);
            $statement->bindParam(':description', $this->description);

            // Check if the image property is set and not empty
            if (isset($this->image) && !empty($this->image)) {
                $statement->bindParam(':image', $this->image);
            }

            $statement->bindParam(':id', $this->id);

            $statement->execute();

            return true;

        } catch (\Throwable $th) {
           
            logError('Updating Product- '.$th->getMessage());
            return false;
        }
            
    }

    public function delete()
    {
        try {
            //code...
            $query = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id', $this->id);
            $statement->execute();

            return true;

        } catch (\Throwable $th) {

            logError('Deleting Product- '.$th->getMessage());
            return false;
        }
        

    }
}