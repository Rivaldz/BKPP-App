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
		// helper(['form', 'url']);
		if (!$this->validate([
			'files' => [
				'rules' => 'ext_in[files,xls,xlsx,xlsb,xlsm,xlt,xltx,xltm,xla,xlam,xlm,csv]',
				'errors'=> [
					'ext_in'=>'{field} tidak cocok'
				]
			]
		])) {
			return redirect()->to('/home')->withInput();
		}
		$files = $this->request->getFile('files');
		$namaFile = $files->getName();
		$newName = url_title($namaFile, '-',true);
		$tipeFile = $files->getClientExtension();
		$sizeFile = $files->getSize();
		// $files->move('uploads',$namaFile);


		$upData = [
			'name'=>$newName,
			'type'=>$tipeFile,
			'size'=>$sizeFile
		];

		return dd($upData);

		// $this->fileModel->save($upData);
		// return redirect()->to('/home');
	}


	//--------------------------------------------------------------------

}
