<?php 

namespace App\Models;

use CodeIgniter\Model;

class Author_Model extends Model {
    protected $table = 'authors';
    protected $allowedFields = ['authorID', 'firstName', 'lastName', 'yearBorn', 'image'];
	
	public function getAllAuthors() {
		return $this->findAll();
	}
}
?>
