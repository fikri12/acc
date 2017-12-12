
<form class="form-horizontal" action="{site_url}/transaksi/piutang/save" method="POST">
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
						<input readonly type="text" class="form-control" id="no" name="no" placeholder="No" value="{no}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
				<div class="col-sm-6">
					<div class="input-group date">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<input type="text" name="tanggal" class="form-control" id="tanggal" value="{tanggal}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="proyek" class="col-sm-3 control-label">Nama Proyek</label>
				<div class="col-sm-6">
					<select name="proyek" id="proyek" class="form-control select2">
						<option selected="">Pilih Opsi</option>
						<? foreach(get_all_where('mproyek', array('tipe' => 2) ) as $u): ?>
							<option value="<?= $u->no ?>" <?= ($u->no == $proyek) ? 'selected' : '' ?> ><?= $u->nama ?></option>								
						<? endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="progres" class="col-sm-3 control-label">Progres</label>
				<div class="col-sm-4">
					<div class="input-group">
						<div class="input-group-addon">%</div>
						<input type="text" class="form-control" id="progres" name="progres" placeholder="Progres" value="{progres}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="dibayar" class="col-sm-3 control-label">Dibayar</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control" id="dibayar" name="dibayar" placeholder="0" value="{dibayar}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="terbayar" class="col-sm-3 control-label">Terbayar</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input readonly type="text" class="form-control" id="terbayar" name="terbayar" placeholder="0" value="{terbayar}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="sisapiutang" class="col-sm-3 control-label">Sisa Utang</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input readonly type="text" class="form-control" id="sisapiutang" name="sisapiutang" placeholder="0" value="{sisapiutang}">
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
	$(document).on('change','#proyek', function(){
		var n = $(this).val();
		$.getJSON("{site_url}/transaksi/piutang/total_saldo/"+n, function(data){
			$('#sisapiutang').val(data.sisapiutang)
			$('#terbayar').val(data.terbayar)
			$('#progres').val(data.progres)
			$('#dibayar').val(0)
			$('#progres').val(data.progres)
		})
	})

	$(document).on('keyup','#dibayar', function(){
		var n = parseFloat($(this).val());

		$.getJSON("{site_url}/transaksi/piutang/total_saldo/"+$('#proyek').val(), function(data){
			var sisapiutang = parseFloat(data.sisapiutang)
			var terbayar = parseFloat(data.terbayar)
			if(n > sisapiutang) {
				alert('nominal terlalu besar')
				$('#dibayar').val(0)
				$('#terbayar').val(terbayar)
				$('#sisapiutang').val(sisapiutang)
			} else {
				var totalterbayar = n+terbayar;
				if($('#terbayar').val(totalterbayar)) {					
					$('#sisapiutang').val(data.piutang - totalterbayar)
				}
			}
		})

	})
</script>