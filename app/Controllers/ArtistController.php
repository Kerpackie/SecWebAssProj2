<?php

namespace App\Controllers;

use App\Models\Artist_Model;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class ArtistController extends BaseController
{
    public function showUpdateArtistForm($id)
    {
        $model = new Artist_Model();
        $data['artist'] = $model->getArtistByID($id);

        if (empty($data['artist'])) {
            throw new PageNotFoundException('Artist with ID ' . $id . ' not found.');
        }

        echo view('templates/header');
        echo view('updateArtistForm', $data);
        echo view('templates/footer');
    }

    public function updateArtist($id)
    {
        $data = [];
        $msg = "";

        // Load the form helper
        helper(['form']);

        // Load the artist model
        $model = new Artist_Model();

        // If the request method is not POST, load the form with existing data
        if ($this->request->getMethod() != 'POST') {
            $artistData['artist'] = $model->getArtistByID($id);
            return view('templates/header', $artistData)
                . view('updateArtistForm')
                . view('templates/footer');
        } else {
            // User has submitted the form, validate and update the database
            $aArtist = [
                'artId' => $_POST['artId'],
                'artBusinessName' => $_POST['artBusinessName'],
                'artAddress' => $_POST['artAddress'],
                'artContact' => $_POST['artContact']
            ];

            // Set up the validation rules
            $rules = [
                'artBusinessName' => 'required',
                'artAddress' => 'required',
                'artContact' => 'required'
            ];

            if (!$this->validate($rules)) {
                // Form fields have not passed validation, prepare errors for display
                $data['validation'] = $this->validator;

                // Get original image name from hidden field in form
                $aArtist += ['prevImage' => $_POST['prevImage']];
                $aArtist += ['artPhoto' => $_POST['prevImage']];

                // Reload the update artist view to allow user to fix the validation errors
                $artistData['artist'] = $aArtist;
                return view('templates/header', $artistData)
                    . view('updateArtistForm', $data)
                    . view('templates/footer');
            } else {
                // Passed validation, continue with image validation and update database
                $validateImg = $this->validate([
                    'artPhoto' => [
                        'uploaded[artPhoto]',
                        'mime_in[artPhoto,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[artPhoto,4096]'
                    ]
                ]);

                if (!$validateImg) {
                    $msg .= "<br><br>Either file type or size (Max 4MB) not correct.";
                } else {
                    // Image has passed validation, upload file
                    $file = $this->request->getFile('artPhoto');
                    $originalName = $file->getClientName();

                    // Move the file to the uploads directory
                    $file->move(WRITEPATH . 'uploads', $originalName);
                    $msg .= "<br><br>Upload done<br><br>";

                    // Update details with new image name
                    $aArtist += ['artPhoto' => $originalName];

                    // Check if update to database is successful
                    if ($model->updArtist($aArtist, $id)) {
                        $msg .= "<br><br>The update has been successful<br><br>";
                    } else {
                        $msg .= "<br><br>Uh oh ... problem on updating<br><br>";
                    }
                }

                // Load the view to display the message
                $data['message'] = $msg;
                return view('templates/header')
                    . view('displayMessageView', $data)
                    . view('templates/footer');
            }
        }
    }

    public function showInsertArtistForm()
    {
        echo view('templates/header');
        echo view('insertArtistForm');
        echo view('templates/footer');
    }
    public function insertArtist()
    {
        $model = new Artist_Model();
        $data = [
            'artBusinessName' => $this->request->getPost('artBusinessName'),
            'artAddress' => $this->request->getPost('artAddress'),
            'artContact' => $this->request->getPost('artContact'),
            'artPhoto' => $this->request->getPost('artPhoto')
        ];
        $model->save($data);
        return redirect()->to('/artists');
    }

    public function listArtists()
    {
        $model = new Artist_Model();
        $data['artists'] = $model->getAllArtists();

        echo view('templates/header');
        echo view('artistsList', $data);
        echo view('templates/footer');
    }

    public function drilldownArtist($id)
    {
        $model = new Artist_Model();
        $data['artist'] = $model->getArtistByID($id);

        if (empty($data['artist'])) {
            throw new PageNotFoundException('Artist with ID ' . $id . ' not found.');
        }

        echo view('templates/header');
        echo view('artistDetail', $data);
        echo view('templates/footer');
    }

    public function deleteArtist($id)
    {
        $model = new Artist_Model();
        $model->delete($id);
        return redirect()->to('/artists');
    }

}