<?php namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\Users_Model;
use App\Models\Bidang_admin_model;

class User extends Controller{

    public function index(){
        $userModel = new Users_Model;
        $bidangAdminModel = new Bidang_admin_model;
        $data['getUserData'] = $userModel -> getUserModel();
        $data['getNamaBidang'] = $bidangAdminModel -> getNamaBidang();
        return view('admin/pages/user',$data);
    }

    public function deleteUser($id){
        $model = new Users_Model;
        $model -> deleteUser($id);
        return redirect()->to('/User');
    }
    
    public function editUser($data){
        $model = new Users_Model;
        $model -> editUsers();
        return redirect()->to('/User');
    }
}