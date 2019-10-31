<?php
class LibraryDB {
	private $db;

	/**
	 * connect to the database
	 */
	public function __construct() {
		$dsn = 'mysql:host=localhost;dbname=little_library';
		$username = 'librarian';
		$password = 'b00kw0rm';

		try {
			$this->db = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			$db = Null;
		}
	}

	/**
	 * check the connection to the database
	 * 
	 * @return boolean - true if a connection to the database has been established
	 */
	public function isConnected() {
		return ($this->db != Null);
	}
	
	/**
	 * retrieve the book records form the database and return 
	 * an array of all book as objects of class Book
	 * 
	 * @return Book[] - array of books retrieved from the books table
	 */
	public function getBookCatalog() {
		// create the query
		$query = 'SELECT * FROM books';
		$statement = $this->db->prepare($query);
		$statement->execute();
		$books = $statement->fetchAll();
		$statement->closeCursor();

		// cset the image to the default image if it
		// doesn't exists or is not specified
		$book_catalog = array();
		foreach ($books as $book) {
			$book_catalog[] = new Book($book);
		}
		return $book_catalog;
	}
	
	/**
	 * retrieve the book with the specified id
	 * 
	 * @param unknown $book_id id of book to be retrieved
	 * @return NULL|Book return Null upon failure, return the book object otherwise
	 */
	public function getBook($book_id) {
	    // create the query
	    $query = "SELECT * FROM books
				  WHERE bookId = :book_id";
        $statement = $this->db->prepare($query);
	    $statement->bindValue(':book_id', $book_id);
	    $statement->execute();
	    $book_record = $statement->fetch();
	    $statement->closeCursor();
	    // check if query was successfule
	    if ($book_record == False) {
	        return Null;
	    }
	    $book = new Book($book_record);    
	    return $book;
	}
	
	/**
	 * retrieve all libraries
	 *
	 * @return array with libraries
	 */
	public function getLibraries() {
	    $query = "SELECT *
					FROM libraries";
	    $statement = $this->db->prepare($query);
	    $statement->execute();
	    $library_records = $statement->fetchAll();
	    $statement->closeCursor();
	    
	    $libraries = array();
	    foreach($library_records as $library) {
	        $libraries[$library['libraryID']] = $library['libraryName'];
	    }
	    return $libraries;
	}
	
	/**
	 * retrieve the library record with the specified id
	 * 
	 * @param unknown $library_id of the library to be retrieved
	 * @return NULL|mixed return Null upon failure, return the library record otherwise
	 */
	public function getLibrary($library_id) {
	    // create the query
	    $query = "SELECT * FROM libraries
				  WHERE libraryId = :library_id";
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(':library_id', $library_id);
	    $statement->execute();
	    $library_record = $statement->fetch();
	    $statement->closeCursor();
	    // check if query was successfule
	    if ($library_record == False) {
	        return Null;
	    }
	    return $library_record;
	}

	/**
	 * retrieve all categories
	 * 
	 * @return array with categories 
	 */
	public function getCategories() {
	    $query = "SELECT *
					FROM categories";
	    $statement = $this->db->prepare($query);
	    $statement->execute();
	    $category_records = $statement->fetchAll();
	    $statement->closeCursor();
	    
	    $cateories = array();
	    foreach($category_records as $category) {
	        $categories[$category['categoryID']] = $category['categoryName'];
	    }
	    return $categories;
	}
	
	/**
	 * insert a new message
	 * 
	 * @param unknown $library_id
	 * @param unknown $name
	 * @param unknown $email
	 * @param unknown $phone
	 * @param unknown $date
	 * @param unknown $comments
	 * @return boolean True if the update operation was successful, False otherwise
	 */
	public function addMessage($library_id, $name, $email, $phone, $date, $comments) {
	    $query = 'INSERT INTO messages	(libraryID, name, email, phone, messageDate, comments)
				VALUES (:library_id, :name, :email, :phone, :date, :comments)';
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(':library_id', $library_id);
	    $statement->bindValue(':name', $name);
	    $statement->bindValue(':email', $email);
	    $statement->bindValue(':phone', $phone);
	    $statement->bindValue(':date', $date);
	    $statement->bindValue(':comments', $comments);
	    $statement->execute();
	    $success = ($statement->rowCount() == 1);
	    $statement->closeCursor();
	    return $success;
	}
	
	/**
	 * register user
	 *
	 * @param unknown $firstname
	 * @param unknown $lastname
	 * @param unknown $email
	 * @param unknown $phone
	 * @param unknown $password
	 * @return boolean True if the update operation was successful, False otherwise
	 */
	public function addRegistration($firstname, $lastname, $email, $phone, $password) {
	    $password = password_hash($password, PASSWORD_BCRYPT);
	    $query = 'INSERT INTO users	(firstName, lastName, email, phone, password)
				VALUES (:firstname, :lastname, :email, :phone, :password)';
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(':firstname', $firstname);
	    $statement->bindValue(':lastname', $lastname);
	    $statement->bindValue(':email', $email);
	    $statement->bindValue(':phone', $phone);
	    $statement->bindValue(':password', $password);
	    $statement->execute();
	    $success = ($statement->rowCount() == 1);
	    $statement->closeCursor();
	    return $success;
	}
	
	/**
	 * Returns True if the email/password pair exists in the user table
	 */
	public function isValidUser($email, $password) {
	    $query = 'SELECT password FROM users
				WHERE email = :email';
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(":email", $email);
	    $statement->execute();
	    $email = $statement->fetch();
	    $statement->closeCursor();
	    if ($email != False) {
	        if (password_verify($password, $email['password'])) {
	            return True;
	        }
	    }
	    return False;	
	}
	
	/**
	 * retrieve the user record with the specified email
	 *
	 * @param unknown $email of the user record to be retrieved
	 * @return NULL|mixed return Null upon failure, return the user record otherwise
	 */
	public function getUserName($email) {
	    // create the query
	    $query = "SELECT firstName FROM users
				  WHERE email = :email";
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(':email', $email);
	    $statement->execute();
	    $user_record = $statement->fetch();
	    $statement->closeCursor();
	    // check if query was successfule
	    if ($user_record == False) {
	        return Null;
	    }
	    return $user_record;
	}
	/**
	 * retrieve the user record with the specified email
	 *
	 * @param unknown $email of the user record to be retrieved
	 * @return user image name
	 */
	public function getUserImage($email) {
	    // create the query
	    $query = "SELECT image FROM users
				  WHERE email = :email";
	    $statement = $this->db->prepare($query);
	    $statement->bindValue(':email', $email);
	    $statement->execute();
	    $user_image = $statement->fetch();
	    $statement->closeCursor();
	    // check if query was successfule
	    if ($user_image == False) {
	        return Null;
	    }
	    return $user_image;
	}
	
}
?>