<ul class="sidebar-menu">
  <li class="header">Main Menu</li>
  <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['role']; ?></span></a></li>
  <li class="header">Recap</li>
  <li><a href="<?php echo base_url('product');?>"><i class="fa fa-tags"></i> Product</a></li>
  <li class="header">Download</li>
  <li><a href="<?php echo base_url('downloadDailyReport');?>"><i class="fa fa-download"></i>Download Report</a></li>



</ul>
