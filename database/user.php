<?php 
class customer {

	private $id;
	private $username;
    private $Email;
	private $Phone;    
	public $dbConn;

	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setName($username) { $this->name = $username; }
	function getName() { return $this->name; }
	function setEmail($Email) { $this->email = $Email; }
	function getEmail() { return $this->email; }
	function setMobile($Phone) { $this->mobile = $Phone; }
	function getMobile() { return $this->mobile; }
	// function setAddress($address) { $this->address = $address; }
	// function getAddress() { return $this->address; }
	// function setCreatedOn($createdOn) { $this->createdOn = $createdOn; }
	// function getCreatedOn() { return $this->createdOn; }

	public function __construct($conn) {
		$this->dbConn = $conn;
	}

	public function getCustomerByEmailId() {
		$sql  = "SELECT * FROM customers WHERE username = :username";
		$stmt = $this->dbConn->prepare($sql);
		$stmt->bindParam('username', $this->username);
		$stmt->execute();
		$customer = $stmt->fetch(PDO::FETCH_ASSOC);
		return $customer;	
	}

	// public function getCustomerById() {
	// 	$sql  = "SELECT * FROM customers WHERE id = :id";
	// 	$stmt = $this->dbConn->prepare($sql);
	// 	$stmt->bindParam('id', $this->id);
	// 	$stmt->execute();
	// 	$customer = $stmt->fetch(PDO::FETCH_ASSOC);
	// 	return $customer;	
	// }

}
?>