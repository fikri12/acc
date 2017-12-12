
<form class="form-horizontal" action="{site_url}/transaksi/cashflow/save" method="POST">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{title}</h3>
		</div>
		<div class="box-body">
			<input type="hidden" name="id" value="{id}">
			<div class="form-group">
				<label for="no" class="col-sm-3 control-label">No</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input readonly type="text" class="form-control" id="no" name="no" placeholder="0" value="{no}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="0" value="{tanggal}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="debet" class="col-sm-3 control-label">Cash OUT</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control number" id="debet" name="debet" placeholder="0" value="{debet}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="kredit" class="col-sm-3 control-label">Cash IN</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control number" id="kredit" name="kredit" placeholder="0" value="{kredit}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="posisi" class="col-sm-3 control-label">Cash Position</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input readonly type="text" class="form-control number" id="posisi" name="posisi" placeholder="0" value="{posisi}">
					</div>
				</div>
			</div>
			<div class="form-group" hidden>
				<label for="saldoposisi" class="col-sm-3 control-label">Posisi Saat Ini</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input disabled type="text" class="form-control" id="saldoposisi" name="saldoposisi" placeholder="0" value="0">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
				<div class="col-sm-6">
					<textarea class="textarea form-control" name="keterangan" placeholder="Place some text here">{keterangan}</textarea>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
		</div>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$.getJSON('{site_url}/transaksi/cashflow/max_posisicashflow', function(data){
			$('#saldoposisi').val(data)
		})
	})
	$(document).on('keyup','#debet, #kredit', function(){
		var debet = parseFloat($('#debet').val().replace(/,/g, ''))
		var kredit = parseFloat($('#kredit').val().replace(/,/g, ''))
		var saldoposisi = parseFloat($('#saldoposisi').val().replace(/,/g, ''))
		var abs = Math.abs(debet-kredit)
		if(debet > kredit) {
			$('#posisi').val(number(saldoposisi-abs))
		} else {
			$('#posisi').val(number(saldoposisi+abs))			
		}
	})
</script>