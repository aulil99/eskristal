<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-file-text"></i> Laporan Harian Pengiriman Barang</h4>
    </div>
</div>
<hr class="mt-0" />
<?php
if ($this->session->flashdata('alert')) {
    echo '<div class="alert alert-danger" role="alert">
    ' . $this->session->flashdata('alert') . '
  </div>';
}
?>
<div class="row">
    <div class="col-md-10 col-sm-12">
        <?= form_open('', ['class' => "form-inline"]); ?>
        <div class="form-group mx-sm-3 mb-2">
            <label for="date-picker" class="sr-only">Tanggal</label>
            <input type="text" name="tanggal" class="form-control form-control-sm" id="date-picker" placeholder="dd/mm/yyyy" value="<?= $tanggal; ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-sm" name="cari" value="Search">
            Cari Data
        </button>
        <?= form_close(); ?>
    </div>
    <div class="col-md-2 col-sm-12">
        <a href="<?= site_url('pengiriman_harian/' . date('Y-m-d', strtotime(str_replace('/', '-', $tanggal)))); ?>" class="btn btn-success btn-block btn-sm" target="_blank">
            <i class="fa fa-print"></i> Cetak Laporan
        </a>
    </div>

</div>
<table class="table table-sm table-bordered mt-3">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID Pengiriman</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">No HP</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kurir</th>
            <th scope="col">No Kendaraan</th>
            <!-- <th scope="col">Biaya Kirim</th> -->
            <th scope="col">Penerima</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $row = 1;
        if ($data->num_rows() > 0) {
            $total = 0;

            foreach ($data->result() as $dt) {
                echo '<tr>';
                echo '<td rowspan="' . $dt->row . '">' . $dt->id_pengiriman . '</td>';
                echo '<td rowspan="' . $dt->row . '">' . $dt->date . '</td>';
                echo '<td>' . $dt->nama . '</td>';
                echo '<td>' . $dt->phone . '</td>';
                echo '<td>' . $dt->alamat . '</td>';
                echo '<td>' . $dt->kurir . '</td>';
                echo '<td>' . $dt->no_kendaraan . '</td>';
                echo '<td>' . $dt->penerima . '</td>';
                echo '<td>' . $dt->keterangan . '</td>';
                echo '<td>' . $dt->status . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="11" class="text-center">Data tidak ditemukan</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>