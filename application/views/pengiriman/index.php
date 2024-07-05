<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-10 col-sm-12">
        <h4 class="mb-0"><i class="fa fa-truck"></i> Pengiriman</h4>
    </div>
    <div class="col-md-2 mb-3">
        <a href="<?= site_url('tambah_pengiriman'); ?>" class="btn btn-success btn-sm btn-block">Tambah Data</a>
    </div>

</div>
<hr class="mt-0" />
<?php
//tampilkan pesan success
if ($this->session->flashdata('success')) {
    echo '<div class="alert alert-success" role="alert">
    ' . $this->session->flashdata('success') . '
  </div>';
}

//tampilkan pesan error
if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger" role="alert">
    ' . $this->session->flashdata('error') . '
  </div>';
}
?>


<!-- <div class="col-sm-12 col-md-10">
    <h5 class="mb-3">Ongkos Pengiriman</h5>
</div>
<div class="col-5">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Jenis Pelanggan</th>
                <th scope="col">Harga Ongkir</th>
                <?php
                if ($this->session->userdata('level') == 'admin') :
                ?>
                    <th scope="col">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ongkir->result() as $o) : ?>
                <tr>
                    <td><?= $o->jenis; ?></td>
                    <td><?= $o->harga; ?></td>
                    <?php
                    if ($this->session->userdata('level') == 'admin') :
                    ?>
                        <td><a href="<?= site_url('edit_ongkir/') . $o->id; ?>" class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil"></i></a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<hr class="mt-0" /> -->

<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
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
</div>