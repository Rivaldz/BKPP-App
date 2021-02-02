<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>

<h4>Daftar Bidang Dan Data Bidang </h4>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                <?php $no=1; foreach($getNamaBidang as $showdat){?>
                    <th><?=$showdat['nama_bidang'] ?></th>
                <?php $no++; } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($getBidangData as $sgbd){?>
                 <tr>
                    <?php foreach ($getNamaBidang as $vgnb) {?>
                    <td>
                        <?php if($sgbd['id_bidang'] == $vgnb['id_bidang']){ ?>
                            <?= $sgbd['nama_isi_bidang'] ?>
                        <?php } ?>
                    </td>
                    <?php } ?>
                 </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Bidang-->
    <form action="/HomeAdmin/addBidang" method="post">
        <div class="modal fade" id="modalBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama Bidang</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama'))? 'is-invalid': ''; ?>" name="nama" placeholder="Product Name" >
                    <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                    </div>
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