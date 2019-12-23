<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/DataTable/Buttons-1.6.1/css/Buttons.bootstrap.min.css" />

<script src="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>





<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Projects
        
      </h1>
    </section>
    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo base_url() ?>projectListing2" method="POST" id="searchList">
          <div class="row">
              <div class="col-lg-2 col-md-6 col-sm-4 col-xs-12 form-group">
                <div class="input-group">
                  <input id="fromDate" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date" autocomplete="off" onfocus="document.getElementById('monthyear').value = ''" />
                  <span class="input-group-addon"><label for="fromDate"><i class="fa fa-calendar"></i></label></span>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-4 col-xs-12 form-group">
                <div class="input-group">
                  <input id="toDate" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date" autocomplete="off" onfocus="document.getElementById('monthyear').value = ''" />
                  <span class="input-group-addon"><label for="toDate"><i class="fa fa-calendar"></i></label></span>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-4 col-xs-12 form-group">
                <div class="input-group">
                  <input id="monthyear" type="text" name="monthyear" value="<?php echo $monthyear; ?>" class="form-control datepicker" placeholder="Month Project End" autocomplete="off" onfocus="document.getElementById('toDate').value = '';document.getElementById('fromDate').value = ''" />
                  <span class="input-group-addon"><label for="monthyear"><i class="fa fa-calendar"></i></label></span>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 form-group">
                <select class="form-control" placeholder="try" name="projectStatus" id="projectStatus">
                  <option disabled selected value>Project Status</option>
                  <?php
                    if(!empty($projectStatus))
                    {
                      foreach ($projectStatus as $ps)
                      {
                          ?>
                          <option value="<?php echo $ps->projectStatusId ?>"> <?php echo $ps->status ?></option>
                          <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 form-group">
                <select class="form-control" name="fundStatus" id="fundStatus">
                  <option disabled selected value>Fund Status</option>
                  <?php
                    if(!empty($fundStatus))
                    {
                      foreach ($fundStatus as $fs)
                      {
                          ?>
                          <option value="<?php echo $fs->fundStatusId ?>"> <?php echo $fs->status ?></option>
                          <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 form-group">
                <select class="form-control" name="approvedRequest" id="approvedRequest">
                  <option disabled selected value="">Approved Request</option>
                  <?php
                    if(!empty($approvedRequest))
                    {
                      foreach ($approvedRequest as $ar)
                      {
                          ?>
                          <option value="<?php echo $ar->approvedRequestId ?>"> <?php echo $ar->status ?></option>
                          <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 form-group">
                <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
              </div>
               <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 form-group">
                <form>
                  <a href="<?php echo base_url(); ?>project/createXLS">
                    <input type="button" class="btn btn-md btn-success btn-block pull-right" value="Export" name="">
                  </a>
               </form>
              </div>
              <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 form-group">
                <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
              </div>
              <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 form-group">
                <button class="btn btn-md btn-default btn-block pull-right resetFilters"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= !empty($userInfo) ? $userInfo->name." : ".$userInfo->email : "All users" ?></h3>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover row-border compact" id="book-table">
                    <thead>
                       <tr>
                          <th>PROJECT TITLE</th>
                          <th>Project Code</th>
                          <th>Proponent</th>
                          <th>Year Charged</th>
                          <th>Province</th>
                          <th>Project Start</th>
                          <th>Project End</th>
                          <th>Fund Status</th>
                          <th>Amount Released</th>
                          <th>Amount Due Refund</th>
                          <th>Amount Liquidated</th>
                          <th>Approved Request</th>
                          <th>Project Status</th>
                          <th>Project Status</th>
                       </tr>
                       </thead>
                       <tbody>
                          <?php
                              if(!empty($userRecords))
                              {
                                  foreach($userRecords as $record)
                                  {
                              ?>
                              <tr id="myrow">
                                <td><?php echo $record->projTitle ?></td>
                                  <td><?php echo $record->projCode ?></td>
                                   <td><?php echo $record->proponent ?></td>
                                   <td><?php echo $record->yearCharged ?></td>
                                  <td><?php echo $record->province ?></td>
                                  <td><?php echo date('d-m-y', strtotime($record->dateDurFrom)) ?></td>
                                  <td><?php echo date('d-m-y', strtotime($record->dateDurTo)) ?></td>
                                  <td><?php echo $record->fundStatus ?></td>
                                  <td><?php echo $record->amountReleased ?></td>
                                  <td><?php echo $record->amountDueRefund ?></td>
                                  <td><?php echo $record->amountLiquidated ?></td>
                                  <td><?php echo $record->approvedRequest ?></td>
                                  <td><?php echo $record->projectStatus ?></td>
                                  <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'project/editOldProject/'.$record->projectId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->projectId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>

                              </tr>
                              <?php
                                  }
                              }
                            ?>
                       </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    
    </section>
</div>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
 --><script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/js/datetime.js"></script>
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;
            jQuery("#searchList").attr("action", link);
            jQuery("#searchList").submit();
        });

        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
        jQuery('.resetFilters').click(function(){
          $(this).closest('form').find("input[type=text]").val("");
        })

        $(document).ready(function() {
          $('#example').DataTable( {
              "pagingType": "full_numbers"
          } );
      } );
    });

    $(document).ready(function() {

        $('#book-table').DataTable({
        // "ajax": {
        //     url : "<?php echo site_url("project/books_page") ?>",
        //     type : 'GET'
        // },
        
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              {
                  extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
              }
          ]

        
      });

        $('a.editor_create').on('click', function (e) {
        e.preventDefault();
 
        editor.create( {
            title: 'Create new record',
            buttons: 'Add'
        } );
      } );
    });

     jQuery(document).on("click", ".deleteUser", function(){

      var userId = $(this).data("userid"),
      hitURL = baseURL + "deleteProject",
      currentRow = $(this);

         if (confirm("Are you sure to delete this project?")) {
             $.ajax({
                 url: "<?php echo base_url(); ?>deleteProject",
                 type: 'post',
                 data: {userId:userId},
                 success: function () {
                  currentRow.parents('tr').remove();
                     alert('Project successfully deleted');
                 },
                 error: function () {
                     alert('Project deletion failed');
                 } 
             });
         } else {
             alert(id + " Access denied..!");
         }
     });


</script>
