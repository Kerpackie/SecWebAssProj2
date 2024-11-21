<?php 

namespace App\Models;

use CodeIgniter\Model;

class Customer_Model extends Model {
    protected $table = 'customer';
	protected $primaryKey = 'custNumber';

	protected $allowedFields = ['custFirstName', 'custLastName', 'custPhone', 'custAddressLine1', 'custAddressLine2',
		'custCity', 'custPostalCode', 'custCountry', 'custCreditLimit', 'custEmail'];

	public function search($keyword) {
		return $this->table('customer')
			->like('custFirstName', $keyword)
			->orLike('custLastName', $keyword)
			->orLike('custAddressLine1', $keyword)
			->orLike('custCreditLimit', $keyword)
			->orLike('custNumber', $keyword)
			->findAll();
	}

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
