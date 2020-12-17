<?php namespace App\Models;
 
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = "transaksi";    
    
    public function getTransaksi($id = false)
    {
        if($id === false){
            return $this->table('transaksi')
                        ->join('barang','barang.id_barang = transaksi.id_barang')                        
                        ->join('pembeli','pembeli.id_pembeli = transaksi.id_pembeli')   
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('transaksi')
                        ->join('barang','barang.id_barang = transaksi.id_barang')                        
                        ->join('pembeli','pembeli.id_pembeli = transaksi.id_pembeli')
                        ->get()
                        ->getRowArray();
        }   
    } 

    public function update_status($data, $id)
    {
    return $this->db->table($this->table)->update($data, ['id_transaksi' => $id]);
    } 

    public function insert_transaksi($data)
    {
    return $this->db->table($this->table)->insert($data);
    } 


    public function getData($id)
    {
        return $this->table('transaksi')
                    ->join('barang','barang.id_barang=transaksi.id_barang')
                    ->join('pembeli','pembeli.id_pembeli=transaksi.id_pembeli')
                    ->where('barang.id_penjual',$id)
                    ->findAll();
    }

}