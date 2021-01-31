<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;
use App\Models\Users_Model;
use App\Models\DataBidang_Model;

class NamaBidang extends Controller
{
    public function index(){
        $model = new Bidang_admin_model;
        $modelUser = new Users_Model;
        $modelDataBidang = new DataBidang_Model;
        $data['getNamaBidang'] = $model->getNamaBidang();
        $data['getUser0'] = $modelUser->getUserModel();
        $data['getBidangData'] = $modelDataBidang->getDataBidang();
        $data['validation'] = \Config\Services::validation();

        return view('admin/pages/namabidang_admin',$data);
    }
    
}
