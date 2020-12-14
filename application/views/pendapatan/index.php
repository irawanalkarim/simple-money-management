<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            <b>Data Transaksi Harian</b></div>
          <div class="card-body">
          <div class="flash-data" data-flashdata="<?=$this->session->flashdata(('flash'));?>"></div>
          <?php if($this->session->flashdata('flash')) :?>
            
          <?php endif;?>
            <div class="table-responsive">
            <div class="row mb-3"> 
              <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Tambah Data Pendapatan
            </button>
            </div>
            </div>
            
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Bahan</th>
                    <th>Sablon</th>
                    <th>Jahit</th>
                    <th>Label</th>
                    <th>Laba</th>
                    <th>Qty</th>
                    <th>Tgl.Input</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Bahan</th>
                    <th>Sablon</th>
                    <th>Jahit</th>
                    <th>Label</th>
                    <th>Laba</th>
                    <th>Qty</th>
                    <th>Tgl.Input</th>
                  </tr>
                </tfoot>
                <?php 
                function rupiah($angka) {
                  $hasil_rupiah = "Rp . " . number_format($angka,2,',','.');
                  return $hasil_rupiah;
                }
                ?>
                <tbody>
                <?php $no = 1;foreach($pendapatan as $row):?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><?=rupiah($row['bahan']);?></td>
                    <td><?=rupiah($row['sablon']);?></td>
                    <td><?=rupiah($row['jahit']);?></td>
                    <td><?=rupiah($row['label']);?></td>
                    <td><?=rupiah($row['laba']);?></td>
                    <td><?=$row['qty'];?></td>
                    <td><?=$row['tanggal'];?></td>
                  </tr>
                <?php $no++;endforeach;?>
                
                </tbody>
                <tr>
                    <th>Total</th>
                    <th><?=rupiah($total_bahan);?></th>
                    <th><?=rupiah($total_sablon);?></th>
                    <th><?=rupiah($total_jahit);?></th>
                    <th><?=rupiah($total_label);?></th>
                    <th><?=rupiah($total_laba);?></th>
                    <th><?=$total_qty;?></th>
                  </tr>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> <b>Form Tambah Data Pendapatan</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('pendapatan/tambah');?>" method="post">
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
                      <div class="form-group">
                        <input type="hidden" id="bahan" name="bahan" value=25000>
                        <input type="hidden" id="sablon" name="sablon" value=10000>
                        <input type="hidden" id="jahit" name="jahit" value=5000>
                        <input type="hidden" id="label" name="label" value=5000>
                        <input type="hidden" id="laba" name="laba" value="">
                        <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date("Y-m-d H:i:s");?>">
                      </div>
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>