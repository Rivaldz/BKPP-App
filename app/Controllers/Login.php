<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Users_Model;

class login extends Controller{
    public function index(){
        helper(['form']);
        return view('admin/pages/login');
    }

    public function auth()
    {
        $userModel = new Users_Model;
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $cekLogin = $userModel->cekLogin($username, $password);
        if ($cekLogin == 0) {
            echo "<script>
            alert('Password atau Username Anda Salah');
            window.location.href='/login';
            </script>";
            # code...
        }else {
            if ($cekLogin['role'] == 1) {
                # code...
                return redirect()->to('/HomeAdmin');
                session()->set('loginData','1');
            }else{
            session()->set('id_user', $cekLogin['id_user']);
            session()->set('username', $cekLogin['username']);
            session()->set('id_bidang', $cekLogin['id_bidang']);
            return redirect()->to('/Home'); 
            }
            // return redirect()->to('/Login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}