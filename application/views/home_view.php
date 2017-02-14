<body class="hold-transition login-page">
 <div class="login-box">
      <div class="login-logo">
        <a href=""><b>SS Shooting Club</b></a>
      </div><!-- /.login-logo -->
       <?php $this->load->view('include/alert');?> 
      <div class="login-box-body">

        <p style="font-size:17px;text-align:center">Sign in to start your session</p>
        <hr>
        <form action="<?php echo base_url('home/loginpro');?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <br>
        <p style="text-align:center;font-size:17px;"></p>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
     <!-- jQuery 2.1.4 -->
