<ul class="sidebar-menu">
  <li class="header">Main Menu</li>

  <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['role']; ?></span></a></li>
  <li><a href="<?php echo base_url('listProduct');?>"><i class="fa fa-tags"></i> Product</a></li>
  <li><a href="<?php echo base_url('teller');?>"><i class="fa fa-shopping-cart"></i> Teller</a></li>

  <li class="active treeview">
    <a href="#">
      <i class="fa fa-car"></i> <span>Parkir</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url('parkIn');?>"><i class="fa fa-arrow-circle-o-down"></i> Parkir Masuk</a></li>
      <li><a href="<?php echo base_url('parkOut');?>"><i class="fa fa-arrow-circle-o-up"></i> Parkir Keluar</a></li>
    </ul>
  </li>

</ul>
