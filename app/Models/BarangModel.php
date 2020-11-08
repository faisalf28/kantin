<?php namespace App\Models;
 
use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = "barang";    
    
    public function getBarang($id = false)
    {
        if($id === false){
            return $this->table('barang')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('barang')
                        ->where('id_barang', $id)
                        ->get()
                        ->getRowArray();
        }   
    } 
}