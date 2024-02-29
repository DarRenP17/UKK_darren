<?php

namespace App\Controllers;

use App\Models\Slepia;

class Pengawai extends BaseController
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
        $data['data']= $model->getWhere('user',['level !=' => 'peminjam']);
        echo view('pengawai/pengawai',$data);
    }

    public function input_pengawai()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new Slepia();
        echo view('pengawai/input');
    }

    public function aksi_input()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

       
        $namaLengkap=$this->request->getPost('nama_pegawai');
        $email=$this->request->getPost('email');
        $alamat=$this->request->getPost('alamat');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_pegawai=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5('halo#12345'),
            'level'=>$level,
            'alamat'=>$alamat,
            'email'=>$email,
            'namaLengkap'=> $namaLengkap
        );

        $model=new Slepia();
        $model->simpan('user', $user);
        
        return redirect()->to('/pengawai');

    }


    public function edit($id)
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new Slepia();
        $data['data']= $model->getRow('user',['id_user ' => $id]);
        echo view('pengawai/edit',$data);
    }

    public function aksi_edit()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $id= $this->request->getPost('id');    
        $namaLengkap=$this->request->getPost('nama_pegawai');
        $email=$this->request->getPost('email');
        $alamat=$this->request->getPost('alamat');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_pegawai=session()->get('id');

        $where=array('id_user'=>$id);    
       
            $user=array(
            'level'=>$level,
            'alamat'=>$alamat,
            'email'=>$email,
            'namaLengkap'=> $namaLengkap
            );
        

        $model=new Slepia();
        $model->edit('user', $user,$where);

        return redirect()->to('/pengawai');

    }

    public function hapus($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where2=array('id_user'=>$id);

        $model->hapus('user',$where2);

        return redirect()->to('/pengawai');
        
    }

    public function reset_password($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('halo#12345')
        );
        $model->edit('user',$data,$where);

        return redirect()->to('/pengawai');

    }

}