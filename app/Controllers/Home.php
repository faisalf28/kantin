<?php namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualModel;

class Home extends BaseController
{
	public function __construct() {   

      $this->barangm = new BarangModel();
      $this->penjualm = new PenjualModel();
       
    }
    
	public function index()
	{
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $this->barangm->search($keyword);
        } else {
             $this->barangm;
        }
        // ====================================================
        $data ['barang']= $this->barangm->findAll();
        $data ['penjual']= $this->penjualm->findAll();
        echo view('header', $data);
        echo view('index', $data);
        echo view('footer');

        
    }
    //--------------------------------------------------------------------
    public function detail($id){
        $data ['barang']= $this->barangm->where('id_penjual',$id)
                                        ->findAll();  
        $data ['penjual']= $this->penjualm->findAll();
        // Mengirim data ke dalam view
        echo view('header', $data);
        echo view('detail', $data);
        echo view('footer');

    }

}