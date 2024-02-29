<?php

namespace App\Controllers;

use App\Models\Slepia;

class Koleksi extends BaseController
{
    protected function checkAuth()
    {
        $id_user = session()->get('id');
        $level = session()->get('level');
        if ($id_user != null) {
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

        $model = new Slepia();
        $koleksi= $model->getWhere('koleksipribadi',['userID ' => session()->get('id')]);
        $idbuku= [];
        foreach ($koleksi as $kolek){
            $idbuku[] = $kolek->bukuID;
        }
        $data['data']= [];
        $data['kategori']=[];
        if (!empty($cek)) {
        $data['data']= $model->koleksi2($idbuku);
        $data['kategori']= $model->relasiKategori();
        }
        // print_r($data);
        echo view('koleksi/koleksi',$data);
    }


    public function tambahKoleksi($idbuku)
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
       
        $id=session()->get('id');

        $koleksi=array(
            'bukuID'=>$idbuku,
            'userID'=> $id
        );

        $model=new Slepia();
        $model->simpan('koleksipribadi', $koleksi);
        
        return redirect()->to('/buku');

    }

    public function hapus($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where2=array('bukuID'=>$id,
                     'userID'=>session()->get('id'));

        $model->hapus('koleksipribadi',$where2);

        return redirect()->to('/koleksi');

        
    }


    public function hapusKoleksi($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where2=array('bukuID'=>$id,
                     'userID'=>session()->get('id'));

        $model->hapus('koleksipribadi',$where2);

        return redirect()->to('/buku');

        
    }



}