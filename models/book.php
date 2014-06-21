<?php
class book{
	private $id;
	private $title;
	private $author;
	private $status;
    private $category;
    private $publisher;
    private $year;

	public function __construct(array $data){
		$this->id = $data['Id_ksiazki'];
		$this->title = $data['tytul'];
		$this->author = $data['author_name']." ".$data['author_surname'];
		$this->status = $data['status'];
        $this->year = $data['rok'];
        $this->publisher = $data['wydawca'];
        $this->category = $data['kategoria'];
        

	}

	public function getId(){
		return $this->id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function getStatus(){
		return $this->status;
	}
    
    public function getCategory(){
        return $this->category;
    }
    
    public function getYear(){
        return $this->year;
    }
    
    public function getPublisher(){
        return $this->publisher;
    }
    
}