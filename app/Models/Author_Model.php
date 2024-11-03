<?php 

namespace App\Models;

use CodeIgniter\Model;

class Author_Model extends Model {
    protected $table = 'authors';
    protected $allowedFields = ['authorID', 'firstName', 'lastName', 'yearBorn', 'image'];
	
	public function getAllAuthors() {
		return $this->findAll();
	}
	
	public function delAuthor($id) {
		$builder = $this->builder();
		$builder->delete(['authorID' => $id]);
		return $builder;
	}	

	public function getAuthorByID($id) {
   		return $this->asArray()
           		->where(['authorID' => $id])
           		->first();
   	}

   	public function updAuthor($newData, $id) {
		$builder = $this->builder();
   		$builder->where('authorID', $id);
		$builder->update($newData);
   		return $builder;
   	}
}
?>
