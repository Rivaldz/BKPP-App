<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>
<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Data User</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead> 
                    <tbody class="text-center">
                    <?php $i=1; foreach($getUserData as $getUD){ ?>
                        <tr>
                            <td>
                                <?= $i; ?>
                            </td>
                            <td>
                                <?= $getUD['username'] ?>
                            </td>

                            <?php foreach($getNamaBidang as $getNB){?>
                            <?php if($getUD['id_bidang'] == $getNB['id_bidang']){ ?>
                            <td>
                                <?= $getNB['nama_bidang'] ?>
                            </td>

                            <td>
                                <button>Edit</button>
                                <button data-toggle="modal" data-target="#deleteUser<?= $getUD['id_user'] ?>">DeleteUser</button>
                            </td>
                            <?php }} ?>
                        </tr>
                            <form action="/User/deleteUser/<?=$getUD['id_user'] ?>" method="post">
                                <div class="modal fade" id="deleteUser<?= $getUD['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php $i++;} ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" data-toggle = "modal" data-target="#editUser">Tambah User</button>
                <!-- <button class="btn btn-success">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>

    <form action="" method="post">
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text">
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
</div>
<?= $this->endSection(); ?>