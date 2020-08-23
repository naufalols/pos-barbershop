<?php 

/**
 * 
 */
class Pengguna_model extends extends CI_Model
{
	
	function __construct(argument)
	{
		# code...
	}

	public function getAllRM()
	{
		$this->datatables->select('nomor_rm,nama,alamat,pekerjaan,tanggal_buat');
		$this->datatables->from('rekam_medis');
		$this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
		return $this->datatables->generate();
	}
}