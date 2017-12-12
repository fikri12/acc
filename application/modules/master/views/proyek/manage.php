
<form class="form-horizontal" action="{site_url}/master/proyek/save" method="POST">
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
				<label for="nama" class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" name="nama" class="form-control" id="nama" value="{nama}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="tipe" class="col-sm-3 control-label">Tipe</label>
				<div class="col-sm-6">
					<select name="tipe" id="tipe" class="form-control select2">
						<option selected="">Pilih Opsi</option>
						<option value="1">Utang</option>
						<option value="2">Piutang</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="rekanan" class="col-sm-3 control-label">Rekanan</label>
				<div class="col-sm-6">
					<select name="rekanan" id="rekanan" class="form-control select2">
						<option selected="">Pilih Opsi</option>
						<? foreach(get_all_where('mrekanan', array('staktif' => 1) ) as $r): ?>
							<option value="<?= $r->no ?>" <?= ($r->no == $rekanan) ? 'selected' : '' ?> ><?= $r->nama ?></option>
						<? endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="nominal" class="col-sm-3 control-label">Nominal</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" name="nominal" class="form-control number" id="nominal" value="{nominal}">
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