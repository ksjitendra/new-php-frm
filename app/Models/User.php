<?php

namespace App\Models;
use PDO;

class User extends BaseModel
{

    public $table = 'users';
    public $id;
	public $name;
    public $mobile;
	public $email;
	public $password;


    public function login()
    {
        $query = "SELECT * FROM ".$this->table. " WHERE email = :email";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':email',$this->email);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if($row && password_verify($this->password, $row['password'])){
			$this->id = $row['id'];
			$this->name = $row['name'];

			return true;
		}else{
			return false;
		}
    }

  
}