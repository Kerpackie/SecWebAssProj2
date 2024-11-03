<?php 

namespace App\Models;

use CodeIgniter\Model;

class Customer_Model extends Model {
    protected $table = 'customers';
    protected $allowedFields = ['custID','firstName','lastName','address','creditLimit','favGenre','image'];
	
	public function getAllCustomers() {
		return $this->findAll();
	}
	
	public function delCustomer($id) {
		$builder = $this->builder();
		$builder->delete(['custID' => $id]);
		return $builder;
	}	

	public function getCustomerByID($id) {
   		return $this->asArray()
           		->where(['custID' => $id])
           		->first();
   	}

   	public function updCustomer($newData, $id) {
		$builder = $this->builder();
   		$builder->where('custID', $id);
		$builder->update($newData);
   		return $builder;
   	}
}
?>
