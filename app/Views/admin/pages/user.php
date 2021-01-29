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
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                            <?php }} ?>
                        </tr>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
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