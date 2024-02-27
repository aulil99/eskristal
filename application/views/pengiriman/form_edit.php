<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-truck"></i> Edit Data Pengiriman</h4>
    </div>
</div>
<hr class="mt-0" />
<?= form_open(); ?>
<input type="hidden" name="id_pengiriman" value="<?= $data->id_pengiriman; ?>" />
<div class="col-md-8">

    <div class="form-group row">
        <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
        <div class="col-sm-9">
            <input type="date" class="form-control form-control-sm <?= (form_error('date')) ? 'is-invalid' : ''; ?>" id="date" required autofocus name="date" value="<?= (set_value('date')) ? set_value('date') : $data->date; ?>">
            <div class="invalid-feedback">
                <?= form_error('date', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="customer" class="col-sm-3 col-form-label">Pelanggan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('customer')) ? 'is-invalid' : ''; ?>" id="customer" required autofocus name="customer" placeholder="Nama Pelanggan" value="<?= (set_value('customer')) ? set_value('customer') : $data->customer; ?>">
            <div class="invalid-feedback">
                <?= form_error('customer', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="hp" class="col-sm-3 col-form-label">Nomor Telp.</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm hp <?= (form_error('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="phone" placeholder="Nomor Telephone" value="<?= (set_value('phone')) ? set_value('phone') : $data->phone; ?>">
            <div class="invalid-feedback">
                <?= form_error('hp', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat" class="col-sm-3 col-form-label">Alamat Pelanggan</label>
        <div class="col-sm-9">
            <textarea type="text" class="form-control form-control-sm <?= (form_error('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" required autofocus name="alamat" placeholder="Alamat Pelanggan" value="" name="" id="" cols="10" rows="5"><?= (set_value('alamat')) ? set_value('alamat') : $data->alamat; ?></textarea>
            <div class="invalid-feedback">
                <?= form_error('alamat', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="kurir" class="col-sm-3 col-form-label">Kurir</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('kurir')) ? 'is-invalid' : ''; ?>" id="kurir" name="kurir" placeholder="Kurir" value="<?= (set_value('kurir')) ? set_value('kurir') : $data->kurir; ?>">
            <div class="invalid-feedback">
                <?= form_error('kurir', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="no_kendaraan" class="col-sm-3 col-form-label">No Kendaraan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('no_kendaraan')) ? 'is-invalid' : ''; ?>" id="no_kendaraan" name="no_kendaraan" placeholder="No Kendaraan" value="<?= (set_value('no_kendaraan')) ? set_value('no_kendaraan') : $data->no_kendaraan; ?>">
            <div class="invalid-feedback">
                <?= form_error('no_kendaraan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="penerima" class="col-sm-3 col-form-label">Penerima</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('penerima')) ? 'is-invalid' : ''; ?>" id="penerima" name="penerima" placeholder="Penerima" value="<?= (set_value('penerima')) ? set_value('penerima') : $data->penerima; ?>">
            <div class="invalid-feedback">
                <?= form_error('penerima', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= (set_value('keterangan')) ? set_value('keterangan') : $data->keterangan; ?>">
            <div class="invalid-feedback">
                <?= form_error('keterangan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <select class="form-control form-control-sm <?= (form_error('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" placeholder="status" id="status" style="text-transform: capitalize;">
                <option selected value="<?= (set_value('status')) ? set_value('status') : $data->status; ?>"><?= $data->status; ?></option>
                <option value="berhasil">Berhasil</option>
                <option value="gagal">Gagal</option>
            </select>
            <div class="invalid-feedback">
                <?= form_error('status', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <!-- Pilih Barang -->

    <div class="row">
        <div class="col-sm-12 col-md-10">
            <h4 class="mb-0"><i class="fa fa-cubes"></i> Info Barang</h4>
        </div>
        <div class="col-sm-12 col-md-2">
            <!-- <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success btn-sm btn-block">Pilih Barang</a> -->

            <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#pilihBarang">
                Pilih Barang
            </button>

            <!-- Modal -->
            <div class="modal fade" id="pilihBarang" tabindex="-1" role="dialog" aria-labelledby="pilihBarangLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <table class="table table-sm table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-success">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
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
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped" id="tables">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="form-group row">
        <div class="col-sm-9">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm">Edit Data</button>
            <button type="button" class="btn btn-light btn-sm" onclick="window.history.back()">Kembali</button>
        </div>
    </div>

</div>
<?= form_close(); ?>