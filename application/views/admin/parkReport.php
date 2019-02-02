<div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Parkir</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
          <th>Plat Nomor</th>
          <th>Tipe Kendaraan</th>
          <th>Pemilik</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Total</th>
          <th>Opsi</th>

        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($parklist as $item) : ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $item->vehicle_id; ?></td>
          <td><?php echo $item->vehicle_type; ?></td>
          <td><?php echo $item->vehicle_owner; ?></td>
          <td><?php echo $item->start_time; ?></td>
          <td><?php echo $item->end_time; ?></td>
          <td><?php echo 'Rp. '.$item->Total; ?></td>
          <td><a href="<?php echo base_url('deleteReport/'.$item->id);?>">Hapus</a></td>
        </tr>
        <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
          <th>No.</th>
          <th>Plat Nomor</th>
          <th>Tipe Kendaraan</th>
          <th>Pemilik</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Total</th>
          <th>Opsi</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
