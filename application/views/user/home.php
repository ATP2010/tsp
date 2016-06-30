<section class="content">
  
  <?php foreach ($newtiket->result() as $new) {}?>
  <?php foreach ($inprogtiket->result() as $inprog) {}?>
  <?php foreach ($closedtiket->result() as $closed) {}?>
  

<div class="row">

            <div class="box-header with-border">
                  <i class="fa fa-check-square"></i>
                  <h3 class="box-title">Info</h3>
                </div><!-- /.box-header -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> NEW TIKET</span>
                  <span class="info-box-number"><?php echo $new->newtiket;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-tasks"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> TIKET INPROGRESS</span>
                  <span class="info-box-number"><?php echo $inprog->inprogtiket;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-log-in"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">TIKET CLOSED</span>
                  <span class="info-box-number"><?php echo $closed->closedtiket;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            
            
          </div>
          </div>

        </section>