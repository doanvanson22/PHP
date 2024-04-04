<?php

class AccountModel{
    private $conn;
    private $table_name = "accout";
    

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAccountByEmail($email){
        $query = "SELECT * FROM ". $this->table_name." where email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    function getAccountById($id){
        $query = "SELECT * FROM ". $this->table_name." where id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function createAccount($email, $name, $hashedPassword, $role='user'){
        $query = "INSERT INTO " . $this->table_name . " (email, password, name, role) VALUES (:email, :password, :name, :role)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $email = htmlspecialchars(strip_tags($email));
        $name = htmlspecialchars(strip_tags($name));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}