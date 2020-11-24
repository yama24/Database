<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('url', 'html'));
		$this->load->model('m_data');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('404');
	}
	public function input()
	{
		$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		$data['provinces'] = $this->m_data->get_provinsi();
		$this->load->view('frontend/v_homepage', $data);
	}
	public function register($slug)
	{
		$getLinks = $this->m_data->getLinksBySlug($slug);
		if ($getLinks == NULL) {
			redirect(base_url() . '404');
		} else {
			$data['links'] = $getLinks;
			$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
			$data['provinces'] = $this->m_data->get_provinsi();
			$this->load->view('frontend/v_register', $data);	
		}
	}
	function add_ajax_kab($id_prov)
	{
		$query = $this->db->get_where('regencies', array('province_id' => $id_prov));
		$data = "<option value=''>- Select Kabupaten -</option>";
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
		$data = "<option value=''> - Pilih Desa - </option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	public function terimakasih()
	{
		$data['links'] = $this->db->get_where('links', ['tipe' => 0])->result();
		if ($this->session->userdata('status') != "telah_login_email") {
			redirect(base_url() . 'input?alert=belum_isi');
		}
		$this->load->view('frontend/v_link_input', $data);
	}public function registered($slug)
	{
		$data['links'] = $this->m_data->getLinksBySlug($slug);
		if ($this->session->userdata('slug') != $slug) {
			redirect(base_url() . 'welcome/register/' . $slug . '?alert=belum_isi');
		}
		$this->load->view('frontend/v_link_register', $data);
	}
	public function form_submit_input()
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
			// $where = array(
			// 	'pengguna_username' => $email,
			// 	// 'pengguna_password' => "email",
			// 	// 'pengguna_status' => 2
			// );
			$this->load->model('m_data');
			// $data = $this->m_data->cek_login('pengguna', $where)->row();

			$data_session = array(
				// 'id' => $data->pengguna_id,
				// 'username' => $data->pengguna_username,
				'name' => $nama,
				'email' => $email,
				'phone' => $email,
				// 'photo' => $data->pengguna_foto,
				// 'level' => $data->pengguna_level,
				'status' =>
				'telah_login_email'
			);
			$this->session->set_userdata($data_session);
			// $data['user'] = $nama;
			// $config['charset'] = 'utf-8';
			// $config['smtp_crypto'] = $this->config->item('smtp_crypto');
			// $config['protocol'] = 'smtp';
			// $config['mailtype'] = 'html';
			// $config['smtp_host'] = $this->config->item('host_mail');
			// $config['smtp_port'] = $this->config->item('port_mail');
			// $config['smtp_timeout'] = '5';
			// $config['smtp_user'] = $this->config->item('mail_account');
			// $config['smtp_pass'] = $this->config->item('pass_mail');
			// $config['crlf'] = "\r\n";
			// $config['newline'] = "\r\n";
			// $config['wordwrap'] = TRUE;

			// $mesg = $this->load->view('email/notif.php', $data, TRUE);
			// $this->load->library('email', $config);

			// $this->email->from($this->config->item('mail_account'), $this->config->item('app_name'));
			// $this->email->to($email, $this->config->item('mail_account'));
			// $this->email->subject('Notifikasi Input Data');
			// $this->email->message($mesg);
			// $this->email->send();
			redirect(base_url() . 'welcome/terimakasih');
		} else {
			// Ini tak terpakai
			redirect(base_url() . '?alert=isiulang');
		}
	}
	public function form_submit_register()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('slug', 'Slug');
		$this->form_validation->set_rules('grup', 'Grup');
		$this->form_validation->set_rules('tipe_grup', 'Tipe Grup');
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
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$nama = $this->input->post('nama');
			$slug = $this->input->post('slug');
			$grup = $this->input->post('grup');
			$tipe_grup = $this->input->post('tipe_grup');
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
				'slug' => $slug,
				'grup' => $grup,
				'tipe_grup' => $tipe_grup,
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
			// $where = array(
			// 	'pengguna_username' => $email,
			// 	// 'pengguna_password' => "email",
			// 	// 'pengguna_status' => 2
			// );
			$this->load->model('m_data');
			// $data = $this->m_data->cek_login('pengguna', $where)->row();

			$data_session = array(
				// 'id' => $data->pengguna_id,
				// 'username' => $data->pengguna_username,
				'name' => $nama,
				'email' => $email,
				'phone' => $email,
				'slug' => $slug,
				'grup' => $grup,
				'tipe_grup' => $tipe_grup,
				// 'photo' => $data->pengguna_foto,
				// 'level' => $data->pengguna_level,
				'status' => 'telah_login_email'
			);
			$this->session->set_userdata($data_session);
			// $data['user'] = $nama;
			// $config['charset'] = 'utf-8';
			// $config['smtp_crypto'] = $this->config->item('smtp_crypto');
			// $config['protocol'] = 'smtp';
			// $config['mailtype'] = 'html';
			// $config['smtp_host'] = $this->config->item('host_mail');
			// $config['smtp_port'] = $this->config->item('port_mail');
			// $config['smtp_timeout'] = '5';
			// $config['smtp_user'] = $this->config->item('mail_account');
			// $config['smtp_pass'] = $this->config->item('pass_mail');
			// $config['crlf'] = "\r\n";
			// $config['newline'] = "\r\n";
			// $config['wordwrap'] = TRUE;

			// $mesg = $this->load->view('email/notif.php', $data, TRUE);
			// $this->load->library('email', $config);

			// $this->email->from($this->config->item('mail_account'), $this->config->item('app_name'));
			// $this->email->to($email, $this->config->item('mail_account'));
			// $this->email->subject('Notifikasi Input Data');
			// $this->email->message($mesg);
			// $this->email->send();
			redirect(base_url() . 'welcome/registered/' . $slug);
		} else {
			// Ini tak terpakai
			$slug = $this->input->post('slug');
			redirect(base_url() . 'welcome/register/' . $slug . '?alert=isiulang');
		}
	}
	public function notfound()
	{
		$this->load->view('404');
	}
}
