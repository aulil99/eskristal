<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getDataPengiriman($where = null)
    {
        $table = 'tbl_pengiriman';
        $select = "a.id_pengiriman as id_pengiriman, b.nama as nama, b.phone as phone, b.alamat as alamat, b.fasilitas as fasilitas, a.date as date, a.ongkir as ongkir, a.kurir as kurir, a.no_kendaraan as no_kendaraan, a.penerima as penerima, a.keterangan as keterangan, a.status as status";
        $joinTable = "tbl_pengiriman a LEFT JOIN tbl_pelanggan b ON(a.id_pelanggan = b.id_pelanggan)";

        $this->db->select($select);
        $this->db->from($joinTable);
        $this->db->where($where);

        return $this->db->get();
    }

    function getDataStokHarian($tanggal, $where = null)
    {
        $table = 'tbl_barang b
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND tgl_penjualan = \'' . $tanggal . '\')) AS c ON(b.kode_barang = c.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND tgl_pembelian = \'' . $tanggal . '\')) AS d ON(b.kode_barang = d.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND tgl_penjualan > \'' . $tanggal . '\')) AS e ON(b.kode_barang = e.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND tgl_pembelian > \'' . $tanggal . '\')) AS f ON(b.kode_barang = f.id_barang) ';

        $select = 'kode_barang, nama_barang, brand, stok, SUM(c.qty) AS qty_penjualan, SUM(d.qty) AS qty_pembelian, SUM(e.qty) AS qty_penjualan_new, SUM(f.qty) AS qty_pembelian_new';

        $group = ['kode_barang', 'nama_barang', 'brand', 'stok'];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group);

        return $this->db->get();
    }

    function getDataStokBulanan($bulan, $tahun, $where = null)
    {

        $tanggal1 = $tahun . '-' . $bulan . '-01';
        $tanggal2 = $tahun . '-' . $bulan . '-31';
        $table = 'tbl_barang b
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND tgl_penjualan >= \'' . $tanggal1 . '\' AND tgl_penjualan <= \'' . $tanggal2 . '\')) AS c ON(b.kode_barang = c.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND tgl_pembelian >= \'' . $tanggal1 . '\' AND tgl_pembelian <= \'' . $tanggal2 . '\')) AS d ON(b.kode_barang = d.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND tgl_penjualan > \'' . $tanggal2 . '\')) AS e ON(b.kode_barang = e.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND tgl_pembelian > \'' . $tanggal2 . '\')) AS f ON(b.kode_barang = f.id_barang) ';

        $select = 'kode_barang, nama_barang, brand, stok, SUM(c.qty) AS qty_penjualan, SUM(d.qty) AS qty_pembelian, SUM(e.qty) AS qty_penjualan_new, SUM(f.qty) AS qty_pembelian_new';

        $group = ['kode_barang', 'nama_barang', 'brand', 'stok'];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group);

        return $this->db->get();
    }

    function getDataStokTahunan($tahun, $where = null)
    {
        $table = 'tbl_barang b
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND YEAR(tgl_penjualan) = \'' . $tahun . '\')) AS c ON(b.kode_barang = c.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND YEAR(tgl_pembelian) = \'' . $tahun . '\')) AS d ON(b.kode_barang = d.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_penjualan pn
                    LEFT JOIN tbl_detail_penjualan dpn ON(pn.id_penjualan = dpn.id_penjualan AND YEAR(tgl_penjualan) > \'' . $tahun . '\')) AS e ON(b.kode_barang = e.id_barang)
                    LEFT JOIN
                    (SELECT qty, id_barang FROM tbl_pembelian pm
                    LEFT JOIN tbl_detail_pembelian dpm ON(pm.id_pembelian = dpm.id_pembelian AND YEAR(tgl_pembelian) > \'' . $tahun . '\')) AS f ON(b.kode_barang = f.id_barang) ';

        $select = 'kode_barang, nama_barang, brand, stok, SUM(c.qty) AS qty_penjualan, SUM(d.qty) AS qty_pembelian, SUM(e.qty) AS qty_penjualan_new, SUM(f.qty) AS qty_pembelian_new';

        $group = ['kode_barang', 'nama_barang', 'brand', 'stok'];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->group_by($group);

        return $this->db->get();
    }

    function getDataPembelianHarian($tanggal)
    {
        $select = 'p.id_pembelian AS id_pembelian, nama_barang, brand, dp.harga AS harga, qty, nama_supplier, (SELECT COUNT(*) FROM tbl_detail_pembelian WHERE id_pembelian = p.id_pembelian) AS row';

        $table = 'tbl_pembelian p
                    JOIN tbl_detail_pembelian dp ON(p.id_pembelian = dp.id_pembelian)
                    LEFT JOIN tbl_barang b ON(dp.id_barang = b.kode_barang)
                    LEFT JOIN tbl_supplier s ON(p.id_supplier = s.id_supplier)';

        $where = ['p.tgl_pembelian' => $tanggal];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    function getDataPembelianBulanan($bulan, $tahun)
    {
        $tgl1 = $tahun . '-' . $bulan . '-01';
        $tgl2 = $tahun . '-' . $bulan . '-31';

        $select = 'p.id_pembelian AS id_pembelian, nama_barang, brand, dp.harga AS harga, qty, nama_supplier, (SELECT COUNT(*) FROM tbl_detail_pembelian WHERE id_pembelian = p.id_pembelian) AS row_pembelian, (SELECT COUNT(*) FROM tbl_pembelian JOIN tbl_detail_pembelian dp ON(tbl_pembelian.id_pembelian = dp.id_pembelian) WHERE tgl_pembelian = p.tgl_pembelian) AS row_tanggal, tgl_pembelian';

        $table = 'tbl_pembelian p
                    JOIN tbl_detail_pembelian dp ON(p.id_pembelian = dp.id_pembelian)
                    LEFT JOIN tbl_barang b ON(dp.id_barang = b.kode_barang)
                    LEFT JOIN tbl_supplier s ON(p.id_supplier = s.id_supplier)';

        $where = ['p.tgl_pembelian >=' => $tgl1, 'p.tgl_pembelian <=' => $tgl2];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('tgl_pembelian', 'ASC');

        return $this->db->get();
    }

    function getDataPenjualanHarian($tanggal, $uuid)
    {
        $select = 'p.id_penjualan AS id_penjualan, nama_barang, brand, dp.harga AS harga, qty, nama_pembeli, c.jenis AS jenis, (SELECT COUNT(*) FROM tbl_detail_penjualan WHERE id_penjualan = p.id_penjualan) AS row';

        $table = 'tbl_penjualan p
                    JOIN tbl_detail_penjualan dp ON(p.id_penjualan = dp.id_penjualan)
                    LEFT JOIN tbl_barang b ON(dp.id_barang = b.kode_barang)
                    LEFT JOIN tbl_pelanggan c ON(p.id_pelanggan = c.id_pelanggan)';

        $where = ['p.tgl_penjualan' => $tanggal, 'p.id_user' => $uuid];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    function getDataPenjualanBulanan($bulan, $tahun, $uuid)
    {
        $tgl1 = $tahun . '-' . $bulan . '-01';
        $tgl2 = $tahun . '-' . $bulan . '-31';

        $select = 'p.id_penjualan AS id_penjualan, nama_barang, brand, dp.harga AS harga, qty, nama_pembeli, c.jenis AS jenis, (SELECT COUNT(*) FROM tbl_detail_penjualan WHERE id_penjualan = p.id_penjualan) AS row_penjualan, (SELECT COUNT(*) FROM tbl_penjualan JOIN tbl_detail_penjualan dp ON(tbl_penjualan.id_penjualan = dp.id_penjualan) WHERE tgl_penjualan = p.tgl_penjualan) AS row_tanggal, tgl_penjualan';

        $table = 'tbl_penjualan p
                    JOIN tbl_detail_penjualan dp ON(p.id_penjualan = dp.id_penjualan)
                    LEFT JOIN tbl_barang b ON(dp.id_barang = b.kode_barang)
                    LEFT JOIN tbl_pelanggan c ON(p.id_pelanggan = c.id_pelanggan)';

        $where = ['p.tgl_penjualan >=' => $tgl1, 'p.tgl_penjualan <=' => $tgl2, 'p.id_user' => $uuid];

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('tgl_penjualan', 'ASC');

        return $this->db->get();
    }
}
