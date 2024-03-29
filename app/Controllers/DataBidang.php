<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;
use App\Models\Users_Model;
use App\Models\DataBidang_Model;

class DataBidang extends Controller
{
    public function index(){
        $model = new Bidang_admin_model;
        $modelUser = new Users_Model;
        $modelDataBidang = new DataBidang_Model;
        $data['getNamaBidang'] = $model->getNamaBidang();
        $data['getUser0'] = $modelUser->getUserModel();
        $data['getBidangData'] = $modelDataBidang->getDataBidang();

        return view('admin/pages/databidang_admin',$data);
    }
    public function editBidang($id){
        $modelDta = new DataBidang_Model;
        $modelDta->updateBidang([
            'id_isi_bidang' => $id,
            'nama_isi_bidang'=>$this->request->getVar('editNamaDataBidang'),
            'id_bidang' => $this->request->getPost('editOptionDataBidang')
        ]);
        return redirect()->to('/databidang');
    }
    
}