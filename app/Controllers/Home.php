<?php

namespace App\Controllers;

use App\Models\Slepia;

class Home extends BaseController
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
         if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        echo view('halaman/login');
    }

    public function register()
    {
         if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        echo view('halaman/register');
    }

    public function aksi_registrasi()
    {
        if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');
        $namaLengkap=$this->request->getPost('namaLengkap');
        $email=$this->request->getPost('email');
        $alamat=$this->request->getPost('alamat');

        $model= new Slepia();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p),
            'level'=>'peminjam',
            'alamat'=>$alamat,
            'email'=>$email,
            'namaLengkap'=> $namaLengkap
        );
        $model->simpan('user', $data);
        $cek= $model->getRowArray('user', $data);
        if ($cek>0) {
            // $where=array('id_pegawai_user'=>$cek['id_user']);
            // $pegawai=$model->getRowArray('pegawai', $where);

                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('Nama', $cek['namaLengkap']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Home/dashboard');
                
            } else {         
        }
        return redirect()->to('/');
    }


    public function aksi_login()
    {
        if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new Slepia();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getRowArray('user', $data);
        if ($cek>0) {
            // $where=array('id_pegawai_user'=>$cek['id_user']);
            // $pegawai=$model->getRowArray('pegawai', $where);

                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('Nama', $cek['namaLengkap']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Home/dashboard');
                
            } else {         
        }
        return redirect()->to('/');
    }

    public function logout()
    {
       
            $model = new Slepia();

            $id = session()->get('id');

            session()->destroy();
            return redirect()->to('/');
        
    }

    public function dashboard()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/logout'));
        }

        echo view ('halaman/dashboard');

    }

}
