<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Bundesland;

class Main extends BaseController
{   
    var $zeme;

    public function __construct()
    {
        $this->zeme = new Bundesland();
    }

    public function index()
    {
    
        echo view('zeme');
    }

    public function zeme()
    {
        $zeme = $this->zeme->findAll();
        $data["zeme"] = $zeme;
        echo view('zeme', $data);
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
