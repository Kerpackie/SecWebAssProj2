<?php

namespace App\Models;

use CodeIgniter\Model;

class Artist_Model extends Model
{
    protected $table = 'artist';
    protected $primaryKey = 'artId';
    protected $allowedFields = ['artBusinessName', 'artAddress', 'artContact', 'artPhoto'];

    public function getArtistByID($id)
    {
        return $this->find($id);
    }

    public function getAllArtists()
    {
        return $this->findAll();
    }

    public function delArtist($id)
    {
        $builder = $this->builder();
        $builder->delete(['artId' => $id]);
        return $builder;
    }

    public function updArtist($newData, $id)
    {
        $builder = $this->builder();
        $builder->where('artId', $id);
        $builder->update($newData);
        return $builder;
    }
}