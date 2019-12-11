<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>insertNewProject" method="post" role="form">
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Project Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <!-- <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form"> -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="title">Project Title</label>
                                        <input type="text" class="form-control required" id="title" name="title" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="code">Project Code</label>
                                        <input type="text" class="form-control required" id="code" name="code" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="projectLoc">Project Location</label>
                                        <input type="text" class="form-control required" id="projectLoc" name="projectLoc" maxlength="128">
                                    </div> 
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="yearApproved">Year Approved</label>
                                    <div class="input-group">
                                        <input id="yearApproved" type="text" name="yearApproved" value="" class="form-control datepicker" placeholder="dd-mm-yyyy" autocomplete="off" />
                                        <span class="input-group-addon"><label for="yearApproved"><i class="fa fa-calendar"></i></label></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dateReleased">Date Released</label>
                                        <div class="input-group">
                                            <input id="dateReleased" type="text" name="dateReleased" value="" class="form-control datepicker" placeholder="dd-mm-yyyy" autocomplete="off" />
                                            <span class="input-group-addon"><label for="dateReleased"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurFrom">Project Start</label>
                                        <div class="input-group">
                                            <input id="projectDurFrom" type="text" name="projectDurFrom" value="" class="form-control datepicker" placeholder="dd-mm-yyyy" autocomplete="off" />
                                            <span class="input-group-addon"><label for="projectDurFrom"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurTo">Project Start</label>
                                        <div class="input-group">
                                            <input id="projectDurTo" type="text" name="projectDurTo" value="" class="form-control datepicker" placeholder="dd-mm-yyyy" autocomplete="off" />
                                            <span class="input-group-addon"><label for="projectDurTo"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="approvedRequest">Approved Request </label>
                                        <select class="form-control" name="approvedRequest" id="approvedRequest">
                                            <option disabled selected value>Approved Request</option>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="proponent">Proponent</label>
                                        <input type="text" class="form-control required" id="proponent" name="proponent">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="beneficiries">Beneficiries</label>
                                        <input type="text" class="form-control required equalTo" id="beneficiries" name="beneficiries">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control required equalTo" id="province" name="province">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        
                    
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Project Budget</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Dreleased">Date Released</label>
                                    <input type="text" class="form-control equalTo" id="Dreleased" name="Dreleased">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Areleased">Amount Released</label>
                                        <input type="text" class="form-control" id="Areleased" name="Areleased">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aLiquidated">Amount Liquidated</label>
                                        <input type="text" class="form-control" id="aLiquidated" name="aLiquidated">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unliquatedbal">Unliquated Balance</label>
                                        <input type="text" class="form-control equalTo" id="unliquatedbal" name="unliquatedbal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="AmountDueLiq">Amount Due For Liquidation</label>
                                        <input type="text" class="form-control equalTo" id="AmountDueLiq" name="AmountDueLiq">
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                        </div>

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Reports</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="finanreport">Financial Reports </label>
                                        <input type="text" class="form-control equalTo" id="finanreport" name="finanreport">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fundstatus">Fund Status</label>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="complereport">Completion Report</label>
                                        <input type="text" class="form-control equalTo" id="complereport" name="complereport" height=100>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="terreport">Terminal Report</label>
                                        <input type="text" class="form-control equalTo" id="terreport" name="terreport" height=100>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prostatus">Project Status</label>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="quarstatus">Quarterly Status Progress Report</label>
                                        <input type="text" class="form-control equalTo" id="quarstatus" name="quarstatus" height=100>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amountToRefund">Amount Due To Refund</label>
                                        <input type="text" class="form-control equalTo" id="amountToRefund" name="amountToRefund" height=100>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="refund">Refund</label>
                                        <input type="text" class="form-control equalTo" id="refund" name="refund" height=100>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request">Request</label>
                                        <input type="text" class="form-control equalTo" id="request" name="request" height=100>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </div>
                </form>
        </div> 
        <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>   
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){

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