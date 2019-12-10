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
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Project Type</label>
                                        <input type="text" class="form-control required " id="email" value="<?php echo set_value('email'); ?>" name="username" maxlength="128">
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="yApproved">Year Approved</label>
                                        <input type="number" class="form-control required" id="yApproved" name="yApproved" maxlength="4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dateReleased">Date Released</label>
                                        <input type="date" class="form-control input-sm date-picker" id="dateReleased" name="dateReleased">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurFrom">Project Duration From </label>
                                        <input type="date" class="form-control input-sm date-picker" id="projectDurFrom" name="projectDurFrom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectDurTo">Project Duration To </label>
                                        <input type="date" class="form-control input-sm date-picker" id="projectDurTo" name="projectDurTo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="collab">Collaborating Agency</label>
                                        <input type="text" class="form-control required" id="collab" name="collab">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="beneficiries">Beneficiries</label>
                                        <input type="text" class="form-control required equalTo" id="beneficiries" name="beneficiries">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Sector</label>
                                        <input type="password" class="form-control required" id="password" name="password">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <!-- <div class="col-md-12">
                                    <div class="form-group form">
                                        <label for="cpassword">Address</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword">
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group form">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control required equalTo" id="province" name="province">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">City</label>
                                        <input type="password" class="form-control required" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">District</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword">
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Status</label>
                                        <input type="password" class="form-control required" id="password" name="password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Collaborators</label>
                                        <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>    
                            </div> -->
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
                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="cpassword">Project Cost</label>
                                        <input type="password" class="form-control equalTo" id="cpassword" name="cpassword">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Amount Due</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cpassword">Refunded</label>
                                            <input type="password" class="form-control equalTo" id="cpassword" name="cpassword">
                                        </div>
                                    </div>
                                </div> -->
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
                                        <input type="text" class="form-control equalTo" id="fundstatus" name="fundstatus">
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
                                        <input type="text" class="form-control equalTo height=100" id="prostatus" name="prostatus" height=100>
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