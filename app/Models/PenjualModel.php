<?php namespace App\Models;
 
use CodeIgniter\Model;

class PenjualModel extends Model
{
    protected $table = "penjual";    
    
    public function getModel($id = false)
    {
        if($id === false){
            return $this->table('penjual')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('penjual')
                        ->where('id_penjual', $id)
                        ->get()
                        ->getRowArray();
        }   
    } 
}