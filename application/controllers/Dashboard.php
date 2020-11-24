<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
		// cek session yang login,
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}
	public function index()
	{
		$data['basis'] = $this->m_data->get_data('basis')->result();
		$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		$data['d_provinsi'] = $this->m_data->distinct_provinsi('basis')->result();
		$data['d_kabupaten'] = $this->m_data->distinct_kabupaten('basis')->result();
		$data['page'] = "Dashboard";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_dashboard', $data);
			$this->load->view('dashboard/v_footerv2');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function basis()
	{
		// $data['basis'] = $this->m_data->get_data('basis')->result();
		$data['get_basis'] = $this->m_data->getBasis()->result();
		$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		$data['provinces'] = $this->m_data->get_data('provinces')->result();
		$data['page'] = "Basis Data";
		// $data['regencies'] = $this->m_data->get_data('regencies')->result();
		// $data['districts'] = $this->m_data->get_data('districts')->result();
		// $data['villages'] = $this->m_data->get_data('villages')->result();
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_basis', $data);
			$this->load->view('dashboard/v_footerv2');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function export()
	{
		// $data['basis'] = $this->m_data->get_data('basis')->result();
		$data['get_basis'] = $this->m_data->getBasis()->result();
		// $data['regencies'] = $this->m_data->get_data('regencies')->result();
		// $data['districts'] = $this->m_data->get_data('districts')->result();
		// $data['villages'] = $this->m_data->get_data('villages')->result();
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('export/export', $data);
		} else {
			redirect(base_url('dashboard'));
		}
	}
	function add_ajax_kab($id_prov)
	{
		$query = $this->db->get_where('regencies', array('province_id' => $id_prov));
		$data = "<option value=''>- Pilih Kota/Kabupaten -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	function add_ajax_kec($id_kab)
	{
		$query = $this->db->get_where('districts', array('regency_id' => $id_kab));
		$data = "<option value=''> - Pilih Kecamatan - </option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	function add_ajax_des($id_kec)
	{
		$query = $this->db->get_where('villages', array('district_id' => $id_kec));
		$data = "<option value=''> - Pilih Desa/Kelurahan - </option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}
	public function basis_tambah()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('tempat_kerja', 'Perusahan/lembaga tempat bekerja', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kota/Kabupaten', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Handphone', 'required|is_unique[basis.basis_phone]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[basis.basis_email]');
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$nama = $this->input->post('nama');
			$ttl = $this->input->post('ttl');
			$gender = $this->input->post('gender');
			$pekerjaan = $this->input->post('pekerjaan');
			$tempat_kerja = $this->input->post('tempat_kerja');
			$provinsi = $this->input->post('provinsi');
			$kabupaten = $this->input->post('kabupaten');
			$kecamatan = $this->input->post('kecamatan');
			$desa = $this->input->post('desa');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$datainput = date('Y-m-d H:i:s');

			$data = array(
				'basis_nama' => $nama,
				'slug' => "input database",
				'grup' => "input database",
				'tipe_grup' => "input database",
				'basis_ttl' => $ttl,
				'basis_gender' => $gender,
				'basis_pekerjaan' => $pekerjaan,
				'basis_tempat_kerja' => $tempat_kerja,
				'basis_provinsi' => $provinsi,
				'basis_kabupaten' => $kabupaten,
				'basis_kecamatan' => $kecamatan,
				'basis_desa' => $desa,
				'basis_phone' => $phone,
				'basis_email' => $email,
				'basis_datainput' => $datainput,
			);
			$this->m_data->insert_data($data, 'basis');
			$data['links'] = $this->m_data->get_data('links')->result();
			$data['user'] = $nama;
			$config['charset'] = 'utf-8';
			$config['smtp_crypto'] = $this->config->item('smtp_crypto');
			$config['protocol'] = 'smtp';
			$config['mailtype'] = 'html';
			$config['smtp_host'] = $this->config->item('host_mail');
			$config['smtp_port'] = $this->config->item('port_mail');
			$config['smtp_timeout'] = '5';
			$config['smtp_user'] = $this->config->item('mail_account');
			$config['smtp_pass'] = $this->config->item('pass_mail');
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			$mesg = $this->load->view('email/notif.php', $data, TRUE);
			$this->load->library('email', $config);

			$this->email->from($this->config->item('mail_account'), $this->config->item('app_name'));
			$this->email->to($email);
			$this->email->subject('Notifikasi Input Data');
			$this->email->message($mesg);
			$this->email->send();
			redirect(base_url() . 'dashboard?alert=add');
		} else {
			// Ini tak terpakai
			redirect(base_url() . '?alert=fail');
		}
	}
	public function basis_update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('tempat_kerja', 'Perusahan/lembaga tempat bekerja', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kota/Kabupaten', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Handphone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$ttl = $this->input->post('ttl');
			$gender = $this->input->post('gender');
			$pekerjaan = $this->input->post('pekerjaan');
			$tempat_kerja = $this->input->post('tempat_kerja');
			$provinsi = $this->input->post('provinsi');
			$kabupaten = $this->input->post('kabupaten');
			$kecamatan = $this->input->post('kecamatan');
			$desa = $this->input->post('desa');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$where = array(
				'basis_id' => $id
			);
			$data = array(
				'basis_nama' => $nama,
				'slug' => "input database",
				'grup' => "input database",
				'tipe_grup' => "input database",
				'basis_ttl' => $ttl,
				'basis_gender' => $gender,
				'basis_pekerjaan' => $pekerjaan,
				'basis_tempat_kerja' => $tempat_kerja,
				'basis_provinsi' => $provinsi,
				'basis_kabupaten' => $kabupaten,
				'basis_kecamatan' => $kecamatan,
				'basis_desa' => $desa,
				'basis_phone' => $phone,
				'basis_email' => $email,
			);
			$this->m_data->update_data($where, $data, 'basis');
			redirect(base_url() . 'dashboard?alert=update');
		} else {
			redirect(base_url() . 'dashboard?alert=fail');
		}
	}
	public function basis_hapus($id)
	{
		$where = array(
			'basis_id' => $id
		);
		$this->m_data->delete_data($where, 'basis');
		redirect(base_url() . 'dashboard?alert=delete');
	}
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}
	public function ganti_password()
	{
		$this->load->view('dashboard/v_ganti_password');
	}
	public function ganti_password_aksi()
	{
		// form validasi
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
		// cek validasi
		if ($this->form_validation->run() != false) {
			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
			// cek kesesuaikan password lama
			if ($cek > 0) {
				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			} else {
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		} else {
			$this->load->view('dashboard/v_ganti_password');
		}
	}
	public function links()
	{
		$data['links'] = $this->m_data->get_data('links')->result();
		$data['linkstype'] = $this->m_data->get_data('linkstype')->result();
		$data['page'] = "Link";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_links', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function links_tambah()
	{
		$this->form_validation->set_rules('keperluan', 'Keperluan');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[links.links_nama]');
		$this->form_validation->set_rules('link', 'Link', 'required|is_unique[links.links]');
		if ($this->form_validation->run() != false) {
			$keperluan = $this->input->post('keperluan');
			$tipe = $this->input->post('tipe');
			$nama = $this->input->post('nama');
			$links = $this->input->post('link');
			$slug =  strtolower($nama);
			$slugFix = str_replace(" ", "-", $slug);
			$slugFix2 = str_replace("(", "", $slugFix);
			$slugFix3 = str_replace(")", "", $slugFix2);
			$data = array(
				'links_tipe' => $tipe,
				'links_nama' => $nama,
				'links' => $links,
				'links_slug' => $slugFix3,
				'tipe' => $keperluan,
			);
			$this->m_data->insert_data($data, 'links');
			redirect(base_url() . 'dashboard/links?alert=add');
		} else {
			// Ini tak terpakai
			redirect(base_url() . 'dashboard/links?alert=fail');
		}
	}
	public function links_update()
	{
		$this->form_validation->set_rules('keperluan', 'Keperluan');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$keperluan = $this->input->post('keperluan');
			$tipe = $this->input->post('tipe');
			$nama = $this->input->post('nama');
			$links = $this->input->post('link');
			$slug =  strtolower($nama);
			$slugFix = str_replace(" ", "-", $slug);
			$slugFix2 = str_replace("(", "", $slugFix);
			$slugFix3 = str_replace(")", "", $slugFix2);
			$where = array(
				'links_id' => $id
			);
			$data = array(
				'links_tipe' => $tipe,
				'links_nama' => $nama,
				'links' => $links,
				'links_slug' => $slugFix3,
				'tipe' => $keperluan,
			);
			$this->m_data->update_data($where, $data, 'links');
			redirect(base_url() . 'dashboard/links?alert=update');
		} else {
			$id = $this->input->post('id');
			$where = array(
				'links_id' => $id
			);
			$data['links'] = $this->m_data->edit_data($where, 'links')->result();
			redirect(base_url() . 'dashboard/links?alert=fail');
		}
	}
	public function links_hapus($id)
	{
		$where = array(
			'links_id' => $id
		);
		$this->m_data->delete_data($where, 'links');
		redirect(base_url() . 'dashboard/links?alert=delete');
	}
	public function pekerjaan()
	{
		$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		$data['page'] = "Pekerjaan";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_pekerjaan', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function pekerjaan_tambah()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		if ($this->form_validation->run() != false) {
			$pekerjaan = $this->input->post('pekerjaan');
			$data = array(
				'pekerjaan' => $pekerjaan,
			);
			$this->m_data->insert_data($data, 'pekerjaan');
			redirect(base_url() . 'dashboard/pekerjaan?alert=add');
		} else {
			// Ini tak terpakai
			redirect(base_url() . 'dashboard/pekerjaan?alert=fail');
		}
	}
	public function pekerjaan_update()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$pekerjaan = $this->input->post('pekerjaan');
			$where = array(
				'pekerjaan_id' => $id
			);
			$data = array(
				'pekerjaan' => $pekerjaan,
			);
			$this->m_data->update_data($where, $data, 'pekerjaan');
			redirect(base_url() . 'dashboard/pekerjaan?alert=update');
		} else {
			$id = $this->input->post('id');
			$where = array(
				'pekerjaan_id' => $id
			);
			$data['pekerjaan'] = $this->m_data->edit_data($where, 'pekerjaan')->result();
			redirect(base_url() . 'dashboard/pekerjaan?alert=fail');
		}
	}
	public function pekerjaan_hapus($id)
	{
		$where = array(
			'pekerjaan_id' => $id
		);
		$this->m_data->delete_data($where, 'pekerjaan');
		redirect(base_url() . 'dashboard/pekerjaan?alert=delete');
	}
	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');
		$where = array(
			'pengguna_id' => $id_pengguna
		);
		$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();
		$data['page'] = "Profil";
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_profil', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->session->userdata('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$where = array(
				'pengguna_id' => $id
			);
			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email
			);
			$this->m_data->update_data($where, $data, 'pengguna');
			redirect(base_url() . 'dashboard/profil/?alert=sukses');
		} else {
			// id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');
			$where = array(
				'pengguna_id' => $id_pengguna
			);
			$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil', $data);
			$this->load->view('dashboard/v_footer');
		}
	}
}
