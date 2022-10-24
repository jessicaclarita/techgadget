<?php


class DBController
{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'techgadget';

    // Connection Property
    public $con = null;

    // Constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Database Connection Failed" . $this->con->connect_error;
        }
    }

    // Destructor
    public function __destruct()
    {
        $this->closeConnection();
    }

    // Close Connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
