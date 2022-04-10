<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>

<!-- DATA BIDANG -->
<br>
<br>
<!-- <button class="btn btn-info">Edit Bagian Bidang</button> -->
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title">Data Bidang</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Data Bidang</th>
                        <th>Bagian Bidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($getBidangData as $gbd) { ?>
                        <tr>
                            <td>
                                <?= $no; ?>
                            </td>
                            <td>
                                <?= $gbd['nama_isi_bidang'] ?>
                            </td>

                            <td>
                                <?php foreach ($getNamaBidang as $namaBid) {
                                    if ($namaBid['id_bidang'] == $gbd['id_bidang']) {
                                ?>
                                        <?= $namaBid['nama_bidang'] ?>
                                <?php }
                                } ?>
                            </td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalEditBidang<?= $gbd['id_isi_bidang'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#deleteDataBidang<?= $gbd['id_isi_bidang']; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <div>
                            <form action="/HomeAdmin/deleteDataBidang/<?= $gbd['id_isi_bidang'] ?>" method="post">
                                <div class="modal fade" id="deleteDataBidang<?= $gbd['id_isi_bidang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Bidang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Anda Yakin Ingin Menghapus Bidang Ini?</h4>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="product_id" class="productID">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Edit Data Bidang -->
                        <form action="/DataBidang/editBidang/<?= $gbd['id_isi_bidang'] ?>" method="post">
                            <div class="modal fade" id="modalEditBidang<?= $gbd['id_isi_bidang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Isi Bidang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <label for="">Bagian Bidang</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="datbidBagianBidang" name="editOptionDataBidang" class="form-control shwo-tick">
                                                        <?php foreach ($getNamaBidang as $gnb) {
                                                            if ($gnb['id_bidang'] == $gbd['id_bidang']) {
                                                                # code...
                                                        ?>
                                                                <option value="<?= $gnb['id_bidang'] ?>" selected><?= $gnb['nama_bidang'] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $gnb['id_bidang'] ?>"><?= $gnb['nama_bidang'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Nama Isi Bidang</label>
                                                <input type="text" class="form-control" name="editNamaDataBidang" placeholder="Nama Data Bidang" value="<?= $gbd['nama_isi_bidang'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

            <button class="btn btn-danger" data-toggle="modal" data-target="#modalIsiBidang">Tambah Data Bidang</button>
            <!-- <button class="btn btn-success">Simpan Perubahan</button> -->
        </div>
    </div>
</div>

<!-- Tambah Data Bidang -->
<form action="/HomeAdmin/addDataBidang" method="post">
    <div class="modal fade" id="modalIsiBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Isi Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label for="">Bagian Bidang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select id="datbidBagianBidang" name="datbidBagianBidang" class="form-control shwo-tick">
                                <?php foreach ($getNamaBidang as $gnb) { ?>
                                    <option value="<?= $gnb['id_bidang'] ?>"><?= $gnb['nama_bidang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Isi Bidang</label>
                        <input type="text" class="form-control" name="namaDataBidang" placeholder="Nama Data Bidang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?= $this->endSection(); ?>