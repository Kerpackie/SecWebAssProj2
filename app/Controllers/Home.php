<?php	

namespace App\Controllers;
use App\Models\Author_Model;

class Home extends BaseController {
	
	public function index() : string {
		return view('templates/header')
			 . view('home')
			 . view('templates/footer');
	}

   	public function drilldownAuthor($id) {
   		$model = new Author_Model();
   		$authorData['author'] = $model->getAuthorByID($id);

   		return view ('templates/header', $authorData)
			. view ('drilldownAuthor')
			. view ('templates/footer');
    }

	public function listAuthors() {
		$model = new Author_Model;
        $authorData['author'] = $model->getAllAuthors();
        return view ('templates/header', $authorData)
			. view('authorsList')
			. view ('templates/footer');
	}

	public function deleteAuthor($id) {
		$msg = "";
   		$model = new Author_Model;

		//check if delete from database is successful – display appropriate message
		if ($model->delAuthor($id)) {
			$msg .= "<br><br>The delete from the database has been successful<br><br>";
		}
		else {
			$msg .= "<br><br>Uh oh ... problem on delete from the database<br><br>";
		}
				
		//load the view to display the message
		$data['message'] = $msg;
		return view('templates/header')
			 . view('displayMessageView', $data)
			 . view('templates/footer');
	}


	public function insert(){
		$data = []; $msg = "";
		
		//load CI form helper
		helper(['form']);
		
		//if the user has submitted the form
		if ($this->request->getMethod() == 'POST') {

			//set up the validation rules
            $rules = [ 'firstName'  => 'required',
						'lastName'  => 'required|min_length[2]',
						'yearBorn'  => 'required|numeric'	];
			
			if(!$this->validate($rules))
				//form fields have not passed validation - prepare errors for display
				$data['validation'] = $this->validator;
			else {
				//form fields have passed validation

				//validate the image - correct file type & within max size
				$validateImg = $this->validate([
					'file' => [ 'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                    'max_size[file,4096]', ]  ]);

                //if image not valid output message else do upload & resize & database insert
				if(!$validateImg) {
                	$msg .= "<br><br>Either file type or size (Max 4MB) not correct to create image.";
					$msg .= "<br><br>Insert not done.";
                } else {
					//upload file
                    $x_file = $this->request->getFile('file');
                    //the upload process may move the file to an intermediate location 
					//& change the name, this ensures we use the original file name
					$originalName = $x_file->getClientName();

					//resize to our required full format and put in full folder
					$image = \Config\Services::image()
							->withFile($x_file)
                        	->resize(345, 186, true, 'height')
                        	->save(FCPATH.'/assets/images/full/'.$originalName);
					$msg .= "<br><br>Upload done & image resized<br><br>";
						
                    //resize to thumb format and put in thumbs folder
					$image = \Config\Services::image()
                     		->withFile($x_file)
                        	->resize(140, 76, true, 'height')
                        	->save(FCPATH.'/assets/images/thumbs/'.$originalName);
					$msg .= "<br><br>image resized to thumbnail<br><br>";  
				
					//load the author model
					$model = new Author_Model;
		
					//get values from post 
					//include the image name
					$anAuthor = [ 	'firstName' => $_POST['firstName'],
									'lastName'  => $_POST['lastName'],
									'yearBorn'  => $_POST['yearBorn'],
									'image'       => $originalName  ];

					//check if insert to database is successful – display appropriate message
					if ($model->save($anAuthor)) {
						$msg .= "<br><br>The insert to database has been successful<br><br>";
					} else {
						$msg .= "<br><br>Uh oh ... problem on insert to database<br><br>";
					}
                }				
				//load the view to display the error / information message
				$data['message'] = $msg;
				return view('templates/header')
					. view('displayMessageView', $data)
					. view('templates/footer');
			}
		}
		//load the insert author view
        		return view('templates/header', $data)
			. view('insertAuthorView')
			. view('templates/footer');
	} //end insert

	public function updateAuthor($id){

		$data = []; $msg = "";
		
		//load CI form helper
		helper(['form']);
		
		//load the author model
		$model = new Author_Model;

		//if the user has not submitted the form - i.e. it is a GET rather than a POST
 		//load the initial form populated with data from the database
		if ($this->request->getMethod() != 'POST') {
			
			//load the update author view
			$authorData['author'] = $model->getAuthorByID($id);
			return view ('templates/header', $authorData)
				. view('updateAuthor')
				. view ('templates/footer');
				
		} else {
			//user has submitted the form so do validation & write to database
			//i.e. this is a POST
			//get values from post
			$anAuthor = [ 	'authorID'  => $_POST['authorID'],
							'firstName' => $_POST['firstName'],
							'lastName'  => $_POST['lastName'],
							'yearBorn'  => $_POST['yearBorn']];

			//set up the validation rules
            		$rules = [ 	'firstName' => 'required',
					'lastName'  => 'required|min_length[2]',
					'yearBorn'  => 'required|numeric'];
			
			if(!$this->validate($rules)) {
				//form fields have not passed validation - prepare errors for display
				$data['validation'] = $this->validator;
				
				//get original image name from hidden field in form
				//needed to reload the page to fix validation errors
				$anAuthor += ['prevImage'	=> $_POST['prevImage']];
				$anAuthor += ['image'		=> $_POST['prevImage']];
				
				//reload the update author view to allow user fix the validation errors
				//note - errors passed in $data and the form data passed in $authorData
				$authorData['author'] = $anAuthor;
				return view ('templates/header', $authorData)
					. view('updateAuthor', $data)
					. view ('templates/footer');
				
            } else {
				//passed validation - continue with image validation & update database
				
				//validate the image - correct file type & within max size
				$validateImg = $this->validate([
					'file' => [ 'uploaded[file]',
						'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
						'max_size[file,4096]', ] ]);

				//if image not valid output message else do upload & resize
				if(!$validateImg) {
					$msg .= "<br><br>Either file type or size (Max 4MB) not correct.";
				} else {
					//image has passed validation
					//upload file
					$x_file = $this->request->getFile('file');
					//the upload process moves file to a temp location & changes the name
					//this ensures we use the original file name
					$originalName = $x_file->getClientName();

					//resize to full format and put in full folder
					$image = \Config\Services::image()
						->withFile($x_file)
						->resize(240, 159, true, 'height')
                        ->save(FCPATH.'/assets/images/full/'.$originalName);
					$msg .= "<br><br>Upload done & image resized<br><br>";
						
					//resize to thumb format and put in thumbs folder
					$image = \Config\Services::image()
                  		->withFile($x_file)
                  		->resize(80, 53, true, 'height')
                  		->save(FCPATH.'/assets/images/thumbs/'.$originalName);
					$msg .= "<br><br>image resized to thumbnail<br><br>";  
        
					//update details with new image name
					$anAuthor += ['Image' => $originalName];

					//check if update to database is successful – display appropriate message
					if ($model->updAuthor($anAuthor,$id))
						$msg .= "<br><br>The update has been successful<br><br>";
					else 
						$msg .= "<br><br>Uh oh ... problem on updating<br><br>";
				}//else - valid image
				
				//load the view to display the message
				$data['message'] = $msg;
				return view('templates/header')
					. view('displayMessageView', $data)
					. view('templates/footer');

			}//end else - passed validation
		}//end else - is POST
	} //end update
	
} //end class