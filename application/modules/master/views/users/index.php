
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">&nbsp;</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default btn-xs" href="{site_url}/master/users/create"><i class="fa fa-plus"></i> Tambah User</a>
				</div>
			</div>
			<div class="box-body">
				<table id="datatables" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Akses</th>
							<th>Foto TTD</th>
							<th>Option</th>
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
	        ajax: { url: '{site_url}/master/users/ajax_list', type: 'POST' },
	        columns: [
	            {"data": "id", "className": "detail text-center", "width": "10%"},
	            {"data": "nama"},
	            {"data": "username"},
	            {"data": "nama_akses"},
	            {"data": "foto_ttd"},
	            {"data": "option"},
	        ],
	        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	        	$("td:eq(0)", nRow).html('<button class="btn btn-default btn-xs">#'+aData['id']+'</button>');
            $("td:eq(4)", nRow).html('<img src="{base_url}uploads/users/ttd/'+aData['foto_ttd']+'" width="120" style="height: auto !important">');

            var option = '';
	        	option += '<a class="btn btn-success btn-xs" href="{site_url}master/users/edit/'+aData['id']+'"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;';
	        	option += '<a class="btn btn-danger btn-xs" href="{site_url}master/users/delete/'+aData['id']+'" onclick="return confirm(\'{deleteconfirmmsg}\')"><i class="fa fa-trash-o"></i> Delete</a>';
	        	$("td:eq(5)", nRow).html(option);
	            return nRow;
	        }
	    })
	})

	$('#datatables tbody').on('click','td.detail', function(){
	    t = $('#datatables').DataTable()
	    alert( t.cell( t.row().index(),1 ).data() )

	})
</script>
