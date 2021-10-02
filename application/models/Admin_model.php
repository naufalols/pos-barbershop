<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public $date;
    public $curr_date;
    public function __construct()
    {
        parent::__construct();
        $date = $this->date = new DateTime("now");
        $this->curr_date = $date->format('Y-m-d ');
    }

    public function capsterDetail($id)
    {
        $select =   array(
            'a.*',
            'count(b.id) as todaysTotal'
        );
        $select2 =   array(
            '*',
            '0 as todaysTotal'
        );

        $query = $this->db
                ->select($select)
                ->from('tk_cukur a')
                ->join('penjualan b', 'b.id_cukur = a.id')
                ->join('menu c', 'b.id_menu = c.id', 'right outer')
                ->group_by('a.nama', 'asc')
                ->where('b.tgl_nota_cukur >=', "$this->curr_date 00:00:00")
                ->where('b.tgl_nota_cukur <=', "$this->curr_date 23:59:59")
                ->where('a.id =', $id)
                ->where('b.id_menu =', 1)
                ->get();
        if ($query->num_rows() > 0) {
            return array('error' => 1, 'result' => $query->row_array() );
        } else {
            $query2 = $this->db
                ->select($select2)
                ->from('tk_cukur a')
                ->where('id =', $id)
                ->get();
            if ($query2->num_rows() > 0) {
                return array('error' => 0, 'result' => $query2->row_array() );
            } else {
                return array('error' => 1, 'result' => 'data tidak ditemukan' );
            }
        }
    }
}
