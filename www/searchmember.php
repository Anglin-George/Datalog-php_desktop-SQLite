<?php 
  $nav = 'searchmember';
  require 'header.php';
?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-body"><!-- Basic Inputs start -->
<section class="basic-inputs">
  <div class="row match-height">
      <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">View Members Details</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                      <div class="cssload-container" style="display: none">
                      <div class="cssload-speeding-wheel"></div>
                    </div>
                    <div id="data-table-show-id">
                      <table class="table table-striped table-bordered js-exportable" id="tabItemDetail"  style="display:block">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>MemNo</th>
                              <th>Name</th>                              
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>DOJ</th>
                              <th>State</th>
                              <th>District</th>
                              <th>Block</th>
                              <th>Unit</th>
                              <th>UpdatedOn</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                         <tbody id="itemdetailscontent"></tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Basic Inputs end -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
  require 'footer.php';
?>
<script type="text/javascript">
  $( document ).ready(function() {
    bindmember();
  });

  function bindmember() {
    $('#data-table-show-id').hide();
    $('.cssload-container').show();
    url = 'ajaxmember.php';
    $.ajax({
          type: "GET",
          data: null,
          url: url,
          dataType: 'json',
          success: function(result) {
              var html = '';
              var i=0;
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<tr>';
                  html = html + '<td>' + ++i + '</td>';
                  html = html + '<td>' + val.tbl_member_no + '</td>';
                  html = html + '<td>' + val.tbl_member_name + '</td>';
                  html = html + '<td>' + val.tbl_member_address + '</td>';
                  html = html + '<td>' + val.tbl_member_mobile + '</td>';
                  html = html + '<td>' + val.tbl_member_doj + '</td>';
                  html = html + '<td>' + val.tbl_state_name + '</td>';
                  html = html + '<td>' + val.tbl_district_name + '</td>';
                  html = html + '<td>' + val.tbl_block_name + '</td>';
                  html = html + '<td>' + val.tbl_unit_name + '</td>';
                  html = html + '<td>' + val.Updated_On + '</td>';
                  html = html + '<td class="action-col">';
                  html = html + '<a href="#!"class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#myModal" onclick="Edititems(' + val.tbl_state_id + ')"> ';
                  html = html + '<span class="la la-edit">';
                  html = html + '</span>';
                  html = html + '</a>';
                  html = html + '<a href="#!"class="btn btn-danger btn-circle btn-sm" onclick="DeleteItemRow(' + val.tbl_state_id + ')">';
                  html = html + '<span class="la la-trash">';
                  html = html + '</span>';
                  html = html + '</a>';
                  html = html + '</td>';
                  html = html + '</tr>';
                }
              });
              $('.cssload-container').hide();
              $("#itemdetailscontent").html(html);
              $table = $('#tabItemDetail').DataTable({"scrollX": true});
              $('#data-table-show-id').show();
          }
      });    
  }
</script>