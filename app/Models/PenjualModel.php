<?php namespace App\Models;
 
use CodeIgniter\Model;

class PenjualModel extends Model
{
    protected $table = "penjual";    
    
    public function getPenjual($id = false)
    {
        if($id === false){
            return $this->table('penjual')
                        ->where('id_penjual', $id)
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('penjual')
                        ->where('id_penjual', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function insert($data = NULL, bool $returnID = true)
    {
        return $this->db->table($this->table)->insert($data);
    }  

}