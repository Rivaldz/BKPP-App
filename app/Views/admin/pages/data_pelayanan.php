<?= $this->extend('admin/layouts/layout_admin'); ?>
<?= $this->section('content'); ?>
    <h1>data Pelayanan</h1>

    <div class="panel-body">
        <?php foreach($getNamaBidang as $gnb): ?>
            <h3><?= $gnb['nama_bidang'] ?></h3>

        <div class="table">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama File</th>
                        <th>Nama Pelayanan</th>
                        <th>Tanggal Upload</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($dataFile as $df){
                        if ($df['nama_bidang_id'] == $gnb['id_bidang']) {
                        ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        
                        <td>
                            <?= $df['nama_file'] ?>
                        </td>

                            <?php foreach($getBidangData as $gbd){
                              if($gbd['id_isi_bidang'] == $df['data_bidang_id']){?>
                                <td>
                                    <?= $gbd['nama_isi_bidang'] ?>
                                </td>
                            <?php  }}?>

                        <td>
                            <?= $df['tanggal_upload'] ?>
                        </td>

                        <td>
                        <a class="btn btn-success btn-circle" href="/Home/download/<?=$df['nama_file']?>">
                                <i class="fas fa-download"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $no++;}} ?>
                </tbody>
            </table>
        </div>
        <br>
        <?php endforeach;?>
    </div>


<?= $this->endSection(); ?>