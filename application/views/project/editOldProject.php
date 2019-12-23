<?php


$projectId = $projectData[0]->projectId;
$projTitle = $projectData[0]->projTitle;
$projCode = $projectData[0]->projCode;
$projLocation = $projectData[0]->projLocation;
$province = $projectData[0]->province;
$beneficiaries = $projectData[0]->beneficiaries;
$yearCharged = $projectData[0]->yearCharged;
$dateReleased = $projectData[0]->dateReleased;
$dateDurFrom = $projectData[0]->dateDurFrom;
$dateDurTo = $projectData[0]->dateDurTo;
$proponent = $projectData[0]->proponent;
$proponentGender = $projectData[0]->proponentGender;
$budgetdatereleased = $projectData[0]->budgetdatereleased;
$amountReleased = $projectData[0]->amountReleased;
$amountLiquidated = $projectData[0]->amountLiquidated;
$unliquitedBalance = $projectData[0]->unliquitedBalance;
$amountDueLiquidation = $projectData[0]->amountDueLiquidation;
$financialReport = $projectData[0]->financialReport;
$fundStatus = $projectData[0]->fundStatus;
$completionReport = $projectData[0]->completionReport;
$terminalReport = $projectData[0]->terminalReport;
$projectStatus = $projectData[0]->projectStatus;
$quarStatProgRep = $projectData[0]->quarStatProgRep;
$amountDueRefund = $projectData[0]->amountDueRefund;
$refund = $projectData[0]->refund;
$reques = $projectData[0]->reques;
$approvedRequest = $projectData[0]->approvedRequest;

?>
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
                    <form role="form" id="addUser" action="<?php echo base_url() ?>updateProject/" method="post" role="form">
                
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
                                        <input type="text" value="<?php echo $projTitle; ?>" class="form-control required" id="title" name="title" maxlength="128">
                                        <input type="hidden" value="<?php echo $projectId; ?>" class="form-control required" id="projectId" name="projectId" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="code">Project Code</label>
                                        <input type="text" value="<?php echo $projCode; ?>" class="form-control required" id="code" name="code" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="projectLoc">Project Site</label>
                                        <input type="text" value="<?php echo $projLocation; ?>" class="form-control required" id="projectLoc" name="projectLoc" maxlength="128">
                                    </div> 
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="yearApproved">Year Approved</label>
                                    <div class="input-group">
                                        <input id="yearApproved" value="<?php echo $yearCharged; ?>" type="text" name="yearApproved" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" />
                                        <span class="input-group-addon"><label for="yearApproved"><i class="fa fa-calendar"></i></label></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dateReleased">Date Released</label>
                                        <div class="input-group">
                                            <input id="dateReleased" type="text" name="dateReleased" value="<?php echo $dateReleased; ?>" class="form-control datepicker" placeholder="yyyy-mm-dd" autocomplete="" />
                                            <span class="input-group-addon"><label for="dateReleased"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurFrom">Project Start</label>
                                        <div class="input-group">
                                            <input id="projectDurFrom" type="text" name="projectDurFrom" value="<?php echo $dateDurFrom; ?>"  class="form-control datepicker" placeholder="yyyy-mm-dd" autocomplete="off" />
                                            <span class="input-group-addon"><label for="projectDurFrom"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurTo">Project End</label>
                                        <div class="input-group">
                                            <input id="projectDurTo" type="text" name="projectDurTo" value="<?php echo $dateDurTo; ?>" class="form-control datepicker" placeholder="dd-mm-yyyy" autocomplete="off" />
                                            <span class="input-group-addon"><label for="projectDurTo"><i class="fa fa-calendar"></i></label></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="approvedRequest">Approved Request </label>
                                        <select class="form-control" name="approvedRequest" id="approvedRequest" value="<?php echo $approvedRequest; ?>">
                                            <option disabled>Approved Request</option>
                                            <?php
                                              if(!empty($approvedRequest2))
                                              {
                                                foreach ($approvedRequest2 as $ar)
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proponent">Proponent</label>
                                        <input type="text" value="<?php echo $proponent; ?>" class="form-control required" id="proponent" name="proponent">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Proponent Gender</label>
                                        <select class="form-control" name="gender" id="gender" value="<?php echo $proponentGender; ?>">
                                            <option disabled>Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiaries">Beneficiaries</label>
                                        <input type="text" value="<?php echo $beneficiaries; ?>" class="form-control required equalTo" id="beneficiaries" name="beneficiaries">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form">
                                        <label for="province">Province</label>
                                        <input type="text" value="<?php echo $province; ?>" class="form-control required equalTo" id="province" name="province">
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
                                    <input type="text" value="<?php echo $budgetdatereleased; ?>" class="form-control equalTo" id="Dreleased" name="Dreleased">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Areleased">Amount Released</label>
                                        <input type="text" value="<?php echo $amountReleased; ?>" class="form-control" id="Areleased" name="Areleased">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aLiquidated">Amount Liquidated</label>
                                        <input type="text" value="<?php echo $amountLiquidated; ?>" class="form-control" id="aLiquidated" name="aLiquidated">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unliquatedbal">Unliquited Balance</label>
                                        <input type="text" value="<?php echo $unliquitedBalance; ?>" class="form-control equalTo" id="unliquatedbal" name="unliquatedbal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="AmountDueLiq">Amount Due For Liquidation</label>
                                        <input type="text" value="<?php echo $amountDueLiquidation; ?>" class="form-control" id="amountDueLiq" name="amountDueLiq">
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
                                        <input type="text" value="<?php echo $financialReport; ?>" class="form-control equalTo" id="finanreport" name="finanreport">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fundstatus">Fund Status</label>
                                        <select value="<?php echo $fundStatus; ?>" class="form-control" name="fundStatus" id="fundStatus">
                                            <option disabled>Fund Status</option>
                                            <?php
                                              if(!empty($fundStatus2))
                                              {
                                                foreach ($fundStatus2 as $fs)
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
                                        <input type="text" value="<?php echo $completionReport; ?>" class="form-control equalTo" id="complereport" name="complereport" height=100>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="terreport">Terminal Report</label>
                                        <input type="text" value="<?php echo $terminalReport; ?>" class="form-control equalTo" id="terreport" name="terreport" height=100>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prostatus">Project Status</label>
                                        <select class="form-control" value="<?php echo $projectStatus; ?>" placeholder="try" name="projectStatus" id="projectStatus">
                                            <option disabled>Project Status</option>
                                            <?php
                                              if(!empty($projectStatus2))
                                              {
                                                foreach ($projectStatus2 as $ps)
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
                                        <input type="text" value="<?php echo $quarStatProgRep; ?>" class="form-control equalTo" id="quarstatus" name="quarstatus" height=100>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amountToRefund">Amount Due To Refund</label>
                                        <input type="text" value="<?php echo $amountDueRefund; ?>" class="form-control equalTo" id="amountToRefund" name="amountToRefund" height=100>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="refund">Refund</label>
                                        <input type="text" value="<?php echo $refund; ?>" class="form-control equalTo" id="refund" name="refund" height=100>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request">Request</label>
                                        <input type="text" value="<?php echo $reques; ?>" class="form-control equalTo" id="request" name="request" height=100>
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
          format : "yyyy-mm-dd"
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