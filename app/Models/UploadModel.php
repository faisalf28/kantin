<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UploadModel extends Model
{
    protected $table = "barang";    

 
    public function get_uploads()
    {
        return $this->table('barang')
                    ->get()
                    ->getResultArray();
    }
    public function insert_gambar($data)
    {
        return $this->table->insert($data);
    }
} 