<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        echo view('zeme');
    }

    public function zeme()
    {
        echo view('zeme');
    }

    public function stanice()
    {
        echo view('stanice');
    }

    public function udaje()
    {
        echo view('udaje');
    }
}
