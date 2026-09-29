<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Bundesland;
use App\Models\Station;
use App\Models\Data;
//use CodeIgniter\Pager\PagerRenderer;

class Main extends BaseController
{   
    var $zeme;
    var $stanice;
    var $udaje;
    var $staniceVsech;

    public function __construct()
    {
        $this->zeme = new Bundesland();
        $this->stanice = new Station();
        $this->udaje = new Data();
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

    public function staniceinfo($bundesland)
    {
        //$data["zeme"] = $this->zeme->find($bundesland);
        $zeme = $this->zeme->find($bundesland);
        $data["zeme"] = $zeme;
        echo view('staniceinfo', $data);
    }
/**
 * @bundesland - id země
 */
    public function staniceZemi($bundesland) 
    {
        
        $data["zeme"] = $this->zeme->find($bundesland);
        $data["stanice"] = $this->stanice->where("bundesland", $bundesland)->findAll();
        echo view('stanice', $data);
    }
    /**
     * @stanice - id stanice 
     */
    public function udajeStanic($stanice)
    {
        
        

        $data["stanice"] = $this->stanice->find($stanice);
        //$data["udaje"] = $this->udaje->where("Stations_ID", $stanice)->findAll();
        $data["udaje"] = $this->udaje->where("Stations_ID", $stanice)->orderBy("date", "asc")->paginate(25);
        //$data = $this->stanice->where('Stations_ID', $stanice)->orderBy('date', 'asc')->paginate(25);
        $data["pager"] = $this->udaje->pager;
        echo view('udaje', $data);
    }

    public function deleteUdaje($id)
    {
        $this->udaje
            ->builder()
            ->where('id', $id)
            ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return redirect()->back();
    }

    public function deleteUdajeMesic($staniceId)
    {
        $month = (int) $this->request->getPost('month');
        $year = (int) $this->request->getPost('year');

        if ($month < 1 || $month > 12 || $year < 1900 || $year > 2100) {
            return redirect()->back();
        }

        $ids = $this->udaje
            ->select('id')
            ->where('Stations_ID', $staniceId)
            ->where('MONTH(date)', $month, false)
            ->where('YEAR(date)', $year, false)
            ->findAll();

        if ($ids !== []) {
            $this->udaje
                ->builder()
                ->whereIn('id', array_map(static fn ($row) => $row->id, $ids))
                ->update(['deleted_at' => date('Y-m-d H:i:s')]);
        }

        return redirect()->to(site_url('udaje/' . $staniceId));
    }

    public function vsechny()
    {

        $staniceVsech = $this->stanice->join('bundesland','bundesland.id=station.bundesland','inner')->orderBy("place", "asc")->findAll();
        $data["staniceVsech"] = $staniceVsech;
        //$data["flag"] = $this->zeme->findAll("flag");
        echo view('vsechny', $data);
    }
}
