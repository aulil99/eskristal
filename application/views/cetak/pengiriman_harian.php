<?php
defined('BASEPATH') or exit('No direct script access allowed');

function tanggal_indo($tgl)
{
    $bulan  = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $exp    = explode('-', date('d-m-Y', strtotime($tgl)));

    return $exp[0] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[2];
}
?>

<img src="<?= base_url('assets/img/logo.jpg'); ?>" class="logo" />
<h6 class="display-5 text-center mt-2 mb-0">Laporan Harian Pengiriman Barang</h6>
<p class="text-center display-6 mt-0"><?= tanggal_indo($tanggal); ?></p>
<hr class="mt-0" />
<table class="table table-sm table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Pengiriman</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">No HP</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kurir</th>
            <th scope="col">No Kendaraan</th>
            <th scope="col">Penerima</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>