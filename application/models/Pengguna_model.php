<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends  CI_Model
{
	var $date;
	var $curr_date;
	function __construct()
	{
		parent::__construct();
		$date = $this->date = new DateTime("now");
	 	$this->curr_date = $date->format('Y-m-d ');
		
	}

	

	public function getAll($data)
	{
		$query = $this->db->get($data);
		return $query->result_array();
	}

	public function getKeranjang()
	{
		$this->db->select('*');
		$this->db->select('keranjang.id as idcukur');
		$this->db->from('keranjang');
		$this->db->join('menu', 'menu.id = keranjang.id_menu');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function keranjangcukur()
	{
		$this->db->select('tk_cukur.nama AS koko, keranjang_nota.nota AS notas', FALSE);
		$this->db->from('keranjang_nota');
		$this->db->join('tk_cukur', 'tk_cukur.id = keranjang_nota.id_cukur');
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
        	return $query->row_array();
		} else {
			return false;
		}
	}

	public function total_menu()
	{
		

		$select =   array(
			'tk_cukur.nama',
			'count(penjualan.id) as Total'
		);
		$query = $this->db
				->select($select)
				->from('tk_cukur')
				->join('penjualan', 'penjualan.id_cukur = tk_cukur.id', 'left')
				->group_by('tk_cukur.nama', 'asc')
				->where('tgl_nota_cukur >=', "$this->curr_date 00:00:00")
				->where('tgl_nota_cukur <=', "$this->curr_date 23:59:59")
				->get();
		return $query->result_array();
	}

	public function penjualan()
	{
		$query = $this->db->select('*')
				->from('penjualan')
				->join('tk_cukur', 'penjualan.id_cukur = tk_cukur.id')
				->join('menu', 'penjualan.id_menu = menu.id')
				->order_by('penjualan.tgl_nota_cukur', 'desc')
				->where('tgl_nota_cukur >=', "$this->curr_date 00:00:00")
				->where('tgl_nota_cukur <=', "$this->curr_date 23:59:59")
				->get();
		return $query->result_array();

	}

	public function siap_cetak($data)
	{
		$query = $this->db->select('*')
						->from('penjualan')
						->join('tk_cukur', 'tk_cukur.id = penjualan.id_cukur', 'left')
						->join('menu', 'menu.id = penjualan.id_menu', 'left')
						->where('id_nota =', $data)
						->get();
		$result = $query->result_array();
		$row	= $query->row_array();
		return array(
			'result' => $result,
			'row' => $row,
		);
	}
}