<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-plus-circle"></i>
          <b>Tambah Transaksi Harian</b>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">Tambah Data</div>
                  <div class="card-body">
                    <form action="" method="post">
                    <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                    </div>
                    <?php endif;?>
                      <div class="form-group">
                        <label for="quantity">Jumlah Terjual</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                      </div>
                      
                      <div class="form-group">
                        <label for="nominal">Pendapatan</label>
                        <input type="text" name="nominal" id="nominal" class="form-control">
                      </div>
                      <?php
                      
                      ?>
                      <div class="form-group">
                        <input type="hidden" id="bahan" name="bahan" value=25000>
                        <input type="hidden" id="sablon" name="sablon" value=10000>
                        <input type="hidden" id="jahit" name="jahit" value=5000>
                        <input type="hidden" id="label" name="label" value=5000>
                        <input type="hidden" id="laba" name="laba" value="">
                      </div>
                      
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                  </div>
                </div>
              </div>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
</div>