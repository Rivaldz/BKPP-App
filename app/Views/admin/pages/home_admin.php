<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBidang">Tambah Bidang</button>
    <button class="btn btn-info" data-toggle="modal" data-target="#tambahUser">Tambah User</button>

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
                                    if ($isi['id_bidang'] == $userb['id_bidang']) {
                                    ?>
                                    <?=$userb['username'] ?>
                                <?php } } ?>
                                <!-- user <?= $no; ?> -->
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalEditBidang<?= $isi['id_bidang']; ?>" class="btn btn-success" >Edit</a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteBidang<?= $isi['id_bidang'];?>">
                                    Hapus</a>
                                </td>
                             </tr>

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
                                                 <input type="text" class="form-control" name="password" placeholder="Password">
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
                             <!-- end tambah user -->

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
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="bidang" class="form-control shwo-tick" id="">
                                                        <?php foreach($getUser0 as $usr){
                                                            if ($isi['id_bidang'] == $usr['id_bidang']) {
                                                        ?> 
                                                            <option value="<?= $usr['id_bidang'] ?>" selected><?=$usr['username']?></option>
                                                        <?php }else {
                                                            # code...
                                                        ?>
										                    <option value="<?= $usr['id_bidang'] ?>"><?= $usr['username'] ?></option>
                                                        <?php }} ?>
                                                        </select>
                                                    </div>
                                               </div >
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
              
            </div>
        </div>
    </div>

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
                        <?php $no=1; foreach($getNamaBidang as $isi){?>
                            <tr> 
                                <td> 
                                    <?= $no;?> 
                                </td> 
                                <td>
                                    <p>Isi Bidang Ke <?=$no?></p>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="bagianBidang" id="idBidang" class="form-control shwo-tick" id="" style="width:auto;">
 
                                                <option value="1">Bidang Binaindo</option>
                                                <option value="2">Bidang Mutasi</option>
                                                <option value="3">Bidang Diklat</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-warning">Hapus</button>
                                </td>
                             </tr>

                             <!-- tambah user -->
                             
                             <!-- end tambah user -->
                             
                             

                            <div>
                            
                            </div>
                        <?php $no++; } ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" data-toggle = "modal" data-target="#modalIsiBidang">Tambah Data Bidang</button>
                <button class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <h4>Daftar Bidang Dan Data Bidang </h4>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bidang Binaindo</th>
                    <th>Bidang Mutasi</th>
                    <th>Bidang Diklat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>isi binaindo</td>
                    <td>isi mutasi</td>
                    <td>isi Diklat</td>
                </tr>
                <tr>
                    <td>isi binaindo 2</td>
                    <td></td>
                    <td>isi diklat2</td>
                </tr>
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