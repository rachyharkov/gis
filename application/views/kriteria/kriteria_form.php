<div class="page-title">
                          <div class="title_left">
                          <h3>KELOLA DATA KRITERIA</h3>
              </div>
              <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
        
        <div class="box-body">
        
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Kriteria <?php echo form_error('kode_kriteria') ?></td><td><input type="text" class="form-control" name="kode_kriteria" id="kode_kriteria" placeholder="Kode Kriteria" value="<?php echo $kode_kriteria; ?>" /></td></tr>
	    <tr><td width='200'>Nama Kriteria <?php echo form_error('nama_kriteria') ?></td><td><input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $nama_kriteria; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kriteria_id" value="<?php echo $kriteria_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>