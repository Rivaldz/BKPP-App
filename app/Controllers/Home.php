<?php namespace App\Controllers;

use App\Models\FileModel;
use App\Models\Bidang_admin_model;
use App\Models\Users_Model;
use App\Models\DataBidang_Model;

class Home extends BaseController
{
	public function __construct() {
		$this->fileModel = new FileModel();
	}

	public function index()
	{
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
		// $this->load->view('admin/pages/home',$data);
		return view('admin/pages/home',$data);
	}

	public function upload()
	{
		$modelUpload = new FileModel();

		$file = $this->request->getFile('files');
		$file->move('uploads');
		$nameFile = $file->getName();
		$date = date("Y/m/d");

		$data = array(
			'nama_file' => $nameFile,
			'tanggal_upload' => $date,
			'data_bidang_id' => $this->request->getPost('idHome'),
			'status' => 1,
			'nama_bidang_id' => session()->get('id_bidang'),
		);

		$modelUpload->saveFile($data);
		return redirect() ->to('/Home');
	}

}
