<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-danger">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?php echo "@".$this->session->userdata['username']; ?></h3>
        <p class="text-muted text-center">Logged In</p>
      </div>
    </div>
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">About Me</h3>
      </div>
      <div class="box-body">
        <strong><i class="fa fa-user margin-r-5"></i> Fullname</strong>
        <p class="text-muted">
          <?php echo $this->session->userdata['fullname']; ?>
        </p>
        <hr>
        <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
        <p class="text-muted"><?php echo $this->session->userdata['email']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editAccount" data-toggle="tab">Edit Account</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="editAccount">
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="input username" name="username" value="<?php echo $this->session->userdata['username']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="input password  " name="password" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Fullname</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="input your fullname  " name="fullname" value="<?php echo $this->session->userdata['fullname']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="input email " name="email" value="<?php echo $this->session->userdata['email']; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateAccount" value="updateAccount">Update Profile</button>
                <button type="submit" class="btn btn-info" name="updatePassword" value="updatePassword">Update password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
