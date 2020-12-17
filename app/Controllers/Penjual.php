<?php namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualModel;
use App\Models\TransaksiModel;
class Penjual extends BaseController
{
	public function __construct() {   
        helper('form');
      $this->barangm = new BarangModel();
      $this->penjualm = new PenjualModel();     
     $this->transaksim = new TransaksiModel();
    }

	public function index()
	{
        $id = 8;
        $data ['barang']= $this->barangm->where('id_penjual',$id)
                                        ->findAll();  
        $data ['penjual']= $this->penjualm->getPenjual($id);
        // Mengirim data ke dalam view
        
        echo view('penjual/penjual', $data);
        echo view('footer');
    }   

    // -----------------------------------Insert Data Menu=================================
    function tambah($id){
        $data['validation'] = $this->validator;        
        $data['penjual'] = $this->penjualm->getPenjual($id); 
        echo view('penjual/v_input',$data);
    }

    function tambah_aksi()
    {
        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);

        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();

        } else {
            $id = $this->request->getPost('id_penjual');
            $nama = $this->request->getPost('nama_barang');
            $harga = $this->request->getPost('harga_barang');
            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/assets/img');
            

            $data = [
                'id_barang'=>NULL,
                'id_penjual'=>$id,
                'nama_barang'=>$nama,
                'harga_barang'=>$harga,
                'gambar_barang' => $avatar->getName()
            ];
            
            $tambah = $this->barangm->insert($data);            
            if($tambah)
            {

                return redirect()->to(base_url('penjual')); 
            }else
            {
                echo "gagal";
            }
        }
    }

    ///////////////////////////konfirmasi////////////////////////////////
    public function update($id)
    {    
        $status = "sudah dibayar";
        $data = [
            'status' => $status
        ];
        $edit = $this->transaksim->update_status($data, $id);
        // Jika berhasil melakukan edit
    
        if($edit)
        {            
            session()->setFlashdata('warning', 'konfirmasi selesai');
            return redirect()->to(base_url('penjual'));
        }
    } 
    
    // =====================================Transaksi========================================
    function transaksi($id){        
        $data['transaksi'] = $this->transaksim->getData($id);
        echo view('penjual/v_transaksi',$data);
    }

    // =====================================Update Menu========================================
    function edit($id){  
        $data['validation'] = $this->validator;       
        $data['barang'] = $this->barangm->getBarang($id);                 
        echo view('penjual/v_edit',$data);
    }
    public function update_barang()
    {
        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);

        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();

        } else {
            $id = $this->request->getPost('id_barang');
            $penjual = $this->request->getPost('id_penjual');
            $nama = $this->request->getPost('nama_barang');
            $harga = $this->request->getPost('harga_barang');
            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/assets/img');
            

            $data = [
                'id_barang'=>$id,
                'id_penjual'=>$penjual,
                'nama_barang'=>$nama,
                'harga_barang'=>$harga,
                'gambar_barang' => $avatar->getName()
            ];
            
            $edit = $this->barangm->update_barang($data, $id);            
            if($edit)
            {

                return redirect()->to(base_url('penjual')); 
            }else
            {
                echo "gagal";
            }
        }
    }

    // =========================================Hapus Produk===================================
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->barangm->delete_barang($id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Data Produk berhasil dihapus');
            // Redirect ke halaman product
            return redirect()->to(base_url('penjual'));
        }
    }
}  