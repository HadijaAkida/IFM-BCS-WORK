<?php 
	require_once("model.php");
	require_once("Author.php");
	require_once("Category.php");
	require_once("Borrow.php");

	/**
	* Book class
	*/
	class Book extends Model{
		protected static $table_name = "books";
  		protected static $db_fields = array('id', 'title', 'author_id', 'description', 'total_copies', 'cover_path', 'color', 'is_light');

		public $id;
		public $title;
		public $author_id;
		public $description;
		public $total_copies;
		public $cover_path;
		public $color;
		public $is_light;

		protected static function table_creating_query(){
			$query = "<br/>`id` int(11) NOT NULL auto_increment,";
			$query .= "<br/>`title` varchar(150) NOT NULL,";
			$query .= "<br/>`author_id` int(11) NOT NULL,";
			$query .= "<br/>`category_id` int(11) NOT NULL,";
			$query .= "<br/>`description` text NOT NULL,";
			$query .= "<br/>`total_copies` int(3) NOT NULL,";
			$query .= "<br/>`cover_path` text,";
			$query .= "<br/>`color` varchar(30),";
			$query .= "<br/>`is_light` boolean,";
			$query .= "<br/>PRIMARY KEY (`id`),";
			$query .= "<br/>FOREIGN KEY(author_id) REFERENCES authors(`id`),";
			$query .= "<br/>FOREIGN KEY(category_id) REFERENCES categories(`id`)";

			return $query;
		}


		public function get_author(){
			$author = new Author();
			$author_id = $this->author_id;
			return $author->find($author_id);
		}

		public function get_category(){
			$category = new Category();
			$category_id = $this->category_id;
			return $category->find($category_id);
		}

		public function copies_left(){
			$borrows = new Borrow();
			$borrowed_copies = count($borrows->get("book_id", $this->id));
			$copies_left = $this->total_copies - $borrowed_copies;

			return $copies_left;
		}

		public function remaining_copies_text(){
			$borrows = new Borrow();
			$borrowed_copies = count($borrows->get("book_id", $this->id));
			$copies_left = $this->total_copies - $borrowed_copies;

			if($copies_left == 1){
				return "1 copy left";
			}else if($copies_left == 0){
				return "No copies left";
			}else{
				return $copies_left . " copies left";
			}
		}

		public function is_borrowed($user_id){
			$borrows = new Borrow();
			return count($borrows->findWhere("book_id = $this->id AND borrower_id = $user_id")) > 0;
		}
	}
?>