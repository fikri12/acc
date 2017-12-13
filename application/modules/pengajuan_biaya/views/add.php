
<form class="form-horizontal" action="{site_url}pengajuan_biaya/save" method="POST">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{title}</h3>
			<br>
			*Jika biaya entertain, wajib diisi dengan pihak siapa serta perkiraan manfaat manfaat yang akan diperoleh perusahaan
		</div>
		<div class="box-body">
			<input type="hidden" name="id" value="{id}">
			<div class="form-group">
				<label for="no" class="col-sm-3 control-label">No</label>
				<div class="col-sm-6">

					<input readonly type="text" class="form-control" id="no" name="no" placeholder="Akan diisi maker" value="{no}">

				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Lampiran</label>
				<div class="col-sm-6">

						<input type="text" name="lampiran" class="form-control" id="lampiran" value="{lampiran}">

				</div>
			</div>
      <div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Perihal</label>
				<div class="col-sm-6">
					<input type="text" name="perihal" class="form-control" id="perihal" value="{perihal}" disabled>
				</div>
			</div>
      <div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Pelaksana</label>
				<div class="col-sm-6">
					<input type="text" name="pelaksana" class="form-control" id="pelakssana" value="{pelaksana}">
				</div>
			</div>
      <div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="text" name="tanggal" class="form-control datepicker" id="tanggal" value="{tanggal}">
				</div>
			</div>

			<div class="form-group">
				<label for="nominal" class="col-sm-3 control-label">Nominal</label>
				<div class="col-sm-6">
					<input type="text" name="nominal" class="form-control number" id="nominal" value="{nominal}">
				</div>
			</div>
      <div class="form-group">
				<label for="keterangan" class="col-sm-3 control-label">Tujuan Penggunaan</label>
				<div class="col-sm-6">
					<textarea class="textarea form-control" name="tujuan_penggunaan" placeholder="Place some text here">{tujuan_penggunaan}</textarea>
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
  $('.datepicker').datepicker({
    format : 'yyyy/mm/dd'
  });
});
</script>
