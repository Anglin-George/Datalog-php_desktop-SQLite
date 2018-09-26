<?php 
  $nav = 'home';
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

<form method="post"  id="upmember">
<div class="modal fade " id="myModal">
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="color-line"></div>
      <div class="modal-header" id="txtModelHeaderr">
        <h4 class="modal-title text-left">Update Member</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
     <!--  <form data-toggle="validator" role="form"> -->
         <div class="modal-body" id="txtmodel">

          <div class="form-group">
              
               <input type="hidden" class="form-control" name="memberid" id="memberid" required readonly>  
            </div>
            <div class="form-group">
               <label>Membership No</label>
               <input type="text" class="form-control" name="membershipno" id="membershipno" required> 
               <label>Member Name</label>
               <input type="text" class="form-control" name="membername" id="membername" required>  
               <label>Mobile Number</label>
               <input type="text" maxlength="10" class="form-control" name="mobile" id="mobile" onkeypress="return mobilevalidation(this,event);" required>
               <label>Mobile Address</label>
               <textarea class="form-control" name="address" id="address" required></textarea>
               <label>Date Of Join</label>
               <input type="date" class="form-control" name="doj" id="doj" required>
               <label>State :</label>
                <select class="form-control" name="state" id="state" required onchange="statechange(this.value)">                            
                </select>
                <label>District :</label>
                <select class="form-control" name="district" id="district" onchange="districtchange(this.value)" required>                            
                </select>
                <label>Block :</label>
                <select class="form-control" name="block" id="block" onchange="blockchange(this.value)" required>                            
                </select>
                <label>Unit :</label>
                <select class="form-control" name="unit" id="unit" required>                            
                </select>
            </div>               
            <div class="">
               <button class="btn btn-success ladda-button" data-style="slide-up" type="submit">Update State</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
         </div>
    <!--   </form> -->
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- Vendor scripts -->
</div>
</form>

<?php
  require 'footer.php';
?>
<script type="text/javascript">
  $( document ).ready(function() {
    bindmember();
    $('#tabItemDetail').DataTable({"scrollX": true})
  });

function mobilevalidation(textbox, e) {

    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode == 46 || charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }
  }

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
                  html = html + '<a href="#!"class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#myModal" onclick="Edititems(' + val.tbl_member_id + ')"> ';
                  html = html + '<span class="la la-edit">';
                  html = html + '</span>';
                  html = html + '</a>';
                  html = html + '<a href="#!"class="btn btn-danger btn-circle btn-sm" onclick="DeleteItemRow(' + val.tbl_member_id + ')">';
                  html = html + '<span class="la la-trash">';
                  html = html + '</span>';
                  html = html + '</a>';
                  html = html + '</td>';
                  html = html + '</tr>';
                }
              });
              $('.cssload-container').hide();
              $("#itemdetailscontent").html(html);
              $table = $('#tabItemDetail').DataTable();
              $('#data-table-show-id').show();
          }
      });    
  }

function DeleteItemRow(id) {
  data = { tbl_member_id: id };
  swal({
      title: "Are you sure?",
      text: "You will not be able to recover this Item!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel Please!",
      closeOnConfirm: false,
      closeOnCancel: false
  },
  function(isConfirm) {

      if (isConfirm) {
          $.ajax({
              type: "POST",
              data: data,
              url: 'ajaxmemberdelete.php',
              success: function(result) {
                  swal("Deleted!", "Selected Item has been deleted.", "success");
                  bindmember();
              }
          })
      } else {
          swal("Cancelled", "Selected Item is safe :)", "error");
      }

  }); 
  }

function Edititems(id) {
      var district = '';
      var blockhtml = '';
      var unithtml = '';
      $("#district").html(district);
      $("#block").html(blockhtml);
      $("#unit").html(unithtml);
      bindstateoption();
      data = { tbl_member_id: id };
      $.ajax({
          type: "POST",
          data: data,
          url: "ajaxmemberedit.php",
          dataType: 'json',
          success: function(result) {              
              $('#memberid').val(result.tbl_member_id);
              $('#membershipno').val(result.tbl_member_no);
              $('#membername').val(result.tbl_member_name);
              $('#mobile').val(result.tbl_member_mobile);
              $('#address').val(result.tbl_member_address);
              $('#doj').val(result.tbl_member_doj);
             }
      });
  }

 $('#upmember').submit(function(e){
      e.preventDefault(); 
      var memberid = $('#memberid').val();
      var membershipno = $("#membershipno").val();
      var membername = $("#membername").val();
      var mobile = $("#mobile").val();
      var address = $("#address").val();
      var doj = $("#doj").val();
      var state = $("#state").val();
      var district = $("#district").val();
      var block = $("#block").val();
      var unit = $("#unit").val();
      if(membershipno.trim() != '' && membername.trim() != '' && mobile.trim() != '' && address.trim() != '' && doj.trim() != '' && state.trim() != '' && district.trim() != ''&& block.trim() != '' && unit.trim() != '') {
     $.ajax({
         url: 'ajaxmemberupdate.php',
         type:"POST",
         data:new FormData(this),
         processData:false,
         contentType:false,
         cache:false,
         async:true,
          success: function(result) {
                  if (result) {
                      toastr.success('Updated successfully');
                      bindmember()
                      $('#myModal').modal('hide');
                  } else {
                      toastr.error('Updation Failed');
                  }
              }
          })
      } else {
         
          toastr.error('Please fill all fields');
      }
  
     });

  function bindstateoption() {
    url = 'ajaxstate.php';
    $.ajax({
          type: "GET",
          data: null,
          url: url,
          dataType: 'json',
          success: function(result) {
              var html = '<option value="0">Select State</option>';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_state_id+'">';
                  html = html + val.tbl_state_name;
                  html = html + '</option>';
                }
              });
              $("#state").html(html);
          }
      });    
  }

  function statechange(state) {
 data = { tbl_state_id : state};
 url = 'ajaxstatechange.php';
    $.ajax({
          type: "POST",
          data: data,
          url: url,
          dataType: 'json',
          success: function(result) {
              var blockhtml = '';
              var unithtml = ''; 
              var html = '<option value = "0">Select District</option>';
              $.each(result, function(key, val) {
                if(val!=false)
                {                  
                  html = html + '<option value ="'+ val.tbl_district_id+'">';
                  html = html + val.tbl_district_name;
                  html = html + '</option>';
                }
              });
              $("#district").html(html);
              $("#block").html(blockhtml);
              $("#unit").html(unithtml);
          }
      });
}

function districtchange(district) {
  data = { tbl_district_id : district};
  url = 'ajaxdistrictchange.php';
    $.ajax({
          type: "POST",
          data: data,
          url: url,
          dataType: 'json',
          success: function(result) {
              var unithtml = ''; 
              var html = '<option value = "0">Select Block</option>';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_block_id+'">';
                  html = html + val.tbl_block_name;
                  html = html + '</option>';
                }
              });
              $("#block").html(html);
              $("#unit").html(unithtml);
          }
      });
}

function blockchange(block) {
  data = { tbl_block_id : block};
  url = 'ajaxblockchange.php';
    $.ajax({
          type: "POST",
          data: data,
          url: url,
          dataType: 'json',
          success: function(result) {
              var html = '';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_unit_id+'">';
                  html = html + val.tbl_unit_name;
                  html = html + '</option>';
                }
              });
              $("#unit").html(html);
          }
      });
}

</script>