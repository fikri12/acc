
<form class="form-horizontal" action="{site_url}/master/rekanan/save" method="POST">
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
				<label for="alamat" class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-6">
					<textarea class="textarea form-control" name="alamat" placeholder="Place some text here">{alamat}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="kota" class="col-sm-3 control-label">Kota</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control" id="kota" name="kota" placeholder="kota" value="{kota}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="provinsi" class="col-sm-3 control-label">Provinsi</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="{provinsi}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="telepon" class="col-sm-3 control-label">Telepon</label>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" class="form-control" id="telepon" name="telepon" placeholder="telepon" value="{telepon}">
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
		</div>
	</div>
</form>