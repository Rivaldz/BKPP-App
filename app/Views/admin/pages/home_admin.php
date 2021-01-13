<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container pt-5">
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
                                    <a type="button" data-toggle="modal" data-target="#modalEditBidang" class="btn btn-success" >Edit</a>
                                    <a href="<?= base_url('barang/hapus/'.$isi['id_bidang']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus data barang ?')"
                                    class="btn btn-danger">
                                    Hapus</a>
                                </td>
                             </tr>

                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/HomeAdmin/editBidang" method="post">
                    <div class="form-group">
                        <label>Nama Bidang</label>
                        <input type="text" name="nama" placeholder="" class="form-control">
                    </div>            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

   <!-- Modal Add Product-->
   <form action="/HomeAdmin/addBidang" method="post">
        <div class="modal fade" id="modalBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Bidang</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Bidang">
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
    <!-- End Modal Add Product-->
<?= $this->endSection(); ?>