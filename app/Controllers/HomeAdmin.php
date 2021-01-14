<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;

class HomeAdmin extends Controller{

    protected $modelBidang;

    public function __construct() {
        $this->modelBidang = new Bidang_admin_model();
    }

    public function index(){
        $model = new Bidang_admin_model;
        $data['title'] = 'Data Bidang';
        $data['getNamaBidang'] = $model->getNamaBidang();
        $data['validation'] = \Config\Services::validation();
        
        return view('admin/pages/home_admin',$data);
        // return dd($data['getNamaBidang']);
    }

    public function addBidang(){
        $model = new Bidang_admin_model;
        $data = array(
            'nama_bidang' => $this->request->getPost('nama')
        );
        if (!$this->validate([
            'nama'=>[
                'rules'=>'required',
                'errors'=> [
                    'required'=>'{field} tidak boleh kosong!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/homeadmin')->withInput()->with('validation', $validation);
        }
        $model->saveBidang($data);
        echo '<script>
                 alert("Sukses Tambah Data Barang");
                 window.location="'.base_url('homeadmin').'"
              </script>';

    }

    public function editBidang($id) 
    {
        if (!$this->validate([
            'nama'=>[
                'rules'=>'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong!' 
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/homeadmin')->withInput()->with('validation', $validation);
        }
        $this->modelBidang->updateBidang([
            'id_bidang' => $id,
            'nama_bidang'=>$this->request->getVar('nama')
        ]);
        return redirect()->to('/homeadmin');
    }

    public function delete($id)
    {
        $model = new Bidang_admin_model;
        $model->deleteBidang($id);
        return redirect()->to('/homeadmin');
    }
}