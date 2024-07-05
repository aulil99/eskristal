<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-reply"></i> Data Hutang</h4>
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
            <label for="barang-penjualan" class="col-form-label">ID Penjualan</label>
            <div class="col-sm-6">
                <select class="custom-select custom-select-sm" id="id_penjualan" name="id_penjualan">
                    <option value="<?= isset($idP) ? $idP : '' ?>" disabled selected><?= isset($idP) ? $idP : 'Pilih ID Penjualan' ?></option>
                    <?php foreach ($penjualan->result() as $d) : ?>
                        <option value="<?= $d->id_penjualan; ?>">
                            <?= $d->id_penjualan; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-sm" name="cari" value="Search">
            Cari Data
        </button>
        <?= form_close(); ?>
    </div>
    <?php if (isset($idP)) : ?>
        <div class="col-md-2 col-sm-12">
            <a href="<?= site_url('edit_hutang/' . $idP); ?>" class="btn btn-success btn-block btn-sm" target="_blank">
                <i class="fa fa-pencil"></i> Edit Lunas
            </a>
        </div>
    <?php endif; ?>
</div>
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Penjualan</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Brand</th>
                <th scope="col" class="text-center">Qty</th>
                <th scope="col" class="text-center">Harga</th>
                <!-- <th scope="col" class="text-center">Biaya Kirim</th> -->
                <th scope="col" class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $row = 1;
            if ($data->num_rows() > 0) {
                $total = 0;
                $hargaOngkir = 0;

                foreach ($data->result() as $dt) {
                    echo '<tr>';
                    if ($row == 1) :
                        echo '<td rowspan="' . $dt->row . '">' . $i++ . '</td>';
                        echo '<td rowspan="' . $dt->row . '">' . $dt->id_penjualan . '</td>';
                        echo '<td rowspan="' . $dt->row . '">' . $dt->nama_pembeli . '</td>';
                    endif;
                    echo '<td>' . $dt->nama_barang . '</td>';
                    echo '<td>' . $dt->brand . '</td>';
                    echo '<td>' . $dt->qty . '</td>';
                    echo '<td><span class="float-left">Rp.</span><span class="float-right">' . number_format($dt->harga, 0, ',', '.') . '</span></td>';
                    // foreach ($ongkir->result() as $okr) {
                    //     if ($dt->jenis == $okr->jenis) :
                    //         echo '<td><span class="float-left">Rp.</span><span class="float-right">' . number_format($okr->harga, 0, ',', '.') . '</td>';
                    //         $hargaOngkir = $okr->harga;
                    //     endif;
                    // }
                    echo '<td><span class="float-left">Rp.</span><span class="float-right">' . number_format(($dt->harga * $dt->qty), 0, ',', '.') . '</span></td>';
                    echo '</tr>';
                    if ($row < $dt->row) {
                        $row++;
                    } else {
                        $row = 1;
                    }

                    $total += ($dt->harga * $dt->qty);
                }

                echo '<tr>';
                echo '<td colspan="7" class="text-center"><b>Total Hutang</b></td>';
                echo '<td><b><span class="float-left">Rp.</span><span class="float-right">' . number_format($total, 0, ',', '.') . '</span></b></td>';
                echo '</tr>';
            } else {
                echo '<tr>';
                echo '<td colspan="8" class="text-center">Data tidak ditemukan</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>