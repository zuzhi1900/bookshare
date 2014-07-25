<?php
class Books
{
	private $db;

	public function __construct($database){
		$this->db = $database;
	}

	public function add_book($bookname, $author, $isbn) {
		$query 	= $this->db->prepare("INSERT INTO `books` (`bookname`, `author`, `isbn`) VALUES (?, ?, ?) ");

		$query->bindValue(1, $bookname);
		$query->bindValue(2, $author);
		$query->bindValue(3, $isbn);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}
?>