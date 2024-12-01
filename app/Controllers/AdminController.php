<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends BaseController
{
  
    public function index()
    {
      
        return view('admin/index');
    }

}