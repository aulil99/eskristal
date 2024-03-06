<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengiriman extends CI_Model
{
    var $table           = 'tbl_pengiriman';
    var $order = array('id_pengiriman' => 'asc'); // default order

    var $select = array("a.id_pengiriman as id_pengiriman", "b.nama as nama", "b.phone as phone", "b.alamat as alamat", "b.fasilitas as fasilitas", "a.date as date", "a.ongkir as ongkir", "a.kurir as kurir", "a.no_kendaraan as no_kendaraan", "a.penerima as penerima", "a.keterangan as keterangan", "a.status as status");
    var $joinTable = "tbl_pengiriman a LEFT JOIN tbl_pelanggan b ON(a.id_pelanggan = b.id_pelanggan)";
    var $column_order    =  array(null, 'a.id_pengiriman', 'b.nama', 'b.phone', 'b.alamat', 'b.fasilitas', 'a.date', 'a.ongkir', "a.kurir", "a.no_kendaraan", "a.penerima", "a.keterangan", "a.status", null); //set column field database untuk datatable order
    var $column_search   =  array('a.id_pengiriman', 'b.nama', 'b.phone', 'b.alamat', 'b.fasilitas', 'a.date', 'a.ongkir', "a.kurir", "a.no_kendaraan", "a.penerima", "a.keterangan", "a.status");
    // $sql = "select a.id_pengiriman as id_pengiriman, b.nama as nama, b.phone as phone, b.alamat as alamat, b.fasilitas as fasilitas, a.date as date, a.ongkir as ongkir, a.kurir as kurir, a.no_kendaraan as no_kendaraan, a.penerima as penerima, a.keterangan as keterangan, a.status as status from tbl_pengiriman a left join tbl_pelanggan b on a.id_pelanggan = b.id_pelanggan";

    function __construct()
    {
        parent::__construct();
    }

    function getAllData($table = null)
    {
        return $this->db->get($table);
    }

    function getData($table = null, $where = null)
    {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    function save($table = null, $data = null)
    {
        return $this->db->insert($table, $data);
    }

    function update($table = null, $data = null, $where = null)
    {
        return $this->db->update($table, $data, $where);
    }

    function delete($table = null, $where = null)
    {
        $this->db->where($where);
        $this->db->delete($table);

        return $this->db->affected_rows();
    }

    private function _get_datatables_query()
    {

        $this->db->select($this->select);
        $this->db->from($this->joinTable);
        $this->db->group_by(array('a.id_pengiriman', 'b.nama', 'b.phone', 'b.alamat', 'b.fasilitas', 'a.date', 'a.ongkir', "a.kurir", "a.no_kendaraan", "a.penerima", "a.keterangan", "a.status"));

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // Jika datatable mengirim POST untuk search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket.

                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end(); //close bracket
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) // Proses order
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {

            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();

            return $query->result();
        }
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();

        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }
}
