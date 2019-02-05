

<div class="box">
  <div class="box-header">
    <h3 class="box-title">List Transaction</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Date</th>
          <th>Method</th>
          <th>Subtotal</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($list as $item) : ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $item->date; ?></td>
            <td><?php echo $item->method; ?></td>
            <td><?php echo 'Rp. '.$item->subtotal; ?></td>
            <td><a href="<?php echo base_url('inputTeller/'.$item->id);?>">Detail</a></td>
          </tr>
          <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Date</th>
            <th>Method</th>
            <th>Subtotal</th>
            <th>Option</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>




  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List Sold Item</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
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
          <?php $i=1; foreach ($list2 as $item) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $item->name; ?></td>
              <td><?php echo 'Rp. '.$item->price; ?></td>
              <td><?php echo $item->qty; ?></td>
              <td><?php echo 'Rp. '.$item->discount; ?></td>
              <td><?php echo 'Rp. '.$item->total; ?></td>
              <td><a href="<?php echo base_url('deleteInputTrx/'.$item->id_trx.'/'.$item->id);?>">delete</a></td>
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
