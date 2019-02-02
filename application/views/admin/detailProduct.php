<div class="row">

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#aboutProducts" data-toggle="tab">About Products</a></li>
        <li class=""><a href="#editProducts" data-toggle="tab">Edit Products</a></li>
        <li class=""><a href="#updateStock" data-toggle="tab">Update Stock</a></li>
        <li class=""><a href="#other" data-toggle="tab">other</a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="aboutProducts">
          <div class="box-body">
            <strong><i class="fa fa-user margin-r-5"></i> Products Name</strong>
            <p class="text-muted">
              <?php echo $detail->name; ?>
            </p>
            <hr>
            <strong><i class="fa fa-tags margin-r-5"></i>Initial Price</strong>
            <p class="text-muted"><?php echo "Rp. ".$detail->price; ?></p>
            <hr>
            <strong><i class="fa fa-tags margin-r-5"></i>Promo</strong>
            <p class="text-muted"><?php echo "Rp. ".$detail->discount; ?></p>
            <hr>
            <strong><i class="fa fa-tags margin-r-5"></i>Final Price</strong>
            <p class="text-muted"><?php echo "Rp. ".($detail->price-$detail->discount); ?></p>
            <hr>
            <strong><i class="fa fa-tags margin-r-5"></i>Current Stock</strong>
            <p class="text-muted"><?php echo $detail->stock; ?></p>

          </div>
        </div>

        <div class="tab-pane" id="editProducts">
          <form class="form-horizontal" method="post">
            <br>

            <div class="form-group">
              <label class="col-sm-3 control-label">Product Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Input with product name " name="name" value="<?php echo $detail->name; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Price</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Input without Rp." name="price" value="<?php echo $detail->price; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Promo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Input without Rp." name="discount" value="<?php echo $detail->discount; ?>">
              </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right" name="updateProduct" value="updateProduct">Add Product</button>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
        <div class="tab-pane" id="updateStock">
          <form class="form-horizontal" method="post">
            <br>

            <div class="form-group">
              <label class="col-sm-3 control-label">Current Stock</label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  value="<?php echo $detail->stock; ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Qty New Stock</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Input the ammount of stock" name="stock">
              </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right" name="updateStock" value="updateStock">Update Stock</button>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
        <div class="tab-pane" id="other">
          <form class="form-horizontal" method="post">
            <br>

            <p>Delete <?php echo $detail->name.'?'; ?></p>

            <div class="form-group">
              <label class="col-sm-3 control-label">Type Your Password to Confirm</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password">
              </div>
            </div>


            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right" name="deleteProduct" value="deleteProduct">Delete Product</button>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
