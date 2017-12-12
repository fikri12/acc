<div class="row">
  <form id="form-confirm" class="form-horizontal" action="<?php echo site_url();?>pengajuan_biaya/do_approval/" mehtod="post">
    <div class="col-xs-12">
      <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
      <div class="form-group">
        <label class="col-sm-3 control-label">Action</label>
        <div class="col-sm-7">
          <select class="form-control" name="action_select" onchange="action_change(this);">
            <option value="">Choose a Action</option>
            <option value="1">Approve</option>
            <option value="2">Reject</option>
          </select>
        </div>
      </div>

      <?php if($this->session->userdata('akses') == '3' && $data['position'] == '3'){ ?>
        <div class="form-group" id="row_insert_no" style="display:none;">
          <label class="col-sm-3 control-label">No.</label>
          <div class="col-sm-7">
            <input type="text" name="no_pengajuan" class="form-control" placeholder="Example : 2017/12/10/II/BP/ASDF/343">
          </div>
        </div>
      <?php } ?>

      <div class="form-group">
        <label class="col-sm-3 control-label">Comment</label>
        <div class="col-sm-7">
          <textarea name="comment" class="form-control" rows="3" placeholder="Comment"></textarea>
        </div>
      </div>


    </div>
  </form>
</div>
<script>
function action_change(input){
  var here_val = $(input).val();
  $('#row_insert_no').hide('slow');
  if(here_val == '1'){
    $('#row_insert_no').show('slow');
  }
}

</script>
