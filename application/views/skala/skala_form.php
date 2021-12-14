<div class="page-title">
                          <div class="title_left">
                          <h3>KELOLA DATA SKALA</h3>
              </div>
              <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
        
        <div class="box-body">
        
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Skala <?php echo form_error('nama_skala') ?></td><td><input type="text" class="form-control" name="nama_skala" id="nama_skala" placeholder="Nama Skala" value="<?php echo $nama_skala; ?>" /></td></tr>
	    <tr><td width='200'>Nilai <?php echo form_error('nilai') ?></td><td><input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="skala_id" value="<?php echo $skala_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('skala') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>