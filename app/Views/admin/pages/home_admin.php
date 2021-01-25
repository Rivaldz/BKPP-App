<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBidang">Tambah Bidang</button>
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
                                <button class="btn btn-info" data-toggle="modal" data-target="#tambahUser<?=$isi['id_bidang']?>">Tambah User</button>
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
                                <div class="modal fade" id="tambahUser<?= $isi['id_bidang'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text"  name="nama" value="<?= $isi['nama_bidang']; ?>"  class="form-control <?= ($validation->hasError('nama'))? 'is-invalid':''; ?>"
                                                    autofocus>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
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
              
            </div>
        </div>
    </div>

    <!-- isi bidang -->
    <br>
    <br>
    <button class="btn btn-danger">Tambah Isi Bidang</button>
    <button class="btn btn-info">Edit Bagian Bidang</button>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Data Isi Bidang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Isi Bidang</th>
                            <th>Action</th>
                            <th>Bagian Bidang</th>
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
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-warning">Hapus</button>
                                </td>
                                <td>
                                    <div id="<?=$no?>">
                                        <input type="radio" value="bidang A" name="<?=$no?>" >
                                        <label for="bidang A"> Bidang A</label>
                                    </div>
                                    <div >
                                        <input type="radio" value="bidang B" name="<?=$no?>" >
                                        <label for="bidang B"> Bidang B</label>
                                    </div>                                    
                                    <div>
                                        <input type="radio" value="bidang C" name="<?=$no?>" >
                                        <label for="bidang B"> Bidang C</label>
                                    </div>
                                </td>
                             </tr>

                             <!-- tambah user -->
                             
                             <!-- end tambah user -->
                             
                             

                            <div>
                            
                            </div>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <h4>Daftar Bidang Dan Isi </h4>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bidang Binaindo</th>
                    <th>Bidang Mutasi</th>
                    <th>Bidang Diklat</th>
                    <th>th value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>isi binaindo</td>
                    <td>isi mutasi</td>
                    <td>isi Diklat</td>
                    <td></td>
                </tr>
                <tr>
                    <td>isi binaindo 2</td>
                    <td></td>
                    <td>isi diklat2</td>
                    <td></td>
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
<<<<<<< HEAD
                    <label>Nama Bidang</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama'))? 'is-invalid': ''; ?>" name="nama" placeholder="Product Name" >
                    <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                    </div>
=======
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Bidang">
>>>>>>> 8d961dfb0c63f47161550f53fe4c98bdf986ff47
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
<<<<<<< HEAD
=======

>>>>>>> 557c3ec15426e0f2f50e3443be9d604cd6cee036
<?= $this->endSection(); ?>