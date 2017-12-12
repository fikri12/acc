
<form class="form-horizontal" action="{site_url}/master/posisikas/save" method="POST">
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
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-edit"></i></div>
						<input type="text" name="tanggal" class="form-control date" id="tanggal" value="{tanggal}">
					</div>
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
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
		</div>
	</div>
</form>