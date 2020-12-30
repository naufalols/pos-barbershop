<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pengguna_model');
		error_reporting(E_ALL & ~E_NOTICE);
	}

	public function index()
	{
		if ($this->session->has_userdata('username')) {
			$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
			$data['cukur'] = $this->Pengguna_model->getAll('tk_cukur');
			$data['menu'] = $this->Pengguna_model->getAll('menu');
			$data['keranjang'] = $this->Pengguna_model->getKeranjang();

			$data['keranjangcukur'] = $this->Pengguna_model->keranjangcukur();
			
			$data['title'] = 'Menu';

			$this->load->view('template/auth_header', $data);
			$this->load->view('pengguna/index', $data);
			$this->load->view('template/auth_modal', $data);
			$this->load->view('template/auth_footer');
		} else {
			redirect('auth');
		}
	}

	public function penjualan()
	{
		if ($this->session->has_userdata('username')) {
			$data['pengguna'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d ');
			$data['waktu'] = $curr_date;
			$curr_month = $date->format('m');

			$select =   array(
				'tk_cukur.nama',
				'count(penjualan.id) as Total'
			);
			$data['total_menu'] = $this->Pengguna_model->total_menu();

			$data['penjualan'] = $this->Pengguna_model->penjualan();

			$data['title'] = 'Penjualan';
			$this->load->view('template/auth_header', $data);
			$this->load->view('pengguna/penjualan', $data);
			$this->load->view('template/auth_modal', $data);
			$this->load->view('template/auth_footer');
		} else {
			redirect('auth');
		}
	}

	public function tambahCukurKeranjang($cukur = NULL)
	{
		// $this->load->helper('string');
		// $rand = random_string('alnum',5);
		$rand = mt_rand(0001, 9999);
		$data = array('id_cukur' => $cukur);
		$q = $this->db->get('keranjang_nota');
		$nota = $this->db->get('keranjang_nota');
		$this->load->helper('string');

		if ($this->session->has_userdata('username')) {
			if ($nota->num_rows() > 0) {
				$no = $this->db->get('keranjang_nota')->row_array();
				$data = array('id_cukur' => $cukur, 'nota' => $no['nota']);
				if ($q->num_rows() > 0) {
					// $this->db->where('id_cukur',$cukur);
					$this->db->update('keranjang_nota', $data);
					$this->session->set_flashdata('pesan_registrasi', '<div class="ui success message">
																							<i class="close icon"></i>
																							<div class="header">
																								Data berhasil diganti!
																							</div>
																						</div>');
					redirect('pengguna');
				} else {
					// $this->db->set('id_cukur', $cukur);
					$this->db->insert('keranjang_nota', $data);
					$this->session->set_flashdata('pesan_registrasi', '<div class="ui success message">
																							<i class="close icon"></i>
																							<div class="header">
																								Data berhasil dimasukkan!
																							</div>
																						</div>');
					redirect('pengguna');
				}
			} else {
				$nota_rand = array('nota' => $rand);
				// $this->db->insert('keranjang_nota', $nota_rand);
				$data = array('id_cukur' => $cukur, 'nota' => $rand);
				if ($q->num_rows() > 0) {
					// $this->db->where('id_cukur',$cukur);
					$this->db->update('keranjang_nota', $data);
					$this->session->set_flashdata('pesan_registrasi', '<div class="ui success message">
																							<i class="close icon"></i>
																							<div class="header">
																								Data berhasil diganti!
																							</div>
																						</div>');
					redirect('pengguna');
				} else {
					// $this->db->set('id_cukur', $cukur);
					$this->db->insert('keranjang_nota', $data);
					$this->session->set_flashdata('pesan_registrasi', '<div class="ui success message">
																							<i class="close icon"></i>
																							<div class="header">
																								Data berhasil dimasukkan!
																							</div>
																						</div>');
					redirect('pengguna');
				}
			}
		} else {
			redirect('auth');
		}
	}

	public function tambahMenuKeranjang($menu = NULL)
	{
		$rand = mt_rand(0001, 9999);
		$data = array('id_menu' => $menu);
		$this->db->where($data);
		$q = $this->db->get('keranjang');
		$nota = $this->db->get('keranjang_nota');
		if ($this->session->has_userdata('username')) {
			if ($nota->num_rows() > 0) {
				$no = $this->db->get('keranjang_nota')->row_array();
				$data = array('id_menu' => $menu, 'id_nota' => $no['nota']);
				if ($q->num_rows() > 0) {
					$this->session->set_flashdata('pesan_registrasi', '<div class="alert alert-warning" role="alert">Menu telah ada!</div>');
					redirect('pengguna');
				} else {

					$this->db->insert('keranjang', $data);
					redirect('pengguna');
				}
			} else {
				$nota_rand = array('nota' => $rand);
				$this->db->insert('keranjang_nota', $nota_rand);
				$data = array('id_menu' => $menu, 'id_nota' => $rand);
				if ($q->num_rows() > 0) {
					$this->session->set_flashdata('pesan_registrasi', '<div class="alert alert-warning" role="alert">Menu telah ada!</div>');
					redirect('pengguna');
				} else {

					$this->db->insert('keranjang', $data);
					redirect('pengguna');
				}
			}
		} else {
			redirect('auth');
		}
	}

	public function hapusMenuKeranjang($idkeranjang = NULL)
	{
	
		if ($this->session->has_userdata('username')) {
			$this->db->where('id', $idkeranjang);
			$this->db->delete('keranjang');
			$this->session->set_flashdata('pesan_registrasi', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('pengguna');
		} else {
			redirect('auth');
		}
	}

	public function proseskeranjang($nota = NULL)
	{

		$proses = $this->db->select('id_nota, id_menu')
			->from('keranjang')
			->where(['id_nota =>' . $nota])
			->get()
			->result_array();
		// print_r($proses); untuk melihat hasil array
		$proses2 = $this->db->get_where('keranjang_nota', ['nota =>' . $nota])->row_array();

		$r = array();
		$s = array('id_cukur' => $proses2['id_cukur']);
		foreach ($proses as $key) {

			$r[] = array_merge($key, $s);
		}
		// print_r($r);
		foreach ($r as $value) {
			$this->db->insert('penjualan', $value);
		}
		$this->db->where('id_nota', $nota);
		$this->db->delete('keranjang');
		$this->db->where('nota', $nota);
		$this->db->delete('keranjang_nota');
		redirect('pengguna/print/' . $nota);
	}



	public function print($nota)
	{
		echo $nota;

		$totalHarga = NULL;
		$siap_cetak = $this->Pengguna_model->siap_cetak($nota);
		$siap_cetak = $siap_cetak['result'];
		$siap_cetak_row = $siap_cetak['row'];
		$barberman = $siap_cetak_row['nama'];
		$this->load->library("EscPos");
		$this->load->library("Item");
		// foreach ($siap_cetak as $key) {
		// 	$items[] = array($key['nama'], $key['nm_menu'], $key['harga']);
		// 	$totalHarga += $key['harga'];
		// }
		$subtotal = new item('Subtotal', $totalHarga);
		$total = new item('Total', $totalHarga, true);
		/* Date is kept the same for testing */
		$date = date('Y-m-d H:i:s');
		try {
			// Enter the device file for your USB printer here
			// $connector = new Mike42\Escpos\PrintConnectors\FilePrintConnector("/dev/usb/usb001");
			$connector = new Escpos\PrintConnectors\WindowsPrintConnector("boistest");
			/* Print a "Hello world" receipt" */
			$printer = new Escpos\Printer($connector);
			foreach ($siap_cetak as $key) {
				$items[] = new newitem($key['nm_menu'], number_format($key['harga']));
				$totalHarga += $key['harga'];
			}
			/* Information for the receipt */

			$subtotal = new newitem('Subtotal', number_format($totalHarga));
			$diskon = new newitem('Diskon', '0');
			$total = new newitem('Total', number_format($totalHarga), true);
			/* Date is kept the same for testing */
			// $date = date('l jS \of F Y h:i:s A');
			$date = "Monday 6th of April 2015 02:56:25 PM";

			/* Start the printer */
			// $logo = EscposImage::load("resources/escpos-php.png", false);
			// $printer = new Printer($connector);

			/* Print top logo */
			// $printer->setJustification(Printer::JUSTIFY_CENTER);
			// $printer->graphics($logo);

			/* Name of shop */
			$printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
			$printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
			$printer->text("BOIS BARBER\n");
			$printer->selectPrintMode();
			$printer->text("Jl. Kaliurang No. 42\n");
			$printer->text("Nota: $nota\n");
			$printer->feed();

			/* Title of receipt */
			$printer->setEmphasis(true);
			$printer->text("Kapster $barberman\n");
			$printer->setEmphasis(false);

			/* Items */
			$printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
			$printer->setEmphasis(true);
			$printer->text(new newitem('', 'Rp'));
			$printer->setEmphasis(false);
			foreach ($items as $item) {
				$printer->text($item);
			}
			$printer->setEmphasis(true);
			$printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
			$printer->text("--------------------------------\n");
			$printer->text($diskon);
			$printer->text($subtotal);
			$printer->setEmphasis(false);
			$printer->feed();

			/* Tax and total */
			$printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
			$printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT);
			$printer->text($total);
			$printer->selectPrintMode();

			/* Footer */
			$printer->feed(2);
			$printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
			$printer->text("Terimakasih, Have a Nice Hair :)\n");


			/* Cut the receipt and open the cash drawer */
			$printer->cut();
			$printer->pulse();

			$printer->close();


			/* Close printer */
			$printer->close();
		} catch (Exception $e) {
			echo "Couldn't print to this Escpos\Printer: " . $e->getMessage() . "\n";
		}
		$this->session->set_flashdata('pesan_registrasi', '<div class="alert alert-success" role="alert">Transaksi Berhasil</div>');
		redirect('pengguna');
	}
}
