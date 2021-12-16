
            <div class="">
                          <div class="title_left">
                          <h3>KELOLA DATA ALTERNATIF</h3>
              </div>
              <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('alternatif/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-upload" aria-hidden="true"></i> Import</a></div>
		<a class="btn btn-sm btn-success" href="files/Format Import Alternatif.xlsx"><i class="fa fa-file-pdf-o faa-pulse animated"></i> &nbsp;Download Format Import</a>
	</div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('alternatif/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('alternatif'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <div class="box-body" style="overflow-x: scroll; ">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Alternatif</th>
		<th>Nama Alternatif</th>
		<th>Action</th>
            </tr><?php
            foreach ($alternatif_data as $alternatif)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $alternatif->kode_alternatif ?></td>
			<td><?php echo $alternatif->nama_alternatif ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('alternatif/read/'.$alternatif->alternatif_id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-success btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('alternatif/update/'.$alternatif->alternatif_id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-primary btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('alternatif/delete/'.$alternatif->alternatif_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
            </div>
</div>

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Import Data Alternatif</h3>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?php base_url() ?>import/import">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile" required="">
                </div>
                <input type="submit" class="btn btn-primary" value="Import" name="import" />
            </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
