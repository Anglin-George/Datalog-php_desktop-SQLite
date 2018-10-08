<?php
  $nav = 'block';
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
                  <h4 class="card-title">Add Niyojaka Mandalam Details</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                    <form method="post" id="block-add">
                      <fieldset class="form-group">
                          <label>Select District :</label>
                          <select class="form-control" name="district" id="district"></select>
                          <label>Niyojaka Mandalam Name :</label>
                          <input type="text" name="block" id="block" class="form-control" placeholder="Block Name" required>                          
                          <br>
                          <input type="submit" name="Save" value="Save" class="btn btn-primary btn-min-width mr-1 mb-1">
                      </fieldset>
                    </form>
                  </div>
              </div>
          </div>
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Niyojaka Mandalam Details</h4>
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
                              <th>Niyojaka Mandalam</th>
                              <th>District</th>
                              <th>Actions</th>
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
<form method="post"  id="upblock">
<div class="modal fade " id="myModal">
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="color-line"></div>
      <div class="modal-header" id="txtModelHeaderr">
        <h4 class="modal-title text-left">Update Niyojaka Mandalam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
     <!--  <form data-toggle="validator" role="form"> -->
         <div class="modal-body" id="txtmodel">

          <div class="form-group">
              
               <input type="hidden" class="form-control" name="blockid" id="blockid" required readonly>  
            </div>
            <div class="form-group">
               <label>Niyojaka Mandalam Name</label>
               <input class="form-control" name="blockname" id="blockname" required>  
            </div>               
            <div class="">
               <button class="btn btn-success ladda-button" data-style="slide-up" type="submit">Update Niyojaka Mandalam</button>
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
    binddistrictoption();
    bindblock();
});

function binddistrictoption() {
    url = 'ajaxdistrict.php';
    $.ajax({
          type: "GET",
          data: null,
          url: url,
          dataType: 'json',
          success: function(result) {
              var html = '';
              $.each(result, function(key, val) {
                if(val!=false)
                {
                  html = html + '<option value ="'+ val.tbl_district_id+'">';
                  html = html + val.tbl_district_name;
                  html = html + '</option>';
                }
              });
              $("#district").html(html);
          }
      });    
  }

  function bindblock() {
    $('#data-table-show-id').hide();
    $('.cssload-container').show();
    url = 'ajaxblock.php';
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
                  html = html + '<td style="width: 50%">' + val.tbl_block_name + '</td>';
                  html = html + '<td style="width: 50%">' + val.tbl_district_name + '</td>';
                  html = html + '<td class="action-col">';
                  html = html + '<a href="#!"class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#myModal" onclick="Edititems(' + val.tbl_block_id + ')"> ';
                  html = html + '<span class="la la-edit">';
                  html = html + '</span>';
                  html = html + '</a>';
                  html = html + '<a href="#!"class="btn btn-danger btn-circle btn-sm" onclick="DeleteItemRow(' + val.tbl_block_id + ')">';
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

    function Edititems(id) {
      data = { tbl_block_id: id };
      $.ajax({
          type: "POST",
          data: data,
          url: "ajaxblockedit.php",
          dataType: 'json',
          success: function(result) {
              $('#blockname').val(result.tbl_block_name);
               $('#blockid').val(result.tbl_block_id);
             }
      });
  }

  $('#upblock').submit(function(e){
      e.preventDefault(); 
      var blockid = $('#blockid').val();
      var blockname = $('#blockname').val();
      if (blockname.trim() !== '') {
     $.ajax({
         url: 'ajaxblockupdate.php',
         type:"POST",
         data:new FormData(this),
         processData:false,
         contentType:false,
         cache:false,
         async:true,
          success: function(result) {
                  if (result) {
                      toastr.success('Updated successfully');
                      bindblock()
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

   function DeleteItemRow(id) {
      data = { tbl_block_id: id };

      $.ajax({
          type: "POST",
          data: data,
          url: 'ajaxblockdeletecheck.php',
          success: function(result) {
            if(result>0)
            {
              swal("Access Denied!", "There have some members from this niyojaka mandalam.", "error");
              bindblock();
            }
            else
            {
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
                          url: 'ajaxblockdelete.php',
                          success: function(result) {
                              swal("Deleted!", "Selected Item has been deleted.", "success");
                              bindblock();
                          }
                      })
                  } else {
                      swal("Cancelled", "Selected Item is safe :)", "error");
                  }

              });
            }
          }
      })
  }

  $('#block-add').submit(function(e){
        e.preventDefault();         
        var district = $("#district").val();
        var block = $("#block").val();
        if(block.trim() != '')
        {
            $.ajax({
                url: 'ajaxaddblock.php',
                type:"POST",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:true,
                success: function(result){
                    if (result) {                 
                        toastr.success('Niyojaka Mandalam has been added');
                        $("#block").val('');
                        bindblock();
                    }
                    else
                    {
                        toastr.error('Could not be added');
                    }
                }
            });
        }else{
            toastr.error('Please fill all the field');
            $("#block").val('');
        }
    });

</script>