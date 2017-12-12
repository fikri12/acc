<div class="row"> 
	<div class="col-md-12"> 
		<div class="box"> 
			<div class="box-header with-border"> 
				<h3 class="box-title">&nbsp;</h3> 
				<div class="box-tools pull-right"> 
					<a class="btn btn-default btn-xs" href="{site_url}/master/posisikas/create"><i class="fa fa-plus"></i> Tambah Posisi</a> 
				</div> 
			</div> 
			<div class="box-body"> 
				<table id="datatables" class="table"> 
					<thead> 
						<tr> 
							<th>No</th> 
							<th>Tanggal</th> 
							<th>Nominal</th>
						</tr> 
					</thead> 
					<tbody></tbody> 
				</table> 
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
	        order: [ [0,'desc'] ],
	        ajax: { url: '{site_url}/master/posisikas/ajax_list', type: 'POST' },
	        columns: [
	            {"data": "no", "className": "detail text-center", "width": "15%"},
	            {"data": "tanggal"},
	            {"data": "nominal"}
	        ],
	        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	        	$("td:eq(0)", nRow).html('<button class="btn btn-default btn-xs">'+aData['no']+'</button>');
	        	$("td:eq(2)", nRow).html(number(aData['nominal']));
	            return nRow;
	        }
	    })
	})

	$('#datatables tbody').on('click','td.detail', function(){
	    t = $('#datatables').DataTable()
	    alert( t.cell( t.row().index(),1 ).data() )

	})	
</script>