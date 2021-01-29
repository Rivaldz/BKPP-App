<?php namespace App\Controllers;

use App\Models\FileModel;

class Home extends BaseController
{
	public function __construct() {
		$this->fileModel = new FileModel();
	}

	public function index()
	{
		$data = [
			'judul' => 'Home',
			'validation'=>\Config\Services::validation(),
			'dataFile' => $this->fileModel->findAll()
		];
		return view('admin/pages/home', $data);
		// $data = $this->fileModel->findAll();
		// dd($data);
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
