<?php

namespace App\Controllers;

use App\Models\Slepia;

class Kategori extends BaseController
{
    protected function checkAuth()
    {
        $id_user = session()->get('id');
        $level = session()->get('level');
        if ($id_user != null && $level == 'admin') {
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
        $data['data']= $model->tampil('kategoribuku');
        // print_r($data['relasi']);
        echo view('kategori/kategori',$data);
    }

    public function input()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new Slepia();
        echo view('kategori/input');
    }

    public function aksi_input()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

       
        $namaKategori=$this->request->getPost('namaKategori');
        

        $kategori=array(
            'namaKategori'=>$namaKategori,
            'jumlah_buku'=>0
        );

        $model=new Slepia();
        $model->simpan('kategoribuku', $kategori);
    
        return redirect()->to('/kategori');

    }


    public function edit($id)
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new Slepia();
        $data['data']= $model->getRow('kategoribuku',['kategoriID ' => $id]);
        echo view('kategori/edit',$data);
    }

    public function aksi_edit()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

       $id=$this->request->getPost('id');
        $namaKategori=$this->request->getPost('namaKategori');
        

        $kategori=array(
            'namaKategori'=>$namaKategori,
        );

        $model=new Slepia();
        $model->edit('kategoribuku', $kategori,  ['kategoriID' => $id]);

        return redirect()->to('/kategori');

    }

    public function hapus($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where2=array('kategoriID'=>$id);

        $model->hapus('kategoribuku',$where2);

        return redirect()->to('/kategori');

        
    }

}