<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/css/dataTables.bootstrap.min.css" />

<script src="<?php echo base_url(); ?>assets/bower_components/DataTable/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
    <section class="content">
      <h1>
        <i class="fa fa-users"></i> Projects
        
      </h1>
      
    <div class="row">
    <div class="col-md-12">

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
                                  <td><?php echo date('d/m/Y', strtotime($record->dateDurFrom)) ?></td>
                                  <td><?php echo date('d/m/Y', strtotime($record->dateDurTo)) ?></td>
                                  <td><?php echo $record->fundStatus ?></td>
                                  <td><?php echo $record->amountReleased ?></td>
                                  <td><?php echo $record->amountDueRefund ?></td>
                                  <td><?php echo $record->amountLiquidated ?></td>
                                  <td><?php echo $record->approvedRequest ?></td>
                                  <td><?php echo $record->projectStatus ?></td>
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
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
        


        
      });

        $('a.editor_create').on('click', function (e) {
        e.preventDefault();
 
        editor.create( {
            title: 'Create new record',
            buttons: 'Add'
        } );
      } );
    });
</script>
