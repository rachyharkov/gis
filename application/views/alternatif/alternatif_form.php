<div class="page-title">
                          <div class="title_left">
                          <h3>KELOLA DATA ALTERNATIF</h3>
              </div>
              <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
        
        <div class="box-body">
        
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Alternatif <?php echo form_error('kode_alternatif') ?></td><td><input type="text" class="form-control" name="kode_alternatif" id="kode_alternatif" placeholder="Kode Alternatif" value="<?php echo $kode_alternatif; ?>" /></td></tr>
	    <tr><td width='200'>Nama Alternatif <?php echo form_error('nama_alternatif') ?></td><td><input type="text" class="form-control" name="nama_alternatif" id="nama_alternatif" placeholder="Nama Alternatif" value="<?php echo $nama_alternatif; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="alternatif_id" value="<?php echo $alternatif_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('alternatif') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>