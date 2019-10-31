<?php
class Book {
	private $id;
	private $categoryID;
	private $libraryID;
	private $title;
	private $author;
	private $image;
	private $pages;
	private $publisher;
	private $cost;
	
	/**
	 * constructor
	 * 
	 * Optional argument: associative array with initial property value pairs
	 */
	public function __construct() {
	    $this->id = NULL;
	    $this->categoryID = NULL;
	    $this->libraryID = NULL;
	    $this->title = NULL;
		$this->author = NULL;
		$this->image = NULL;
		$this->pages = NULL;
		$this->publisher = NULL;
		$this->cost = NULL;
		
		$args = func_get_args();
		if (count($args) >= 1) {
			foreach ($args[0] as $property => $value) {
				switch ($property) {
				    case "bookID":
				        $this->id = $value;
				        break;
				    case "categoryID":
				        $this->categoryID = $value;
				        break;
				    case "libraryID":
				        $this->libraryID = $value;
				        break;
				    case "title":
						$this->title = $value;
						break;
					case "author":
						$this->author = $value;
						break;
					case "image":
						if ($value == Null) {
						    $this->image = 'book_default.jpg';
						}
						else {
						    if (!file_exists('model/images/' . $value)) {
						        $this->image = 'book_default.jpg';
						    }
						    $this->image = $value;
						}
						break;
					case "pages":
						$this->pages = $value;
						break;
					case "publisher":
						$this->publisher = $value;
						break;
					case "cost":
					    $this->cost = $value;
					    break;
				}
			}
		}
	}
	
	/*--------------------------------------------------------------
	 * get methods
	 *------------------------------------------------------------*/
	public function getID() {
	    return $this->id;
	}
	
	public function getCategoryID() {
	    return $this->categoryID;
	}
	
	public function getLibraryID() {
	    return $this->libraryID;
	}
	
	public function getAuthor() {
		return $this->author;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getImage() {
	    return "model/images/" . $this->image;
	}
	
	public function getPages() {
		return $this->pages;
	}
	
	public function getPublisher() {
		return $this->publisher;
	}
	
	public function getCost() {
	    return $this->cost;
	}
	
	/*--------------------------------------------------------------
	 * set methods
	 *------------------------------------------------------------*/
	public function setAuthor($author) {
		$this->author = $author;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function setImage($image) {
	    $this->image = $image;
	}
	
	public function setPages($pages) {
		$this->pages = $pages;
	}
	
	public function setPublisher($publisher) {
		$this->publisher = $publisher;
	}
	
	/*
	 * isset methods
	 */
	// True if author is not NULL and not empty string
	public function issetAuthor() {
		return $this->author != NULL;
	}
	// True if title is not NULL and not empty string
	public function issetTitle() {
		return $this->title != NULL;
	}
	// True if image is not NULL and not empty string
	public function issetImage() {
		return $this->image != NULL;
	}
	// True if pages is not NULL
	public function issetPages() {
		return $this->pages !== NULL;
	}
	// True if publisher is not NULL and not empty string
	public function issetPublisher() {
		return $this->publisher != NULL;
	}
}
?>