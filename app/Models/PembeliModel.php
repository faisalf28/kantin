<?php namespace App\Models;
 
use CodeIgniter\Model;

class PembeliModel extends Model
{
    protected $table = "pembeli";   
    protected $allowedFields = ['id_pembeli', 'id_user', 'nama_pembeli', 'nohp', 'gender'];
    
    public function getModel($id = false)
    {
        if($id === false){
            return $this->table('pembeli')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pembeli')
                        ->where('id_pembeli', $id)
                        ->get()
                        ->getRowArray();
        }   
    } 
}