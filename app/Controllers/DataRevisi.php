<?php namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\FileModel;
use App\Models\Bidang_admin_model;
use App\Models\Users_Model;
use App\Models\DataBidang_Model;


class DataRevisi extends Controller{

    public function __construct() {
        $this->fileModel = new FileModel();
    }
	
    public function index(){
        $model = new Bidang_admin_model;
        $modelUser = new Users_Model;
        $modelDataBidang = new DataBidang_Model;
        
		$data = [
			'judul' => 'Home',
			'validation'=>\Config\Services::validation(),
			'dataFile' => $this->fileModel->findAll()
		];
		$data['getNamaBidang'] = $model->getNamaBidang();
        $data['getUser0'] = $modelUser->getUserModel();
		$data['getBidangData'] = $modelDataBidang->getDataBidang();
        return view('admin/pages/data_revisi',$data);
    }

}