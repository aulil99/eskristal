<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-truck"></i> Edit Data Ongkos Kirim</h4>
    </div>
</div>
<hr class="mt-0" />
<?= form_open(); ?>
<input type="hidden" name="id_pengiriman" value="<?= $data->id; ?>" />
<div class="col-md-8">

    <div class="form-group row">
        <label for="jenis" class="col-sm-3 col-form-label">Jenis Pelanggan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" required autofocus name="jenis" placeholder="Nama Pelanggan" value="<?= (set_value('jenis')) ? set_value('jenis') : $data->jenis; ?>">
            <div class="invalid-feedback">
                <?= form_error('jenis', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga" class="col-sm-3 col-form-label">Harga Jual</label>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm uang <?= (form_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="Harga Jual" value="<?= (set_value('harga')) ? set_value('harga') : number_format($data->harga, 0, ',', '.'); ?>">
            <div class="invalid-feedback">
                <?= form_error('harga', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-9">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm">Edit Data</button>
            <button type="button" class="btn btn-light btn-sm" onclick="window.history.back()">Kembali</button>
        </div>
    </div>

</div>
<?= form_close(); ?>