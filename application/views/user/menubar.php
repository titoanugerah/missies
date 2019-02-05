<ul class="sidebar-menu">
  <li class="header">Main Menu</li>

  <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['role']; ?></span></a></li>
  <li><a href="<?php echo base_url('listProduct');?>"><i class="fa fa-tags"></i> Product</a></li>
  <li><a href="<?php echo base_url('teller');?>"><i class="fa fa-shopping-cart"></i> Teller</a></li>
  <li><a href="<?php echo base_url('listTeller');?>"><i class="fa fa-list"></i> List Sold Item</a></li>
  <li class="header">Download</li>
  <li><a href="<?php echo base_url('downloadDailyReport');?>"><i class="fa fa-download"></i>Download Report</a></li>

</ul>
