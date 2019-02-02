
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Add New Products</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <br>

    <div class="form-group">
      <label class="col-sm-2 control-label">Product Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Input with productname " name="name">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Price</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Input without Rp." name="price">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right" name="createProduct" value="createProduct">Add Product</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Products</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($list as $item) : ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $item->name; ?></td>
            <td><?php echo 'Rp. '.$item->price; ?></td>
            <td><?php echo $item->stock; ?></td>
            <td><a href="<?php echo base_url('detailProduct/'.$item->id);?>">Detail</a></td>
          </tr>
          <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Option</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
