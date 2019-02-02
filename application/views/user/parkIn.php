<h1>
  Parkir
</h1>


<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Form Kendaraan Masuk</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <br>
    <div class="form-group">
      <label class="col-sm-2 control-label">Jenis Kendaraan</label>
      <div class="col-sm-9">
        <select class="form-control" name="vehicle_type">
          <option value="motor">Motor </option>
          <option value="mobil">Mobil </option>
          <option value="truk">Truk </option>
        </select>
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label">Plat Nomor</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Masukan plat nomer kendaraan " name="vehicle_id">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Pemilik</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Masukan Nama Pemilik " name="vehicle_owner">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right" name="createParkRecord" value="createParkRecord">Buat Data</button>
      <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
</div>
<!-- /.row -->
