<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Admin Barber Bois';
		$data['cukur'] = $this->db->get('tk_cukur')->result_array();
		$data['menu'] = $this->db->get('menu')->result_array();
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');
		$select =   array(
			'tk_cukur.nama',
			'count(penjualan.id) as Total',
			'menu.harga'
		);
		$data['total_menu'] = $this->db
			->select($select)
			->from('tk_cukur')
			->join('penjualan', 'penjualan.id_cukur = tk_cukur.id', 'left')
			->join('menu', 'menu.id = penjualan.id_menu', 'left')
			->group_by('tk_cukur.id')
			->where('DATE(tgl_nota_cukur)', $curr_date)
			->get()
			->result_array();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/auth_header', $data);
		$this->load->view('template/admin_main_header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('template/auth_footer');
	}

	public function tambahTukangCukur()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tk_cukur.nama]', ['is_unique' => 'Nama telah teregistrasi']);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|is_unique[tk_cukur.no_tlp]', ['is_unique' => 'Nomor telah teregistrasi']);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Admin Barbois';
			$this->session->set_flashdata('pesan_pemberitahuan', '<div class="alert alert-danger" role="alert">Tukang Cukur gagal ditambahkan!</div>');
			redirect('admin');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'no_tlp' => htmlspecialchars($this->input->post('telepon', true))
			];

			$this->db->insert('tk_cukur', $data);
			$this->session->set_flashdata('pesan_pemberitahuan', '<div class="alert alert-success" role="alert">Tukang cukur berhasil ditambahkan!</div>');
			redirect('admin');
		}
	}

	public function tambahMenuCukur()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Admin Barbois';
			$this->session->set_flashdata('pesan_pemberitahuan', '<div class="alert alert-danger" role="alert">Menu Cukur gagal ditambahkan!</div>');
			redirect('admin');
		} else {
			$data = [
				'nm_menu' => htmlspecialchars($this->input->post('nama', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'gambar' => 'gunting.jpg'
			];

			$this->db->insert('menu', $data);
			$this->session->set_flashdata('pesan_pemberitahuan', '<div class="alert alert-success" role="alert">Menu cukur berhasil ditambahkan!</div>');
			redirect('admin');
		}
	}

	public function penjualan()
	{
		if ($this->session->has_userdata('username')) {
			$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d ');
			$curr_month = $date->format('m');
			// $start = NULL;
			// $end   = NULL;
			$start = htmlspecialchars($this->input->post('start', true));
			$end   = htmlspecialchars($this->input->post('end', true));
			$select =   array(
				'tk_cukur.nama',
				'count(penjualan.id) as Total'
			);
			if ($start == NULL){
				$data['total_menu'] = $this->db
					->select($select)
					->from('tk_cukur')
					->join('penjualan', 'penjualan.id_cukur = tk_cukur.id', 'left')
					->group_by('tk_cukur.nama', 'asc')
					->where('MONTH(tgl_nota_cukur)', $curr_month)
					->get()
					->result_array();

				$data['penjualan'] = $this->db->select('*')
					->from('penjualan')
					->join('tk_cukur', 'penjualan.id_cukur = tk_cukur.id')
					->join('menu', 'penjualan.id_menu = menu.id')
					->order_by('penjualan.tgl_nota_cukur', 'desc')
					->where('MONTH(tgl_nota_cukur)', $curr_month)
					->get()
					->result_array();
			} else {
				$data['total_menu'] = $this->db
					->select($select)
					->from('tk_cukur')
					->join('penjualan', 'penjualan.id_cukur = tk_cukur.id', 'left')
					->group_by('tk_cukur.nama', 'asc')
					->where('tgl_nota_cukur >=', "$start 00:00:00")
					->where('tgl_nota_cukur <=', "$end 23:59:59")
					->get()
					->result_array();

				$data['penjualan'] = $this->db->select('*')
					->from('penjualan')
					->join('tk_cukur', 'penjualan.id_cukur = tk_cukur.id')
					->join('menu', 'penjualan.id_menu = menu.id')
					->group_by('tk_cukur.nama', 'asc')
					->where('tgl_nota_cukur >=', $start)
					->where('tgl_nota_cukur <=', $end)
					->get()
					->result_array();
			};
			
		
			$data['tukang'] = $this->db->get('tk_cukur')->result_array();
			$data['tanggal'] = $date->format('m');
			$data['title'] = 'Admin Penjualan';
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('template/auth_header', $data);
			$this->load->view('template/admin_main_header', $data);
			$this->load->view('admin/penjualan', $data);
			$this->load->view('template/auth_modal', $data);
			$this->load->view('template/auth_footer');
		} else {
			redirect('auth');
		}
	}

	public function setting()
	{
		$data['title'] = 'Admin Setting';
		$data['cukur'] = $this->db->get('tk_cukur')->result_array();

		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/auth_header', $data);
		$this->load->view('template/admin_main_header', $data);
		$this->load->view('admin/setting');
		$this->load->view('template/auth_footer');
	}

	public function cari()
	{
		
		$start = htmlspecialchars($this->input->post('start', true));
		$end   = htmlspecialchars($this->input->post('end', true));
		$data = $this->db->select('*')
				->from('penjualan')
				->join('tk_cukur', 'penjualan.id_cukur = tk_cukur.id')
				->join('menu', 'penjualan.id_menu = menu.id')
				->where('tgl_nota_cukur >=', "$start 00:00:00")
				->where('tgl_nota_cukur <=', "$end 23:59:59")
				->get()
				->result_array();
	
		// echo $start;
		// echo $end;
		foreach ($data as $mantap){
			echo $mantap['id_nota'];
			echo $mantap['nama'];
			echo $mantap['nm_menu'];
			echo $mantap['tgl_nota_cukur'];
		}
	}

	public function cetak()
	{
		$start = htmlspecialchars($this->input->post('start', true));
		$end   = htmlspecialchars($this->input->post('end', true));
		echo $start;
		echo $end;
	}
}
