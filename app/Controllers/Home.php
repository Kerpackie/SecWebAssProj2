<?php	

namespace App\Controllers;
use App\Models\Author_Model;

class Home extends BaseController {
	
	public function index() : string {
		return view('templates/header')
			 . view('home')
			 . view('templates/footer');
	}

	public function listAuthors() {
		$model = new Author_Model;
        $authorData['author'] = $model->getAllAuthors();
        return view ('templates/header', $authorData)
			. view('authorsList')
			. view ('templates/footer');
	}

	public function insert() {
		$data = []; $msg = "";
		//load CI form helper
		helper(['form']);
		//if the user has submitted the form
		if ($this->request->getMethod() == 'POST') {
			
			//set up the validation rules
			$rules = [	'firstName'  => 'required',
               			'lastName' => 'required|min_length[2]',
               			'yearBorn'   => 'required|numeric'  ];
			if(!$this->validate($rules))
				//form fields have not passed validation - prepare errors for display			
				$data['validation'] = $this->validator;
			else {
				//form fields have passed validation
				//load the author model
				$model = new Author_Model;
				//get values from post
				$anAuthor = [	'firstName' => $_POST['firstName'],
								'lastName'  => $_POST['lastName'],
								'yearBorn'  => $_POST['yearBorn']  ];
				//check if insert to database is successful – display appropriate message
				if ($model->save($anAuthor)) {
					$msg .= "<br><br>The insert to database has been successful<br><br>";				}
				else {
					$msg .= "<br><br>Uh oh ... problem on insert to database<br><br>";
				}
				//load the view to display the message
				$data['message'] = $msg;
                return view('templates/header')
					. view('displayMessageView', $data)
					. view('templates/footer');
			} // end insert to database
		} // end if POST
		//load the insert author view
        	return view('templates/header', $data)
				. view('insertAuthorView')
				. view('templates/footer');
	} //end insert
} //end class