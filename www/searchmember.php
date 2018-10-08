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
                            <th>Member Details</th>
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
<script type="text/javascript" src="assets/js/export/buttons.print.min.js"></script>
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
                  var dateString = val.tbl_member_doj;                  
                  var dateParts = dateString.split("-");
                  var dateObject = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);                    
                  /*Certifiacte yes/no*/
                  if(val.tbl_member_certificate==1){ certificateyn = "Yes"}
                  else {certificateyn = "No"}             
                  /*End Certifiacte yes/no*/
                  /*Admission Fee yes/no*/
                  if(val.tbl_member_admission==1){ feeyn = "Yes"}
                  else {feeyn = "No"}             
                  /*End Admission Fee yes/no*/

                  html = html + '<tr>';
                  html = html + '<td>' + ++i + '</td>';
                  html = html + '<td>' + val.tbl_member_no + '</td>';
                  html = html + '<td>' + val.tbl_member_name +', '+val.tbl_member_address + '</td>';
                  html = html + '<td>' + val.tbl_member_mobile + '</td>';
                  html = html + '<td>' + val.tbl_member_nominee + '</td>';
                  html = html + '<td>' + dateObject.toDateString() + '</td>';
                  html = html + '<td>' + val.tbl_state_name + '</td>';
                  html = html + '<td>' + val.tbl_district_name + '</td>';
                  html = html + '<td>' + val.tbl_niyojakamandalam_name + '</td>';
                  html = html + '<td>' + val.tbl_mandalam_name + '</td>';
                  html = html + '<td>' + val.tbl_unit_name + '</td>';
                  html = html + '<td>' + certificateyn + '</td>';
                  html = html + '<td>' + feeyn + '</td>';
                  html = html + '</tr>';
                }
              });
              $('.cssload-container').hide();
              $("#itemdetailscontent").html(html);
              $table = $('#tabItemDetail').DataTable({
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                          },
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                        }
                    },
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',                   
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4'                        
                    },
                ],
            });
              $('#data-table-show-id').show();
          }
      });    
  }
</script>