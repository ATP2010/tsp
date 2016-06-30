<section class="content">

              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Problem</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Tiket :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $tiket; ?>
                      </label>
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Tanggal Request :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $tgl_new; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">User Request :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $user_req; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Phone :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $phone; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Divisi :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $divisi; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Perangkat :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $perangkat; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Problem :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $problem; ?>
                      </label>
                      </div>
                    </div>
                    </div>

                    <div class="box box-warning">
                <div class="box-header with-border">
                <h3 class="box-title">In Progress</h3>
                </div><!-- /.box-header -->

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Tanggal :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $tgl_prog; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Penanganan :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $penanganan; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Teknisi :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $teknisi_it; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Admin :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $admin_prog; ?>
                      </label>
                      </div>
                    </div>
                
                <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Tiket Closed</h3>
                </div><!-- /.box-header -->

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Tanggal :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $tgl_closed; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Solusi :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $solusi; ?>
                      </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Admin :</label>
                      <div class="col-sm-5">
                      <label class="control-label">
                        <?php echo $admin_closed; ?>
                      </label>
                      </div>
                    </div>

                  <div class="box-footer">
                  <a href="<?php echo site_url('it/closed_tkt') ?>" class="btn btn-default">Back</button></a>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
</section>
