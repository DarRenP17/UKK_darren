<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\Slepia;
use Dompdf\Dompdf;

class Laporan extends BaseController
{

    protected function checkAuth()
    {
        $id_user = session()->get('id');
        $level = session()->get('level');
        if ($id_user != null && $level != 'peminjam') {
            return true;
        } else {
            return false;
        }
    }
    public function index()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
       

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('laporan/filter');

        
    }

    public function print()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filterbuku($awal,$akhir);
        echo view('laporan/kertas_laporan',$data);

        
    }

    public function pdf()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filterbuku($awal,$akhir);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/kertas_laporan',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();    

        
    }


  
}
