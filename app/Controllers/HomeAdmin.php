<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Barang_model;

class HomeAdmin extends Controller{
    public function index(){
        $model = new Bidang_admin_model;
        $data['titile'] = 'Data Barang';
        $data['getNamaBidang'] = $model->getNamaBidang();
        echo view('header_view', $data);
        echo view('barang_view', $data);
        echo view('footer_view', $data);
    }
}