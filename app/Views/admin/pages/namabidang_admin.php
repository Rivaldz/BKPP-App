<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>

<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBidang">Tambah Bidang</button> <br>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Bidang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Bidang</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead> 
                    <tbody class="text-center">
                        <?php $no=1; foreach($getNamaBidang as $isi){?>
                            <tr> 
                                <td> 
                                    <?= $no;?> 
                                </td> 
                                <td>
                                    <?= $isi['nama_bidang']?>
                                </td>
                                <td>
                                <?php foreach($getUser0 as $userb){
                                    $hiden="";
                                    if ($isi['id_bidang'] == $userb['id_bidang']) {
                                        $hiden="display: none;";
                                    ?>
                                    <?=$userb['username'] ?>
                                <?php break;}} ?>
                                        <div style="<?=$hiden?>">
                                            <a href="/User" data-toggle="modal" data-target="#tambahUser" class="btn btn-primary" style="font-size: 0.8em;">Tambah User</a>
                                            <a href="/User" data-toggle="modal" data-target="#pilihUser<?=$isi['id_bidang']?>" class="btn btn-info" style="font-size: 0.8em;">Pilih User</a>

                                        </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalEditBidang<?= $isi['id_bidang']; ?>" class="btn btn-success" >
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteBidang<?= $isi['id_bidang'];?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                             </tr>

                             <!-- pilih user -->
                             <div>
                             <form action="/NamaBidang/PilihUser/<?=$isi['id_bidang']?>" method="post">
                                <div class="modal fade" id="pilihUser<?=$isi['id_bidang']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pilih User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                               <div class="form-group">
                                                 <label for="">Username</label>
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <select id="t_user" name="tEditUser" class="form-control shwo-tick">
                                                        <?php foreach($getUser0 as $getUser){
                                                         ?> 
                                                            <option value="<?=$getUser['id_user']?>"><?=$getUser['username']?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                               </div> 

                                            </div>
                                                <div class="modal-footer">
                                                     <input type="hidden" name="product_id" class="productID">
                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                     </div>
                                    </div>
                                </div>
                            </form>
                             </div>
                             <!-- end pilih user -->

                            <!-- tambah user -->
                            <div>
                             <form action="/HomeAdmin/addUser/<?=$isi['id_bidang']?>" method="post">
                                <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                 <label for="">Username</label>
                                                 <input type="text" class="form-control" name="username" placeholder="Username">
                                               </div> 

                                               <label for="">Bagian Bidang</label>
                                               <div class="form-group">
                                                    <div class="form-line">
                                                        <select id="t_user" name="t_user" class="form-control shwo-tick">
                                                        <?php foreach($getNamaBidang as $gnb){
                                                         ?> 
                                                            <option value="<?=$gnb['id_bidang']?>"><?=$gnb['nama_bidang']?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                               </div>

                                               <div class="form-group">
                                                 <label for="">Password</label>
                                                 <input type="password" class="form-control" name="password" placeholder="Password">
                                               </div> 
                                            </div>
                                                <div class="modal-footer">
                                                     <input type="hidden" name="product_id" class="productID">
                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                     </div>
                                    </div>
                                </div>
                            </form>
                             </div

                             <!-- modal edit bidang  -->
                             <div class="modal fade" id="modalEditBidang<?= $isi['id_bidang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <form action="/HomeAdmin/editBidang/<?= $isi['id_bidang']; ?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <label>Nama Bidang</label>
                                                    <input type="text"  name="nama" value="<?= $isi['nama_bidang']; ?>"  class="form-control">
                                                </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div>
                            <form action="/HomeAdmin/delete/<?=$isi['id_bidang'] ?>" method="post">
                                <div class="modal fade" id="deleteBidang<?= $isi['id_bidang'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <?php $no++; } ?>
                    </tbody>
                </table>
 <!-- Modal Tambah Bidang-->
    <form action="/HomeAdmin/addBidang" method="post">
        <div class="modal fade" id="modalBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
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
              
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>