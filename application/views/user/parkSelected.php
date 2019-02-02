<h1>
  Parkir
</h1>


<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Form Kendaraan Keluar</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <br>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Pemilik</label>
      <div class="col-sm-9">
        <select class="form-control select2" style="width: 100%;" name="id">
          <?php foreach ($parklist as $item): ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->vehicle_id."  -  ".$item->vehicle_owner;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right" name="createParkBill" value="createParkBill">Check Out</button>
      <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>

<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Transaksi Parkir</h3>
  </div>

  <div class="row">
    <form  method="post">

    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Plat Nomor</th>
          <th>Pemilik Kendaraan</th>
          <th>Waktu Masuk</th>
          <th>Waktu Keluar</th>
          <th>Durasi</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td><?php echo $checkout->vehicle_id; ?></td>
          <td><?php echo $checkout->vehicle_owner; ?></td>
          <td><?php echo $checkout->start_time; ?></td>
          <td><?php echo $checkout->end_time; ?></td>
          <td><?php echo $checkout->duration_day.' Hari, '.$checkout->duration_time.' jam'; ?></td>
          <td><?php echo 'Rp. '.$checkout->Total; ?></td>
        </tr>

        </tbody>
      </table>

        <div class="box-footer">
          <a href="payPark/<?php echo $checkout->id; ?>"><button type="button" class="btn btn-info pull-right" >Selesai Transaksi</button></a>

        </div>
      </form>
    </div>
    <!-- /.col -->
  </div>
</div>
<!-- /.row -->
