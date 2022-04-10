<?php namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\FileModel;
use App\Models\Bidang_admin_model;
use App\Models\Users_Model;
use App\Models\DataBidang_Model;

class LihatData extends Controller{
    public function index(){
        
        return view('admin/pages/view_data_user');

    }
}