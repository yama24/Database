<?php

class M_data extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	// fungsi untuk mengambil data dari database
	function get_data($table)
	{
		return $this->db->get($table);
	}
	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}
	public function distinct_pekerjaan()
	{
		$this->db->distinct('basis_pekerjaan');
		$this->db->select('basis_pekerjaan');
		$this->db->from('basis');
		return $this->db->get();
	}
	public function distinct_provinsi()
	{
		$this->db->distinct('basis_provinsi');
		$this->db->select('basis_provinsi');
		$this->db->from('basis');
		return $this->db->get();
	}
	public function distinct_kabupaten()
	{
		$this->db->distinct('basis_kabupaten');
		$this->db->select('basis_kabupaten');
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jan1()
	{
		$month = 1;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function feb1()
	{
		$month = 2;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function mar1()
	{
		$month = 3;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function apr1()
	{
		$month = 4;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function mei1()
	{
		$month = 5;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jun1()
	{
		$month = 6;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jul1()
	{
		$month = 7;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function agu1()
	{
		$month = 8;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function sep1()
	{
		$month = 9;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function okt1()
	{
		$month = 10;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function nov1()
	{
		$month = 11;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function des1()
	{
		$month = 12;
		$year = date('Y');
		$status = 1;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jan2()
	{
		$month = 1;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function feb2()
	{
		$month = 2;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function mar2()
	{
		$month = 3;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function apr2()
	{
		$month = 4;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function mei2()
	{
		$month = 5;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jun2()
	{
		$month = 6;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function jul2()
	{
		$month = 7;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function agu2()
	{
		$month = 8;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function sep2()
	{
		$month = 9;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function okt2()
	{
		$month = 10;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function nov2()
	{
		$month = 11;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function des2()
	{
		$month = 12;
		$year = date('Y');
		$status = 2;
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('basis');
		return $this->db->get();
	}
	public function getBasis()
	{
		$this->db->select("
		basis.basis_id AS basisId, 
		basis.basis_nama AS basisNama, 
		basis.basis_ttl AS basisTtl, 
		basis.basis_tempat_kerja AS basisTempatkerja, 
		basis.basis_gender AS basisGender, 
		basis.basis_pekerjaan AS basisPekerjaan, 
		provinces.name AS provincesName, 
		regencies.name AS regenciesName, 
		districts.name AS districtsName, 
		villages.name AS villagesName, 
		provinces.id AS provincesId, 
		regencies.id AS regenciesId, 
		districts.id AS districtsId, 
		villages.id AS villagesId, 
		basis.basis_phone AS basisPhone, 
		basis.basis_email AS basisEmail, 
		basis.input_year AS year, 
		basis.input_month AS month, 
		basis.input_date AS date, 
		basis.input_time AS time, 
		basis.tipe_grup AS basisTipegrup,
		basis.grup AS basisGrup,
		basis.slug AS basisSlug
		");
		$this->db->join("provinces", "basis.basis_provinsi=provinces.id");
		$this->db->join("regencies", "basis.basis_kabupaten=regencies.id");
		$this->db->join("districts", "basis.basis_kecamatan=districts.id");
		$this->db->join("villages", "basis.basis_desa=villages.id");
		$this->db->order_by("basis.basis_id", "desc");
		return $this->db->get("basis");
	}
	public function getLinksBySlug($slug)
	{
		$this->db->select("
		*,
		links.links_id AS linksId, 
		links.links_slug AS linksSlug, 
		links.links_nama AS linksNama, 
		links.links_tipe AS linksTipe, 
		links.links AS links
		");
		$this->db->from("links");
		$this->db->order_by("links.links_id", "asc");
		$this->db->where('links.links_slug', $slug);
		return $this->db->get()->row_array();
	}
	// AKHIR FUNGSI CRUD
}
