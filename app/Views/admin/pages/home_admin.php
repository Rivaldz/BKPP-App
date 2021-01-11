<?= $this->extend('admin/layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container pt-5">
    <a href="<?= base_url('bidang/tambah');?>" class="btn btn-success mb-2">Tambah Bidang</a>
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
                                    <?= $isi['Nama_Bidang']?>
                                </td>
                                <td>
                                <a href="<?= base_url('barang/edit/'.$isi['id_barang']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a href="<?= base_url('barang/hapus/'.$isi['id_barang']);?>" 
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
<?= $this->endSection(); ?>