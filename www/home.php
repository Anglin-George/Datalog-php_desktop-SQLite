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
                      <table class="table table-striped table-bordered js-exportable" id="tabItemDetail"  style="display:block;overflow-x: scroll;">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>MemNo</th>
                              <th>Name</th>                              
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Nominee</th>
                              <th>DOJ</th>
                              <th>State</th>
                              <th>District</th>
                              <th>Niyojaka Mandalam</th>
                              <th>Mandalam</th>
                              <th>Unit</th>
                              <th>Certificate</th>
                              <th>Fee</th>
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
               <label>Nominee </label>
               <input type="text" class="form-control" name="nominee" id="nominee" >  
               <label>Mobile Number</label>
               <input type="text" maxlength="10" class="form-control" name="mobile" id="mobile" onkeypress="return mobilevalidation(this,event);" >
               <label> Address</label>
               <textarea class="form-control" name="address" id="address" required></textarea>
               <label>Date Of Join (mm/dd/yy)</label>
               <input type="date" class="form-control" name="doj" id="doj" required>
               <label>State :</label>
                <select class="form-control" name="state" id="state" required onchange="statechange(this.value)">                            
                </select>
                <label>District :</label>
                <select class="form-control" name="district" id="district" onchange="districtchange(this.value)" required>                            
                </select>
                <label>Niyojaka Mandalam :</label>
                <select class="form-control" name="niyojakamandalam" id="niyojakamandalam" onchange="niyojakachange(this.value)" required>                            
                </select>
                <label> Mandalam :</label>
                <select class="form-control" name="mandalam" id="mandalam" onchange="mandalamchange(this.value)" required>                            
                </select>
                <label>Unit :</label>
                <select class="form-control" name="unit" id="unit" onchange="unitchange(this.value)" required>                            
                </select>
                <label>Certificate Issue :</label>
                <br>
                <label>
                <input type="radio"  name="tbl_member_certificate" value="1" id="certificate"> Yes
                </label>
                <label>
                <input  type="radio"  name="tbl_member_certificate" value="0" id="certificate"> No

                </label>

                <br>

                <label>Admission Fee :</label>
                <br>
                <label>
                <input type="radio"  name="tbl_member_admission" value="1" id="fee"> Yes
                </label>
                <label>
                <input  type="radio" name="tbl_member_admission" value="0" id="fee"> No

                </label>
                <br>
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
                  var dateString = val.tbl_member_doj;                  
                  var dateParts = dateString.split("-");
                  var dateObject = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);   
                  if(val.tbl_member_certificate == 1 && val.tbl_member_admission == 1)
                  {
                    bg='#d8f5d8';
                  } 
                  else if(val.tbl_member_certificate == 1 || val.tbl_member_admission == 1){
                    bg = '#f5f0d8';
                  }
                  else{
                    bg = '';
                  } 
                  /*Certifiacte yes/no*/
                  if(val.tbl_member_certificate==1){ certificateyn = "Yes"}
                  else {certificateyn = "No"}             
                  /*End Certifiacte yes/no*/
                  /*Admission Fee yes/no*/
                  if(val.tbl_member_admission==1){ feeyn = "Yes"}
                  else {feeyn = "No"}             
                  /*End Admission Fee yes/no*/
                  html = html + '<tr style="background-color:'+bg+'">';
                  html = html + '<td>' + ++i + '</td>';
                  html = html + '<td>' + val.tbl_member_no + '</td>';
                  html = html + '<td>' + val.tbl_member_name + '</td>';
                  html = html + '<td>' + val.tbl_member_address + '</td>';
                  html = html + '<td>' + val.tbl_member_mobile + '</td>';
                  html = html + '<td>' + val.tbl_member_nominee + '</td>';
                  html = html + '<td>' + dateObject.toDateString() + '</td>';
                  html = html + '<td>' + val.tbl_state_name + '</td>';
                  html = html + '<td>' + val.tbl_district_name + '</td>';
                  //html = html + '<td>' + val.tbl_block_name + '</td>';
                  html = html + '<td>' + val.tbl_niyojakamandalam_name + '</td>';
                  html = html + '<td>' + val.tbl_mandalam_name + '</td>';
                  html = html + '<td>' + val.tbl_unit_name + '</td>';
                  html = html + '<td>' + certificateyn + '</td>';
                  html = html + '<td>' + feeyn + '</td>';
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
              table = $('#tabItemDetail').DataTable();              
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
      var niyojakamandalamhtml = '';
      var mandalamhtml = '';
      var unithtml = '';      
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
              $("input[name=tbl_member_certificate][value=" + result.tbl_member_certificate + "]").attr('checked', 'checked');
              $("input[name=tbl_member_admission][value=" + result.tbl_member_admission + "]").attr('checked', 'checked');
              /*State Binding*/
              statehtml = '<option value ="'+ result.tbl_state_id+'">';
              statehtml = statehtml + result.tbl_state_name;
              statehtml = statehtml + '</option>';              
                url = 'ajaxstate.php';
                $.ajax({
                      type: "GET",
                      data: null,
                      url: url,
                      dataType: 'json',
                      success: function(result) {
                          $.each(result, function(key, val) {
                            if(val!=false)
                            {
                              statehtml = statehtml + '<option value ="'+ val.tbl_state_id+'">';
                              statehtml = statehtml + val.tbl_state_name;
                              statehtml = statehtml + '</option>';
                            }
                          });
                          $("#state").html(statehtml);
                      }
                  });
              /*End State Binding*/
              /*District Binding*/
              districthtml = '<option value ="'+ result.tbl_district_id+'">';
              districthtml = districthtml + result.tbl_district_name;
              districthtml = districthtml + '</option>'; 
              $("#district").html(districthtml);
              /*End District Binding*/
              /*niyojakamandalam Binding*/
              niyojakahtml = '<option value ="'+ result.tbl_niyojakamandalam_id+'">';
              niyojakahtml = niyojakahtml + result.tbl_niyojakamandalam_name;
              niyojakahtml = niyojakahtml + '</option>'; 
              $("#niyojakamandalam").html(niyojakahtml);
              /*End niyojakamandalam Binding*/
              /*Mandalam Binding*/
              mandalamhtml = '<option value ="'+ result.tbl_mandalam_id+'">';
              mandalamhtml = mandalamhtml + result.tbl_mandalam_name;
              mandalamhtml = mandalamhtml + '</option>'; 
              $("#mandalam").html(mandalamhtml);
              /*End Mandalam Binding*/
              /*Unit Binding*/
              unithtml = '<option value ="'+ result.tbl_unit_id+'">';
              unithtml = unithtml + result.tbl_unit_name;
              unithtml = unithtml + '</option>'; 
              $("#unit").html(unithtml);
              /*End Unit Binding*/
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
      var niyojakamandalam = $("#niyojakamandalam").val();
      var mandalam = $("#mandalam").val();
      var unit = $("#unit").val();
      if(membershipno.trim() != '' && membername.trim() != '' && mobile.trim() != '' && address.trim() != '' && doj.trim() != '' && state.trim() != '' && district.trim() != ''&& niyojakamandalam.trim() != '' && mandalam.trim() != ''&& unit.trim() != '') {
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
                      $("#membershipno").val('');
                      $("#membername").val('');
                      $("#nominee").val();
                      $("#mobile").val('');
                      $("#address").val('');
                      $("#doj").val('');
                      $("#state").val('');
                      $("#district").val('');
                      $("#niyojakamandalam").val('');
                      $("#mandalam").val('');
                      $("#unit").val('');                       
                      bindmember();
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
              var niyojakamandalamhtml = '';
              var mandalam='';
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
              $("#niyojakamandalam").html(niyojakamandalamhtml);
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
              var html = '<option value = "0">Select niyojakamandalam</option>';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_niyojakamandalam_id+'">';
                  html = html + val.tbl_niyojakamandalam_name;
                  html = html + '</option>';
                }
              });
              $("#niyojakamandalam").html(html);
              $("#mandalam").html(unithtml);
              $("#unit").html(unithtml);
          }
      });
}

function niyojakachange(niyojakamandalam) {
  data = { tbl_niyojakamandalam_id : niyojakamandalam};
  url = 'ajaxniyojakamandalamchange.php';
    $.ajax({
          type: "POST",
          data: data,
          url: url,
          dataType: 'json',
          success: function(result) {
              var html = '<option value="0">Select Mandalam</option>';
              var unithtml = ''; 
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_mandalam_id+'">';
                  html = html + val.tbl_mandalam_name;
                  html = html + '</option>';
                }
              });
              $("#mandalam").html(html);
              $("#unit").html(unithtml);
          }
      });
}
function mandalamchange(mandalam) {
  data = { tbl_mandalam_id : mandalam};
  url = 'ajaxmandalamchange.php';
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