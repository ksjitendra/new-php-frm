<?php 

namespace App\Models; 
use Carbon\Carbon;
use PDO;

class Category extends BaseModel {

    public $table = 'categories';
    public $id; 
    public $name; 
    
    public function save() {

        try {
            //code...
            $query = 'INSERT INTO  '.$this->table.' (name, created_at, updated_at) VALUES (:categoryname, :createdAt, :updatedAt)';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':categoryname', $this->name);
            $statement->bindParam(":createdAt", Carbon::now());
            $statement->bindParam(":updatedAt", Carbon::now());
            $statement->execute();

            return true;

        } catch (\Throwable $th) {
             
            //throw $th;
            logError('Saving Category- '.$th->getMessage());
            return false;
        }

    }

    public function getAll() {
        try {
            $query = "SELECT * FROM $this->table";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        
            
        } catch (PDOException $e) {
            // Handle any errors that occur during the query execution
            logError('Fetching Category- '.$th->getMessage());
            return false;
        }
    }
}