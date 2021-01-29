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
	}

	public function upload()
	{
		helper(['form', 'url']);
		if (!$this->validate([
			'files' => [
				'rules' => 'uploaded[files]|ext_in[files,xls,xlsx,xlsb,xlsm,xlt,xltx,xltm,xla,xlam,xlm,csv]',
				'errors'=> [
					'uploaded'=>'{field} tidak boleh kosong!',
					'ext_in'=>'{field} tidak cocok'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/home')->withInput()->with('validation', $validation);
		}
		$files = $this->request->getFile('files');
		$namaFile = $files->getName();
		$tipeFile = $files->getClientExtension();
		$sizeFile = $files->getSize();
		$files->move('uploads',$namaFile);


		$upData = [
			'name'=>$namaFile,
			'type'=>$tipeFile,
			'size'=>$sizeFile
		];

		$this->fileModel->save([
			'nama_file'=>$namaFile,
			'tipe_file'=>$tipeFile,
			'ukuran_file'=>$sizeFile
		]);
		return redirect()->to('/home');
		// helper(['form', 'url']);
		// $input = $this->validate([
		// 	'file' => [
		// 		'uploaded[file]|ext_in[file,xls,xlsx,xlsb,xlsm,xlt,xltx,xltm,xla,xlam,xlm,csv]',
		// 		'errors'=>[
		// 			'uploaded'=>'{field} tidak boleh kosong.',
		// 			'ext_in'=>'{field} tidak sesuai format'
		// 		]
		// 	]
		// ]);
		// if (!$input) {
		// 	print_r('Unggah file yang valid');
		// }else {
		// 	$file = $this->request->getFile('file');
		// 	$file->move(WRITEPATH. 'uploads');

		// 	$data = [
		// 		'nama_file'=>$file->getName(),
		// 		'tipe_file'=>$file->getExtension()
		// 	];

		// 	$this->fileModel->save($data);
		// }
	}


	//--------------------------------------------------------------------

}
