<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>


    <button class="btn btn-info" data-toggle="modal" data-target="#tambahUser">Tambah User</button>
    <a class="btn btn-success" href="/User">Lihat User</a>


    <!-- Tambah Data Bidang -->
    <form action="/HomeAdmin/addDataBidang" method="post">
        <div class="modal fade" id="modalIsiBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-d`alog" role="document">
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
                          <?php foreach($getNamaBidang as $gnb){?> 
                          <option value="<?=$gnb['id_bidang']?>"><?=$gnb['nama_bidang']?></option>
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