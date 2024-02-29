<?php

namespace App\Controllers;

use App\Models\Slepia;

class Peminjaman extends BaseController
{
    protected function checkAuth()
    {
        $id_user = session()->get('id');
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
        $on="peminjaman.bukuID_peminjaman=buku.bukuID";
        $on2="peminjaman.userID=user.id_user";
        if(session()->get('level') != "peminjam"){
        $data['data']= $model->join3('peminjaman','buku','user',$on,$on2);
        }else{
            $data['data']= $model->join3_w('peminjaman','buku','user',$on,$on2, ['userID' => session()->get('id')]);
        }

        echo view('peminjaman/peminjaman',$data);
    }

    public function input()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new Slepia();
        $on="buku.bukuID=peminjaman.bukuID_peminjaman";
        $data['data']= $model->tampil('buku');
        $data['peminjam']= $model->getWhere('user',['level' => "peminjam"]);

        echo view('peminjaman/input',$data);
    }

    public function aksi_input()
    {
         if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
       
        $bukuID=$this->request->getPost('bukuID');
        $userID=$this->request->getPost('peminjam');
        $pengembalian=$this->request->getPost('pengembalian');
        $maker_pegawai=session()->get('id');

        $peminjaman=array(
            'bukuID_peminjaman'=>$bukuID,
            'userID'=>$userID,
            'tanggalPengembalian'=>$pengembalian,
        );

        $model=new Slepia();
        $model->simpan('peminjaman', $peminjaman);

        return redirect()->to('/peminjaman');

    }

    public function pengembalian($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $peminjaman=array(
            'statusPeminjaman'=> 2,
        );

        $model=new Slepia();
        $model->edit('peminjaman', $peminjaman, ['peminjamanID' => $id]);
      
        return redirect()->to('/peminjaman');


    }

    public function hapus($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new Slepia();
        $where2=array('peminjamanID'=>$id);

        $model->hapus('peminjaman',$where2);

        return redirect()->to('/peminjaman');

        
    }


}