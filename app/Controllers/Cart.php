<?php namespace App\Controllers;
 
use App\Models\BarangModel;
use App\Models\TransaksiModel;
// memanggil library / package WFcart
use Wildanfuady\WFcart\WFcart;
 
class Cart extends BaseController
{
 
    public function __construct() {
 
        // memanggil model barang
        $this->barang = new BarangModel;
        $this->transaksi = new TransaksiModel;
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
 
    }
 
    public function index()
    {
        // membuat variabel untuk menampung total keranjang belanja
        $data['items'] = $this->cart->totals();
        // menampilkan total belanja dari semua pembelian
        $data['total'] = $this->cart->count_totals();
        // menampilkan halaman view cart
        return view('cart/index', $data);
    }
 
    public function beli($id = null)
    {
        // cari product berdasarkan id
        $barang = $this->barang->getBarang($id);
        // cek data barang
        if($barang != null){ // jika barang tidak kosong
 
            // buat variabel array untuk menampung data barang
            $item = [
                'id_barang'        => $barang['id_barang'],
                'nama_barang'      => $barang['nama_barang'],
                'harga_barang'     => $barang['harga_barang'],
                'gambar_barang'    => $barang['gambar_barang'],
                'quantity'  => 1
            ];
            // tambahkan barang ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama barang yang ditambahkan
            $barang = $item['nama_barang'];
            // success flashdata
            session()->setFlashdata('success', "Berhasil memasukan {$barang} ke karanjang belanja");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data barang");
        }
        return redirect()->to('/home');
    }
 
    // function untuk update cart berdasarkan id dan quantity
    public function update()
    {
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }
 
    // function untuk menghapus cart berdasarkan id
    public function remove($id = null)
    {
         
        // cari barang berdasarkan id
        $barang = $this->barang->getBarang($id);
        // cek data barang
        if($barang != null){ // jika barang tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus barang dari keranjang belanja");
        } else { // barang tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data barang");
        }
        return redirect()->to('/cart');
    }

    public function order($id){              
        $pembeli = 1;
        $barang = $id;
        $tgl = date("Y-m-d");
        $metode = "bayar ditempat";
        $status = "belum dibayar";


        $data = [
            'id_pembeli' =>$pembeli,
            'id_barang' => $barang,
            'tgl_transaksi' => $tgl,
            'metode_pemesanan' => $metode,
            'status'=>$status

                ]; 
                $simpan = $this->transaksi->insert_transaksi($data);
 
                // Jika simpan berhasil, maka ...
                if($simpan)
                {          
                    $barang = $this->barang->getBarang($id);
                    // cek data barang
                    if($barang != null){ // jika barang tidak kosong
                        // hapus keranjang belanja berdasarkan id
                        $this->cart->remove($id);
                        // success flashdata
                        return redirect()->to(base_url('home')); 
                    } else { // barang tidak ditemukan
                        // error flashdata
                        session()->setFlashdata('error', "Tidak dapat menemukan data barang");
                    }
                    return redirect()->to('/cart');                    
                    
                }else
                {
                    echo 'gagal';
                }
    }
 
}