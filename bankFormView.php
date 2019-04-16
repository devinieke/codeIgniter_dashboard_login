<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="/codeigniter_test/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/codeigniter_test/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <?php $state = array(
                    'class' => 'active'
                );echo anchor('home', 'HOME', $state); ?>
            </li>
            <li>
                <?php $state = array(
                    'class' => 'active'
                );echo anchor('home', 'Dashboard', $state); ?>
            </li>
            <li>
                <?php echo anchor('home/bankDetails', 'Bank Form'); ?>
            </li>
            <li>
                <?php echo anchor('home/contactDetails', 'Contact Form'); ?>
            </li>
            <li>
                <?php echo anchor('home/updateDetails', 'Update Info'); ?>
            </li>
            <li>
                <?php echo anchor('home/logOut', 'Logout'); ?>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container">
            <section id="typography">
                <div class="page-header">
                  <h3><?php foreach($details as $detail) { echo $detail->first_name." ".$detail->last_name; } ?> 's Profile</h3>
                  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>

                <!-- Headings & Paragraph Copy -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="well">
                            <div class="modal-header">
                              <h1 class="text-center">Enter Bank Details</h1>
                            </div>
                            <div class="modal-body" align='center'>
                              <?php echo validation_errors(); ?>
                              <?php echo form_open_multipart('bankDetails/add_bank_details'); ?>
                              <div class="form_group">
                                <?php echo form_label('Bank Name', 'bank_name'); ?>
                                <?php echo form_input('bank_name', set_value('bank_name')); ?>
                              </div>
                              <div class="form_group">
                                <?php echo form_label('Branch Name', 'bank_branch'); ?>
                                <?php echo form_input('bank_branch', set_value('bank_branch')) ?>
                              </div>
                              <div class="form_group">
                                <?php echo form_label('Account Name', 'account_name'); ?>
                                <?php echo form_input('account_name', set_value('account_name')); ?>
                              </div>
                              <div class="form_group">
                                <?php echo form_label('Account Number', 'account_number'); ?>
                                <?php echo form_input('account_number', set_value('account_number')); ?>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-md-12">
                                <button class="btn btn-primary btn-lg" name="submit">Save</button>
                                <?php echo form_close();?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/codeigniter_test/js/vendor/jQuery.js.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/codeigniter_test/js/vendor/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
