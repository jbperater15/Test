<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Projects
        <small> data entries <?php echo $count ?></small>
      </h1>
    </section>
    <section class="content">
      <form action="<?php echo base_url() ?>projectListing1" method="POST" id="searchList">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-group">
                <input id="fromDate" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date" autocomplete="off" />
                <span class="input-group-addon"><label for="fromDate"><i class="fa fa-calendar"></i></label></span>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-group">
                <input id="toDate" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date" autocomplete="off" />
                <span class="input-group-addon"><label for="toDate"><i class="fa fa-calendar"></i></label></span>
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
            <div class="col-lg-2 col-md-8 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
            <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6 form-group">
              <button class="btn btn-md btn-default btn-block pull-right resetFilters"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </div>
        </div>
      </form>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= !empty($userInfo) ? $userInfo->name." : ".$userInfo->email : "All users" ?></h3>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>PROJECT TITLE</th>
                      <th>Project Code</th>
                      <th>Collaborator</th>
                      <th>Year Charged</th>
                      <th>Province</th>
                      <th>Date Duration From</th>
                      <th>Date Duration To</th>
                      <th>Project Status</th>
                      <th>Amount Released</th>
                      <th>Amount Due Refund</th>
                      <th>Fund Status</th>
                      <!-- <th>Refund</th> -->
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->projTitle ?></td>
                        <td><?php echo $record->projCode ?></td>
                         <td><?php echo $record->collaborator ?></td>
                         <td><?php echo $record->yearCharged ?></td>
                        <!-- <td><?php echo $record->projLocation ?></td> -->
                        <td><?php echo $record->province ?></td>
                        <td><?php echo $record->dateDurFrom ?></td>
                        <td><?php echo $record->dateDurTo ?></td>
                        <td><?php echo $record->projectStatus ?></td>
                        <td><?php echo $record->amountReleased ?></td>
                        <td><?php echo $record->amountDueRefund ?></td>
                        <td><?php echo $record->fundStatus ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
</script>
