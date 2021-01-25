<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<h2>Form Upload File</h2>
		<p>Gunakan form dibawah ini untuk mengupload file.</p>

		<form method="POST" action="<?php echo base_url();?>upload/do_upload" enctype="multipart/form-data">
		<div class="form-group">
			<label>Pilih File</label>
			<input type="file" name="file_nya">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cloud-upload"></span> Upload !</button>
	
		</div>
		
		</form>
