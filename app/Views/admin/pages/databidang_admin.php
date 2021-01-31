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
                        <?php $no=1; foreach($getBidangData as $gbd){?>
                            <tr> 
                                <td> 
                                    <?= $no;?> 
                                </td> 
                                <td>
                                    <?= $gbd['nama_isi_bidang']?>  
                                </td>

                                <td>
                                        <?php foreach($getNamaBidang as $namaBid){ 
                                            if ($namaBid['id_bidang'] == $gbd['id_bidang']) {
                                             ?>
                                             <?= $namaBid['nama_bidang'] ?>
                                        <?php }} ?>
                                </td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-warning"  data-toggle="modal" data-target="#deleteDataBidang<?= $gbd['id_isi_bidang'];?>">Hapus</button>
                                </td>
                             </tr>
                             <div>
                            <form action="/HomeAdmin/deleteDataBidang/<?=$gbd['id_isi_bidang'] ?>" method="post">
                                <div class="modal fade" id="deleteDataBidang<?= $gbd['id_isi_bidang'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <button class="btn btn-danger" data-toggle = "modal" data-target="#modalIsiBidang">Tambah Data Bidang</button>
                <!-- <button class="btn btn-success">Simpan Perubahan</button> -->
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>