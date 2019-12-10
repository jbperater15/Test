

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>CodeInsect</b> Admin System | Version 1.5
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="<?php echo base_url(); ?>">CodeInsect</a>.</strong> All rights reserved.
    </footer>
    
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

        $(document).ready(function(){
            setInterval(function(){
                console.log('try');
                $.ajax({
                    url  : "<?php echo base_url(); ?>getNotify",
                    type : "POST",
                    dataType : "json",  
                    // data : {},
                    success: function(data){
                        $("#notification-level").html(data.count);
                    }
                });

                $.ajax({
                    url  : "<?php echo base_url(); ?>getDate",
                    contentType: "application/json;charset=utf-8",
                    type : "POST",
                    dataType : "json",  
                    //data : {},
                    success: function(data){
                        var i;
                        $("#notification").html('');
                        for(i=0; i<Object.keys(data).length; i++){
                            console.log('nothing');
                            $("#notification").append('<li class="header"> End of Project in 3 months : '+data[i].projTitle + '</li>');

                        }

                    }





                });
            },1000);
        })

        $("#monthyear").datepicker( {
            format: "yyyy-mm",
            viewMode: "months", 
            minViewMode: "months"
        });

        // $("#yearApproved").datepicker( {
        //     format: "yyyy",
        //     viewMode: "years", 
        //     minViewMode: "years"
        // });

    </script>
  </body>
</html>