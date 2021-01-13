<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBidang">Tambah Bidang</button>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title"> Data Bidang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Bidang</th>
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
                                    <a href="#" data-toggle="modal" data-target="#modalEditBidang<?= $isi['id_bidang']; ?>" class="btn btn-success" >Edit</a>
                                    <a href="<?= base_url('barang/hapus/'.$isi['id_bidang']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus data barang ?')"
                                    class="btn btn-danger">
                                    Hapus</a>
                                </td>
                             </tr>
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
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal Edit Bidang-->
    <form action="/HomeAdmin/addBidang" method="post">
        <div class="modal fade" id="editBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="nama" placeholder="Product Name" value="<?= $bidang->nama_bidang;?>">
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
    <!-- End Modal Edit Bidang-->

<?= $this->endSection(); ?>