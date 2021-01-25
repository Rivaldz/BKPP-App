<?= $this->extend('admin/layouts/layout'); ?>

<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 File Upload - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
  </style>
</head>

<body>
  <div class="">

    <form method="post" action="<?php echo base_url('FileUpload/upload');?>" enctype="multipart/form-data">
      <div class="form-group">
        <label>Upload File</label>
        <br>
        <input type="file" name="file" class="">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger">Upload</button>
      </div>
    </form>

  </div>
</body>

<div class="table-responsive">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Ukuran File</th>
			<th>Tanggal Upload</th>
			<th>Download</th>
	    <tr>
            <td>1</td>
            <td>BKPP.xlsx</td> 
            <td>1 MB</td>
            <td>25 januari 2021</td>
            <td></td>
        </tr>
    </table>
	</thead>
	<tbody>
<?php
$no=null;
$dir = "uploaded_file/";

if(isset($daftar_file)){
	for($a=0;$a<count($daftar_file);$a++) { 
		if($daftar_file[$a]!='.' && $daftar_file[$a]!='..'){
		$no++;
		$file=$daftar_file[$a];
		?>
	<tr>
		<td align="center"><?php echo $no;?></td>
		<td><?php echo $file;?></td>
		<td align="right"><?php echo number_format(filesize($dir.$daftar_file[$a])/1024,2,',','.');?> Kb</td>
		<td><?php echo date ("d-M-Y H:i:s", filemtime($dir.$daftar_file[$a]));?></td>
		<td align="center">
			<a href="<?php echo $dir.$daftar_file[$a];?>"><span class="glyphicon glyphicon-cloud-download"></span></a>
			<a href="<?php echo base_url().'upload/hapus/'.$daftar_file[$a];?>"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
	</tr>
	</tbody>
	<?php
		 }
		}	
	}
	?>
</table>
</div>


</html>	
</form>
<?= $this->endSection(); ?>