<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-truck"></i> Tambah Data Pengiriman</h4>
    </div>
</div>
<hr class="mt-0" />
<?= form_open(); ?>
<div class="col-md-8">

    <div class="form-group row">
        <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
        <div class="col-sm-9">
            <input autofocus type="date" class="form-control form-control-sm <?= (form_error('date')) ? 'is-invalid' : ''; ?>" name="date" value="<?= (set_value('date')); ?>">
            <div class="invalid-feedback">
                <?= form_error('date', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="id_penjualan" class="col-sm-3 col-form-label">Nama Pesanan</label>
        <div class="col-sm-9">
            <select class="barang-select custom-select custom-select-sm pilih-barang" name="id_penjualan" id="id_penjualan">
                <option value="" disabled selected>Pilih Nama Pesanan yang Dituju</option>
                <?php foreach ($data->result() as $d) : ?>
                    <option value="<?= $d->id_penjualan; ?>">
                        <?= $d->nama_pembeli . ' ( ' . $d->tgl_penjualan . ' )'; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="kurir" class="col-sm-3 col-form-label">Kurir</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('kurir')) ? 'is-invalid' : ''; ?>" id="kurir" name="kurir" placeholder="Kurir"><?= set_value('kurir'); ?>
            <div class="invalid-feedback">
                <?= form_error('kurir', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="no_kendaraan" class="col-sm-3 col-form-label">No Kendaraan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('no_kendaraan')) ? 'is-invalid' : ''; ?>" id="no_kendaraan" name="no_kendaraan" placeholder="No Kendaraan"><?= set_value('no_kendaraan'); ?>
            <div class="invalid-feedback">
                <?= form_error('no_kendaraan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-9">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-light btn-sm" onclick="window.history.back()">Kembali</button>
        </div>
    </div>
</div>
<?= form_close(); ?>