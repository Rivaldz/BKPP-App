<?php namespace App\Controllers;
use CodeIgniter\Controller;

class login extends Controller{
    public function index(){
    return view('admin/pages/login');
    }
}