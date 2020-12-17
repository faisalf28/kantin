<?php

namespace App\Controllers;

use Codeigniter\Controller;
use App\Models\UserModel;
use App\Models\PembeliModel;
use App\Models\AuthModel;
use phpDocumentor\Reflection\Types\Null_;

class Auth extends BaseController
{

public function v_login()
  {
    $data = [
      'title' => 'Login'
    ];
    return view('login', $data);
  }

public function v_register()
  {
    $data = [
      'title' => 'Register',
      'validate' => \Config\Services::validation()
    ];
    return view('register', $data);
  }

// public function v_registerProf()
//   {
//     $data = [
//       'title' => 'Register',
//       'validate' => \Config\Services::validation()
//     ];
//     return view('register_profile', $data);
//   }

  public function register()
  {
    //validasi
    if (!$this->validate([
      'username' => [
        'rules'  => 'required|Is_unique[user.username]',
        'errors' => [
          'required'    => 'Username harus di isi !!!',
          'Is_unique'   => 'Username anda sudah terdaftar !!!',
        ]
      ],
      'password' => [
        'rules'  => 'required|Is_unique[user.password]|min_length[8]',
        'errors' => [
          'required'    => 'Password harus di isi !!!',
          'Is_unique'   => 'Password sudah terdaftar di user lain !!!',
          'min_length'  => 'Inputan Password minimal 8 !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/registrasi')->withInput()->with('validate', $validasi);
    }

    $data = array(
      // 'nama'      => $this->request->getPost('nama'),
      'username'  => $this->request->getPost('username'),
      'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      // 'level'     => $this->request->getPost('level'),
    );
    $model = new UserModel();
    $model->insert($data);
    session()->setFlashdata('success', 'Anda berhasil registrasi akun !!!');
    return redirect()->to('/');
  }

  // public function registerProf()
  // {
  //   //validasi
  //   if (!$this->validate([
  //     'nama_pembeli' => [
  //       'rules'  => 'required|alpha_space',
  //       'errors' => [
  //         'required'    => 'Nama harus di isi !!!',
  //         'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
  //       ]
  //     ],
  //     'nohp' => [
  //       'rules'  => 'required|alpha_numeric',
  //       'errors' => [
  //         'required' => 'Nomor Handphone harus di isi !!!'
  //       ]
  //     ]
  //   ])) {
  //     $validasi = \Config\Services::validation();
  //     return redirect()->to('/registrasi_p')->withInput()->with('validate', $validasi);
  //   }

  //   $data = array(
  //     'nama_pembeli' => $this->request->getPost('nama_pembeli'),
  //     'nohp'  => $this->request->getPost('nohp'),
  //     // 'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
  //     // 'level'     => $this->request->getPost('level'),
  //   );
  //   $model = new PembeliModel();
  //   $model->insert($data);
  //   session()->setFlashdata('success', 'Anda berhasil registrasi akun !!!');
  //   return redirect()->to('/');
  // }

  public function login()
  {
    var_dump(session('level'));
    $model = new AuthModel;
    $table = 'user';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row      = $model->get_data_login($username, $table);
    if ($row == Null) {
      session()->setFlashdata('warning', 'Username atau Password tidak terisi !!!');
      return redirect()->to('/');
    }
    if (password_verify($password, $row->password)) {
      $data = array(
        'login'    => TRUE,
        // 'nama'     => $row->nama,
        'username' => $row->username,
        'level'    => $row->level,
      );
      session()->set($data);
	  session()->setFlashdata('success', 'Berhasil login !!!');
      if ($row->level == 'penjual') {
        return redirect()->to('/penjual');
      } else {
          return redirect()->to('/home');
      }
    }
    session()->setFlashdata('warning', 'Username atau Password salah !!!');
    return redirect()->to('/');
  }

  public function logout()
  {
    session()->remove('username');
    session()->remove('password');
    session()->remove('level');
    session()->setFlashdata('success', 'Anda berhasil logout !!!');
    return redirect()->to('/');
  }
}