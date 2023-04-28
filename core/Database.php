<?php
class Database
{
	public $conn = NULL;
	private $server = 'localhost';
	private $dbName = 'bookstore';
	private $user = 'root';
	private $password = '';
	// private $server = 'sql212.epizy.com';
	// private $dbName = 'epiz_34089137_bookstore';
	// private $user = 'epiz_34089137';
	// private $password = '9mgs6oEAFWbucmi';
	public function __construct() {
		$this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}
		$this->conn->set_charset("utf8");
	}

	public function connect()
	{
		$this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}
		$this->conn->set_charset("utf8");
	}
    public function closeDatabase()
	{
		if ($this->conn) {
			$this->conn->close();
		}
	}
}

?>