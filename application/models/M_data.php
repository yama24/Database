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

	function get_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinces');
		$query = $this->db->get();

		return $query->result();
	}

	public function getBasis()
	{
		$this->db->select("basis.basis_id AS basisId, basis.basis_nama AS basisNama, basis.basis_ttl AS basisTtl, basis.basis_tempat_kerja AS basisTempatkerja, basis.basis_gender AS basisGender, basis.basis_pekerjaan AS basisPekerjaan, provinces.name AS provincesName, regencies.name AS regenciesName, districts.name AS districtsName, villages.name AS villagesName, provinces.id AS provincesId, regencies.id AS regenciesId, districts.id AS districtsId, villages.id AS villagesId, basis.basis_phone AS basisPhone, basis.basis_email AS basisEmail, basis.basis_datainput AS basisDatainput");
		$this->db->join("provinces", "basis.basis_provinsi=provinces.id");
		$this->db->join("regencies", "basis.basis_kabupaten=regencies.id");
		$this->db->join("districts", "basis.basis_kecamatan=districts.id");
		$this->db->join("villages", "basis.basis_desa=villages.id");
		$this->db->order_by("basis.basis_id", "desc");
		return $this->db->get("basis");
	}

	// AKHIR FUNGSI CRUD
}
