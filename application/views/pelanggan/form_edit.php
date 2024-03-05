<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-reply"></i> Edit Data Pelanggan</h4>
    </div>
</div>
<hr class="mt-0" />
<div id="message">
    <?php if ($this->session->flashdata('alert')) : ?>
        <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('alert'); ?></div>
    <?php endif; ?>
</div>
<?= form_open(); ?>
<div class="col-md-12">
    <div class="form-group row">
        <label for="tanggal" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama Pelanggan" name="nama" id="date-picker" value="">
            <div class="invalid-feedback">
                <?= form_error('nama', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="pembeli" class="col-sm-2 col-form-label">No Telepon</label>
        <div class="col-sm-6">
            <input type="text" name="phone" id="phone" class="form-control form-control-sm <?= (form_error('phone')) ? 'is-invalid' : ''; ?>" placeholder="No Telepon" value="<?= (set_value('phone')) ? set_value('phone') : ''; ?>">
            <div class="invalid-feedback">
                <?= form_error('phone', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Pelanggan</label>
        <div class="col-sm-6">
            <textarea type="text" class="form-control form-control-sm <?= (form_error('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" required autofocus name="alamat" placeholder="Alamat Pelanggan" value="" name="" id="" cols="10" rows="5"><?= (set_value('alamat')) ? set_value('alamat') : $data->alamat; ?></textarea>
            <div class="invalid-feedback">
                <?= form_error('alamat', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tanggal" class="col-sm-2 col-form-label">Fasilitas</label>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm <?= (form_error('fasilitas')) ? 'is-invalid' : ''; ?>" placeholder="Fasilitas yang diberikan" name="fasilitas" id="date-picker" value="">
            <div class="invalid-feedback">
                <?= form_error('nama', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tanggal" class="col-sm-2 col-form-label">Jenis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm <?= (form_error('jenis')) ? 'is-invalid' : ''; ?>" placeholder="Pelanggan/Agen" name="jenis" id="date-picker" value="">
            <div class="invalid-feedback">
                <?= form_error('nama', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-6">
            <select class="form-control form-control-sm <?= (form_error('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" placeholder="status" id="status" style="text-transform: capitalize;">
                <option selected value="<?= (set_value('status')) ? set_value('status') : $data->status; ?>"><?= $data->status; ?></option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Tidak Aktif</option>
            </select>
            <div class="invalid-feedback">
                <?= form_error('status', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-4 offset-sm-7">
        <button type="button" onclick="window.history.back()" class="btn btn-light btn-sm">
            Kembali
        </button>
    </div>
</div>
<?= form_close(); ?>