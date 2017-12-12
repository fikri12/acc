
	<div class="row"> 
		<div class="col-md-12"> 
			<div class="box"> 
				<div class="box-header with-border"> 
					<h3 class="box-title">&nbsp;</h3> 
					<div class="box-tools pull-right"> 
						<a class="btn btn-default btn-xs" href="{site_url}/transaksi/piutang/create"><i class="fa fa-plus"></i> Tambah Piutang</a> 
					</div> 
				</div> 
				<div class="box-body"> 
					<table id="datatables" class="table"> 
						<thead> 
							<tr> 
								<th>No</th> 
								<th>Tanggal</th> 
								<th>Proyek</th> 
								<th>Progres</th> 
								<th>Dibayar</th> 
								<th>Terbayar</th> 
								<th>Sisa Piutang</th>
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
	        ajax: { url: '{site_url}/transaksi/piutang/ajax_list', type: 'POST' },
	        columns: [
	            {"data": "no", "className": "detail text-center", "width": "10%"},
	            {"data": "tanggal"},
	            {"data": "nama"},
	            {"data": "progres"},
	            {"data": "dibayar"},
	            {"data": "terbayar"},
	            {"data": "sisapiutang"},
	        ],
	        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	        	$("td:eq(0)", nRow).html('<button class="btn btn-default btn-xs">'+aData['no']+'</button>');
	        	$("td:eq(4)", nRow).html(number(aData['dibayar']));
	        	$("td:eq(5)", nRow).html(number(aData['terbayar']));
	        	$("td:eq(6)", nRow).html(number(aData['sisapiutang']));
	        	$("td:eq(3)", nRow).html(aData['progres']+'%');
	            return nRow;
	        }
	    })
	})

	$('#datatables tbody').on('click','td.detail', function(){
	    t = $('#datatables').DataTable()
	    alert( t.cell( t.row().index(),1 ).data() )

	})	
</script>