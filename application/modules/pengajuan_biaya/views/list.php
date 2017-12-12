
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">&nbsp;</h3>
				<div class="box-tools pull-right">
          <?php if($this->session->userdata('akses') == '2'){ ?>
					       <a class="btn btn-default btn-xs" href="{site_url}pengajuan_biaya/create"><i class="fa fa-plus"></i> Buat Pengajuan</a>
          <?php } ?>
        </div>
			</div>
			<div class="box-body">
				<table id="datatables" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal</th>
							<th>No. Pengajuan</th>
							<th>Perihal</th>
							<th>Nominal</th>
							<th>Posisi</th>
							<th>Status</th>
							<th>Dibuat Oleh</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modalConfrimation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalConfrimationTitle"></h4>
      </div>
      <div class="modal-body" id="modalConfrimationBody">

      </div>
      <div class="modal-footer">
        <button type="button" id="btn-save" class="btn btn-primary" onclick="submitForm('form-confirm');">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modalDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalDetailTitle"></h4>
      </div>
      <div class="modal-body" id="modalDetailBody">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="{adminlte}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{adminlte}plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	var t;

	$(document).ready(function(){
	    t = $('#datatables').DataTable({
	        pageLength: 50,
	        serverSide: true,
	        autoWidth: false,
	        order: [ [0,'asc'] ],
	        ajax: { url: '{site_url}pengajuan_biaya/ajax_list', type: 'POST' },
	        columns: [
	            {"data": "id_pengajuan", "className": "detail text-center", "width": "10%"},
	            {"data": "date_add"},
	            {"data": "no_pengajuan"},
	            {"data": "perihal"},
	            {"data": "nominal_biaya"},
	            {"data": "nama_akses"},
	            {"data": "status"},
	            {"data": "nama_user"},
	            {"data": "option"},
	        ],
	        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	        	$("td:eq(0)", nRow).html('<button class="btn btn-default btn-xs">#'+aData['id_pengajuan']+'</button>');
	        	$("td:eq(4)", nRow).html(number(aData['nominal_biaya']));


	        	/*if(aData['action'] == 1 && aData['position'] == '<?php echo $this->session->userdata('akses');?>') {
	        		$("td:eq(6)", nRow).html('<button disabled class="btn btn-success btn-xs">Approved</button>')
	        	} else if(aData['action'] == 2 && aData['position'] == '<?php echo $this->session->userdata('akses');?>') {
	        		$("td:eq(6)", nRow).html('<button disabled class="btn btn-danger btn-xs">Rejected</button>')
	        	}else*/ if(aData['action'] == 1 &&  aData['position'] == 7){
              $("td:eq(6)", nRow).html('<button disabled class="btn btn-success btn-xs">Approved</button>')
            }else{
              $("td:eq(6)", nRow).html('<button disabled class="btn btn-default btn-xs">Pending</button>')
            }

            if(aData['position'] == '7'){
              $("td:eq(5)", nRow).html('<button disabled class="btn btn-primary btn-xs">Finish</button>')
            }

	        	var option = '';
            if('<?php echo $this->session->userdata('akses');?>' == aData['position'] && '<?php echo $this->session->userdata('akses');?>' != '2'){
              option += '<a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="return confirmation(\'approval\',\''+aData['id_pengajuan']+'\')"><i class="fa fa-check"></i> konfirmasi</a>&nbsp;&nbsp;';
            }
	        	option += '<a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="return detail(\'Detail\',\''+aData['id_pengajuan']+'\')"><i class="fa fa-list"></i> Detail</a>';
	        	$("td:eq(8)", nRow).html(option);
	            return nRow;
	        }
	    });

      $('.sidebar-toggle').click();
	})

	$('#datatables tbody').on('click','td.detail', function(){
	    t = $('#datatables').DataTable()
	    alert( t.cell( t.row().index(),1 ).data() )

	});

  function confirmation(title,id){
    $('#modalConfrimationTitle').html(title);

    $.ajax({
      url : '{site_url}pengajuan_biaya/approval/'+id,
      method: 'get',
      dataType: 'html',
      success: function(data){
        $('#modalConfrimationBody').html(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    }).done(function(){
        $('#modalConfrimation').modal('show');
    });
  }

  function detail(title,id){
      $('#modalDetailTitle').html(title);
    $.ajax({
      url : '{site_url}pengajuan_biaya/detail/'+id,
      method: 'get',
      dataType: 'html',
      success: function(data){
        $('#modalDetailBody').html(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    }).done(function(){
        $('#modalDetail').modal('show');
    });

  }

  function submitForm(id_form){
    console.log('aa');
    var here_form = $('#'+id_form);
    var post_url = here_form.attr('action');
    var post_data = here_form.serialize();

    $('#btn-save').addClass('disabled');
    $('#btn-save').html('Saving...');
    $.ajax({
      url : post_url,
      method: 'post',
      data : post_data,
      dataType: 'json',
      processData: false,
      success : function(data){
        if(data.code == '1'){
          $('#datatables').DataTable().ajax.reload();
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        $('#btn-save').removeClass('disabled');
        $('#btn-save').html('Save');
      }
    }).done(function(){
      $('#modalConfrimation').modal('hide');
      $('#btn-save').removeClass('disabled');
      $('#btn-save').html('Save');
    });

  }
</script>
