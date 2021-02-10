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
		if($file->getError() == 4){
			echo "<script>
            alert('Password atau Username Anda Salah');
            window.location.href='/home';
            </script>";
		}else{
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

	public function download($var){
		$response = $this->response;;
		
		$path ='uploads/'.(string)$var;

		echo $path;
		return $response->download($path, null);
	}

	public function editFile($id){
		$model = new FileModel;
		$nameFile = $model->find($id);
		// echo $nameFile['nama_file'];
	 	unlink('uploads/'.$nameFile['nama_file']);

		$file = $this->request->getFile('editFiles');
		$file->move('uploads');
		$fileName = $file->getName();
	// 	// unlink('uploads/8.png');
        $object = array(
            'id' => $id,
            'nama_file'=>$fileName,
			'tanggal_upload' => date('Y/m/d'),
			'data_bidang_id' => $this->request->getPost('nameRevisi'),
			'status' => 1,
			'review' => " ",
        );
        
        $model->editFile($object);

		return redirect()->to('/Home');
	}


}
