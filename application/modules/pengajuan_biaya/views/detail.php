<div class="row">
  <div class="col-xs-12">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu1">Summary</a></li>
      <li><a data-toggle="tab" href="#menu2">Logs Activity</a></li>
    </ul>

    <div class="tab-content">
      <div id="menu1" class="tab-pane fade in active">
        <h4>
          <button class="btn btn-xs btn-default pull-right" type="button" onclick="printSummary(this);" data-id="<?php echo $data['id_pengajuan'];?>" ><i class="fa fa-print"></i></button>
          <img src="http://baryon-hp.com//aset/images/BHP.png" align="right" alt="Mountain">
        </h4>
        <div class="col-xs-4">
        </div>
        <hr>
        <div class="table-responsive">
          <table class="table" >
            <thead>
              <tr>
                <td>No.</td>
                <td>:</td>
                <td><?php echo $data['no_pengajuan'];?></td>
              </tr>
              <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td><?php echo $data['lampiran'];?></td>
              </tr>
              <tr>
                <td>Perihal</td>
                <td>:</td>
                <td><?php echo $data['perihal'];?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php echo date_format(date_create($data['date_add']),'d F Y');?></td>
              </tr>
            </thead>
          </table>
          <p> Sehubungan dengan perjalanan dinas yang telah dilakukan, berikut ini diajukan biaya pengganti sebagai berikut: </p>
          <table class="table">
            <thead>
              <tr>
                <td>Pelaksanaan Tugas </td>
                <td>:</td>
                <td><?php echo $data['pelaksana'] ;?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php echo date_format(date_create($data['tanggal_pelaksanaan']),'d/m/Y');?></td>
              </tr>
              <tr>
                <td>Nominal Biaya </td>
                <td>:</td>
                <td><?php echo number_format($data['nominal_biaya']) ;?></td>
              </tr>
              <tr>
                <td>Tujuan Penggunaan </td>
                <td>:</td>
                <td><?php echo $data['tujuan_penggunaan'] ;?></td>
              </tr>
              <tr>
                <td>Keterangan </td>
                <td>:</td>
                <td><?php echo $data['keterangan'] ;?></td>
              </tr>
            </thead>
          </table>
          <small><i>*Jika biaya entertain, wajib diisi dengan pihak siapa serta perkiraan manfaat manfaat yang akan diperoleh perusahaan</i></small>
          <p>Demikian pengajuan biaya ini saya sampaikan dengan sebenar-benarnya, dan secara pribadi siap mempertanggung jawabkan jika dikemudian hari diperlukan penjelasan.</p>
          <br>
          <div class="col-xs-12">
            <table style="width: 100%;">
              <tr>
                <td>
                  <p>&nbsp; Pemohon, </p>
                  <br><br><br>
                  <p>&nbsp;(<span style="color:#ffffff;">nsmapemohon </span>)</p>
                </td>
                <td align="right">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align:center;">MAKER</th>
                        <th style="text-align:center;">CHECKER</th>
                        <th style="text-align:center;">SIGNER</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="height: 105px;"></td>
                        <td style="height: 105px;"></td>
                        <td style="height: 105px;"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h4>Logs Data</h4>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>Action</th>
                <th>Comment</th>
                <th>By</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
                foreach($logs as $log){

              ?>
              <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo date_format(date_create($log['date_add']),'d/m/Y') ;?></td>
                <td><?php echo $log['nama_to'] ;?></td>
                <td><?php echo $log['nama_from'] ;?></td>
                <td>
                    <?php
                          $action_arr = array('Pending','Approve','Reject');
                          echo $action_arr[$log['action']];
                    ?>
                </td>
                <td><?php echo $log['comment'] ;?></td>
                <td><?php echo $log['nama_user'] ;?></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>

    </div>

  </div>
</div>

<script type="text/javascript">
function printSummary(btn){
  var id = $(btn).data('id');
  window.open('<?php echo site_url();?>/pengajuan_biaya/printsummary/'+id,'_blank');
}
</script>
