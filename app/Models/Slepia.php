<?php

namespace App\Models;
use CodeIgniter\Model;

class Slepia extends model
{

	public function tampil($table)
	{
		$primaryKey = $this->db->getFieldData($table)[0]->name; // Get the name of the primary key column
		return $this->db->table($table)
						->orderBy($primaryKey, 'desc')
						->get()
						->getResult();
	}

	public function bukuKategori()
	{
		$data = $this->db->table('kategoribuku_relasi')
						->join('kategoribuku', 'kategoribuku_relasi.kategoriID=kategoribuku.kategoriID')
						->get()
						->getResult();
		foreach($data as $dataa){
			$result[$dataa->bukuID][]= $dataa;
		}
		return $result;
	}

	public function koleksi($where)
	{
		$data = $this->db->table('koleksipribadi')
						->getWhere($where)
						->getResult();
		$result = [];
		foreach($data as $dataa){
			$result[$dataa->bukuID]= $dataa;
		}
		return $result;
	}

	public function koleksi2($where)
	{
		return $this->db->table('koleksipribadi')
		->whereIn('bukuID', $where)
						->get()
						->getResult();
	}

	
	public function filterbuku($awal,$akhir)
	{
		$query = $this->db->table('buku')
    ->where('buku.tanggal BETWEEN "'.$awal.'" AND "'.$akhir.'"')
    ->get();

return $query->getResult();

	}


	public function edit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}

	public function hapus($table, $where)
	{
		return $this->db->table($table)->delete($where);
	}

	public function simpan($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}

    public function getWhere($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getResult();
	}

	public function getWhereDESC($table, $where)
	{
		$primaryKey = $this->db->getFieldData($table)[0]->name;
		return $this->db->table($table)->orderBy($primaryKey, 'desc')->getWhere($where)->getResult();
	}

	public function getRow($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}


	public function getRowArray($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

	public function join3($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->get()->getResult();
	}

	public function join3_w($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getResult();
	}


}