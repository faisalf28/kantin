<?php namespace App\Models;
 
use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = "barang";    
    protected $primaryKey = "id_barang";
    protected $allowedFields = ['id_barang', 'id_penjual', 'nama_barang', 'harga_barang', 'gambar_barang'];
    
    public function getBarang($id = false)
    {
        if($id === false){
            return $this->table('barang')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('barang')
                        ->join('penjual','penjual.id_penjual = barang.id_penjual')
                        ->where('id_barang', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function search($keyword)
    {
        // $builder = $this->table('dokter');
        // $builder->like('nama_dokter', $keyword);
        // return $builder;
        return $this->table('barang')->like('id_barang', $keyword)
                                    //  ->orLike('id_barang', $keyword)
                                     ->orLike('id_penjual', $keyword)
                                     ->orLike('nama_barang', $keyword)
                                     ->orLike('harga_barang', $keyword)
                                     ->orLike('gambar_barang', $keyword)
                                     ;
    }
    
    public function update_barang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_barang' => $id]);
    }

    // ==================================Hapus=====================================
    public function delete_barang($id)
    {
        return $this->db->table($this->table)->delete(['id_barang' => $id]);
    } 
}