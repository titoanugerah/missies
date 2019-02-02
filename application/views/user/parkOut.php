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
</div>
<!-- /.row -->
