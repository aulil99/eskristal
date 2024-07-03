<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-truck"></i> Tambah Data Retur Barang</h4>
    </div>
</div>
<hr class="mt-0" />
<?= form_open(); ?>
<div class="col-md-8">

    <div class="form-group row">
        <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" placeholder="Nama Barang"><?= set_value('nama_barang'); ?>
            <div class="invalid-feedback">
                <?= form_error('nama_barang', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="retur" class="col-sm-3 col-form-label">Total Barang Yang Dikembalikan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('retur')) ? 'is-invalid' : ''; ?>" id="retur" name="retur" placeholder="Retur"><?= set_value('retur'); ?>
            <div class="invalid-feedback">
                <?= form_error('retur', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga_satuan" class="col-sm-3 col-form-label">Harga Satuan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('harga_satuan')) ? 'is-invalid' : ''; ?>" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan"><?= set_value('harga_satuan'); ?>
            <div class="invalid-feedback">
                <?= form_error('harga_satuan', '<p class="error-message">', '</p>'); ?>
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