
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Add Cart</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <br>

    <div class="form-group">
      <label class="col-sm-3 control-label">Product</label>
      <div class="col-sm-8">
        <select class="form-control select2" style="width: 100%;" name="id_product">
          <?php foreach ($product as $item): ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->name;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Qty</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" placeholder="Input Qty" name="qty">
      </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right" name="addToCart" value="addToCart">Add To Cart</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Cart</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Promo</th>
          <th>Total</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($list as $item) : ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $item->name; ?></td>
            <td><?php echo 'Rp. '.$item->price; ?></td>
            <td><?php echo $item->qty; ?></td>
            <td><?php echo 'Rp. '.$item->discount; ?></td>
            <td><?php echo 'Rp. '.$item->total; ?></td>
            <td><a href="<?php echo base_url('deleteInputTrx/'.$item->id);?>">delete</a></td>
          </tr>
          <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Promo</th>
            <th>Total</th>
            <th>Option</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>