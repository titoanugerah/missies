<div class="box">
  <div class="box-header">
    <h3 class="box-title">Overview</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example2" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID Trx</th>
          <th>Date</th>
          <th>PIC</th>
          <th>Qty</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $overview['result']['date']; ?></td>
            <td><?php echo $overview['result']['fullname']; ?></td>
            <td><?php echo $overview['result']['item']; ?></td>
            <td><?php echo 'Rp. '.$overview['result']['subtotal']; ?></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th>ID Trx</th>
            <th>Date</th>
            <th>PIC</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
