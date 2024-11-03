<?php 

namespace App\Models;

use CodeIgniter\Model;

class Publisher_Model extends Model {
    protected $table = 'publishers';
    protected $allowedFields = ['publisherID','publisherName','addressLine1','addressLine2','addressLine3','contactName','image'];
	
	public function getAllPublishers() {
		return $this->findAll();
	}
	
	public function getPublisherByID($id) {
   		return $this->asArray()
           		->where(['publisherID' => $id])
           		->first();
   	}
}
?>