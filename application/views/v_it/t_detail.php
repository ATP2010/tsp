<section class="content">

              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Problem</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
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
                        <?php echo $tanggal; ?>
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
                
                <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Solusi</h3>
                </div><!-- /.box-header -->


                    <div class="box-body">
                    <div class="form-group">
                      <label for="varchar" class="col-sm-2 control-label">Penanganan</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="penanganan" name="penanganan" placeholder="Deskripsi penanganan" ></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="varchar" class="col-sm-2 control-label">Teknisi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="teknisi_it" id="teknisi_it" placeholder="Teknisi" />                        
                      </div>
                    </div>

                  </div>
                  <div class="box-footer">

                  <input type="hidden" name="tiket" value="<?php echo $tiket; ?>">
                  <input type="hidden" name="tgl_prog" value="<?php echo date('Y-m-d H:i:s')?>">
                  <input type="hidden" name="admin_prog" value="<?php echo $this->session->userdata('userid'); ?>">
                  <input type="hidden" name="status" value="inprogress">

                  <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
                  <a href="<?php echo site_url('it/new_tkt') ?>" class="btn btn-default">Cancel</button></a>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
</section>
