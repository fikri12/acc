
<form class="form-horizontal" action="{site_url}master/users/save" method="POST" enctype="multipart/form-data">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{title}</h3>
		</div>
		<div class="box-body">
			<input type="hidden" id="id" name="id" value="{id}">

			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" name="nama" class="form-control" id="nama" value="{nama}">
				</div>
			</div>
      <div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Username</label>
				<div class="col-sm-6">
						<input type="text" name="username" class="form-control" id="username" value="{username}" onblur="cekUsername(this);">
            <span id="username-note"></span>
        </div>
			</div>
      <div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-6">
						<input type="password" name="password" class="form-control" id="password" value="">
            <?php if(!empty($password)){ ?>
              <small><i>* Note remains empty if not wish to change password</i></small>
            <?php } ?>

				</div>
			</div>
			<div class="form-group">
				<label for="tipe" class="col-sm-3 control-label">Akses</label>
				<div class="col-sm-6">
					<select name="akses" id="akses" class="form-control select2">
						<option selected="">Pilih Akses</option>
            <?php foreach($list_akses as $aks){ ?>
              <option value="<?php echo $aks['id'];?>" <?php echo $aks['id'] == $akses ? 'selected' : '';?>><?php echo $aks['nama'] ;?></option>
            <?php } ?>

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="nominal" class="col-sm-3 control-label">Foto TTD</label>
				<div class="col-sm-6">
					<input type="file" name="foto_ttd" class="" id="foto_ttd" value="">
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button id="btn-submit" type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
		</div>
	</div>
</form>

<script>
function cekUsername(input){
  var here_val = $(input).val();
  $('#username-note').html('<label class="label label-info">Loading...</label>');
  $('#btn-submit').addClass('disabled');
  $.ajax({
    url : '<?php echo site_url().'master/users/cek_username';?>',
    data:{
      id : $('#id').val(),
      value : here_val
    },
    method : 'post',
    dataType: 'json',
    success: function(data){
      $('#username-note').html('<label class="label label-danger">Username Exists</label>');
      if(data.code == '0'){
        $('#username-note').html('');
        $('#btn-submit').removeClass('disabled');
      }
    },
    error: function(jqXHR, textStatus, errorThrown){
      $('#username-note').html('<label class="label label-danger">Error, Try again</label>');
      $('#btn-submit').addClass('disabled');
    }
  });
}

</script>
