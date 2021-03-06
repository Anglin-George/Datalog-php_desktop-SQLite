<?php
  $nav = 'addmember';
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
                  <h4 class="card-title">Add Member Details</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                    <form method="post" id="member-add">
                      <fieldset class="form-group">
                          <label>Membership Number :</label>
                          <input type="text" name="tbl_member_no" id="tbl_member_no" class="form-control" placeholder="Membership Number" required>
                          <label>Member Name :</label>
                          <input type="text" name="tbl_member_name" id="tbl_member_name" class="form-control" placeholder="Member Name" required>
                          <label>Nominee  :</label>
                          <input type="text" name="tbl_member_nominee" id="tbl_member_nominee" class="form-control" placeholder="Nominee Name" >
                          <label>Mobile Number :</label>
                          <input type="text" name="tbl_member_mobile" id="tbl_member_mobile" class="form-control" placeholder="Mobile Number" maxlength="10" onkeypress="return mobilevalidation(this,event);" >
                          <label>Member Address :</label>                          
                          <textarea class="form-control" name="tbl_member_address" id="tbl_member_address" placeholder="Member Address" required></textarea>
                          <label>Date of join : (mm/dd/yy)</label>
                          <input type="date" name="tbl_member_doj" id="tbl_member_doj" class="form-control" required>
                          <label>State :</label>
                          <select class="form-control" name="tbl_member_state" id="state" required onchange="statechange(this.value)">                            
                          </select>
                          <label>District :</label>
                          <select class="form-control" name="tbl_member_district" id="district" onchange="districtchange(this.value)" required>                            
                          </select>
                          <label>Niyojaka Mandalam :</label>
                          <select class="form-control" name="tbl_member_niyojakamandalam" id="niyojakamandalam" onchange="niyojakachange(this.value)" required>                            
                          </select>
                          <label>Mandalam :</label>
                          <select class="form-control" name="tbl_member_mandalam" id="mandalam" onchange="mandalamchange(this.value)" required>                            
                          </select>
                          <label>Unit :</label>
                          <select class="form-control" name="tbl_member_unit" id="unit" required>                            
                          </select>
                          
                          <label>Certificate Issue :</label>
                          <br>
                          <label>
                          <input type="radio"  name="tbl_member_certificate" value="1" checked="" id="certificate"> Yes
                          </label>
                          <label>
                          <input  type="radio"  name="tbl_member_certificate" value="0" id="certificate"> No

                          </label>

                          <br>

                          <label>Admission Fee :</label>
                          <br>
                          <label>
                          <input type="radio"  name="tbl_member_admission" value="1" checked="" id="fee"> Yes
                          </label>
                          <label>
                          <input  type="radio" name="tbl_member_admission" value="0" id="fee"> No

                          </label>
                          <br>
                          <input type="submit" name="Save" value="Save" class="btn btn-primary btn-min-width mr-1 mb-1">
                      </fieldset>
                    </form>
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

<?php
  require 'footer.php';
?>
<script type="text/javascript">
  $( document ).ready(function() {
    bindstateoption();     
});

$('#member-add').submit(function(e){
        e.preventDefault();    
        var tbl_member_no = $("#tbl_member_no").val();
        var tbl_member_name = $("#tbl_member_name").val();
        var tbl_nominee_name=$("#tbl_member_nominee").val();
        var tbl_member_mobile = $("#tbl_member_mobile").val();
        var tbl_member_address = $("#tbl_member_address").val();
        var tbl_member_doj = $("#tbl_member_doj").val();
        var state = $("#state").val();
        var district = $("#district").val();
        var niyojakamandalam=$("#niyojakamandalam").val();
        var mandalam=$("#mandalam").val();
        var unit = $("#unit").val();
        var certificate= $("#certificate").val();
        var fee= $("#fee").val();


        if(tbl_member_no.trim() != '' && tbl_member_name.trim() != ''  &&  tbl_member_address.trim() != '' && tbl_member_doj.trim() != '' && state.trim() != '' && district.trim() != ''&& niyojakamandalam.trim() != '' && mandalam.trim() != '' && unit.trim() != '')
        {
            $.ajax({
                url: 'ajaxaddmember.php',
                type:"POST",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:true,
                success: function(result){
                    if (result) {                 
                        toastr.success('Member has been added');
                        $("#tbl_member_no").val('');
                        $("#tbl_member_name").val('');
                        $("#tbl_member_nominee").val();
                        $("#tbl_member_mobile").val('');
                        $("#tbl_member_address").val('');
                        $("#tbl_member_doj").val('');
                        $("#state").val('');
                        $("#district").val('');
                        $("#niyojakamandalam").val();
                        $("#mandalam").val();
                        $("#unit").val(''); 
                        $("#certificate").val('');
                        $("#fee").val('');
                        bindstateoption();                     
                    }
                    else
                    {
                        toastr.error('Could not be added');
                    }
                }
            });
        }else{
            toastr.error('Please fill all the field');            
        }
    });

  function mobilevalidation(textbox, e) {

    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode == 46 || charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }
  }
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
              var mandalamhtml='';
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
              $("#mandalam").html(mandalamhtml);
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
              var mandalamhtml='';
              var unithtml = ''; 
              var html = '<option value = "0">Select Niyojakamandalam</option>';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_niyojakamandalam_id+'">';
                  html = html + val.tbl_niyojakamandalam_name;
                  html = html + '</option>';
                }
              });
              $("#niyojakamandalam").html(html);
               $("#mandalam").html(mandalamhtml);
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