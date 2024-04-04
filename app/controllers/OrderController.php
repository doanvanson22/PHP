<?php
class OrderController{

    private $OrderModel;
    private $accountModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->OrderModel = new OrderModel($this->db);
        $this->accountModel = new accountModel($this->db);
    }


    public function Index(){
        $accountid = $_SESSION['accountId'];
        $orders = $this->OrderModel->readAll();
        $username = $this->accountModel->getAccountById($accountid)->name;
        include_once 'app/views/order/index.php';
    }
}