<section class="content">

              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Input Laporan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo $action;?>" method="post">
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="teks" class="form-control" placeholder="<?php echo date('Y-m-d H:i:s')?>" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tanggal" class="col-sm-2 control-label">User</label>
                      <div class="col-sm-10">
                        <input type="teks" class="form-control" placeholder="<?php echo $this->session->userdata('userid');?>"  disabled>
                      </div>
                    </div>

                    <div class="form-group"> 
                      <label for="varchar" class="col-sm-2 control-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="teks" class="form-control" id="phone" name="phone" placeholder="Telp yang bisa dihubungi" value="<?php echo $phone; ?>" />
                        <?php echo form_error('phone'); ?>
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <label class="col-sm-2 control-label">Divisi</label>
                      <div class="col-sm-10">
                      <div class="form-control">
                      <?php 
                      echo form_dropdown('divisi', $jns_divisi); 
                      ?>
                      </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Perangkat</label>
                      <div class="col-sm-10">
                      <div class="form-control">
                      <?php
                      echo form_dropdown('perangkat', $jns_perangkat); 
                      ?>
                    </div>
                    </div>
                    </div> -->

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Divisi</label>
                    <div class="col-sm-10">
                      <select name="divisi" id="divisi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Logistik">Logistik</option>
                        <option value="Gudang">Gudang</option>
                        <option value="Marketing">Marketing</option>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Perangkat</label>
                    <div class="col-sm-10">
                      <select name="perangkat" id="perangkat" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="PC">PC</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Printer">Printer</option>
                        <option value="Router">Router</option>
                        <option value="UPS">UPS</option>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="varchar" class="col-sm-2 control-label">Problem</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="problem" name="problem" placeholder="Detail problem" ><?php echo $problem; ?></textarea>
                        <?php echo form_error('problem') ?>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="tgl_new" value="<?php echo date('Y-m-d H:i:s')?>" /> 
                  <input type="hidden" name="user_req" value="<?php echo $this->session->userdata('userid');?>" />        
                  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                  <input type="hidden" name="tiket" value="<?php echo $tiket; ?>" /> 
                  <input type="hidden" name="status" value="new" /> 
                  <div class="box-footer">
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                  </div>
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
</section>
