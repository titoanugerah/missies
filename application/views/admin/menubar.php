<ul class="sidebar-menu">
  <li class="header">Main Menu</li>
  <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['role']; ?></span></a></li>
  <li class="header">Recap</li>
  <li><a href="<?php echo base_url('product');?>"><i class="fa fa-tags"></i> Product</a></li>
  <li><a href="<?php echo base_url('parkReport');?>"><i class="fa fa-car"></i> Parkir</a></li>
  <li class="header">Download</li>
  <li><a href="<?php echo base_url('downloadParkReport');?>"><i class="fa fa-download"></i>Laporan Parkir</a></li>



</ul>
