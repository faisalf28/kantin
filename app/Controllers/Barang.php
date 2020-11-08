<!-- <?//php  -->
 
// namespace App\Controllers;
 
// use CodeIgniter\Controller;
// use App\Models\BarangModel;
 
// class Barang extends BaseController
// {
//     protected $BarangModel;
//     public function __construct() {
 
//         $this->barang = new BarangModel();
        
//     }
 
//     public function index()
//     {
//         $keyword = $this->request->getVar('keyword');
//         if($keyword) {
//             $this->barang->search($keyword);
//         } else {
//             $this->barang;
//         }

//         // $data['barang'] = $this->barang->getBarang();
//         $data = [
//             'title' => 'Daftar Barang',
//             'barang' => $this->barang->findAll()
//         ];
//         // echo view('layout');
//         echo view('index', $data);
//     } 

// }