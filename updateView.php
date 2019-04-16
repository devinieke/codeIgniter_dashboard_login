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
                                <h1 class="text-center">Update Profile Information</h1>
                            </div>
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#A" data-toggle="tab">Profile Details</a></li>
                              <li><a href="#B" data-toggle="tab">Contact Details</a></li>
                              <li><a href="#C" data-toggle="tab">Bank Details</a></li>
                            </ul>
                            <div class="tabbable">
                              <div class="tab-content">
                                <div class="tab-pane active" id="A">
                                  <p></p>
                                    <div class="modal-body" align='center'>
                                        <?php echo validation_errors(); ?>
                                        <?php echo form_open_multipart('updateInfo/updateProfile'); ?>
                                        <div class="form_group">
                                          <?php echo form_label('First Name', 'first_name'); ?>
                                          <?php echo form_input('first_name', set_value('first_name')); ?>
                                        </div>
                                        <div class="form_group">
                                          <?php echo form_label('Last Name', 'last_name'); ?>
                                          <?php echo form_input('last_name', set_value('last_name')) ?>
                                        </div>
                                        <div class="form_group">
                                          <?php echo form_label('Age', 'age'); ?>
                                          <?php echo form_input('age', set_value('age')); ?>
                                        </div>
                                        <div class="form_group">
                                          <?php echo form_label('Sex', 'sex') ?>
                                          <?php echo form_dropdown('sex', array(
                                              'nil' => NULL,
                                              'Male' => 'male',
                                              'Female' => 'female',
                                              'Unknown' => 'unknown',
                                          ), set_value('sex')); ?>
                                        </div>
                                        <div class="form_group">
                                          <?php echo form_label('Password', 'password'); ?>
                                          <?php echo form_password('password'); ?>
                                        </div>
                                        <div class="form_group">
                                          <?php echo form_label('Photo', 'image'); ?>
                                          <?php echo form_upload('image'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg" name="submit">Update</button>
                                        <?php echo form_close();?>
                                      </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="B">
                                    <div class="modal-body" align='center'>
                                      <?php echo validation_errors(); ?>
                                      <?php echo form_open_multipart('updateInfo/updateContact'); ?>
                                      <div class="form_group">
                                          <?php echo form_label('Address', 'address'); ?>
                                          <?php echo form_input('address', set_value('address')); ?>
                                      </div>
                                      <div class="form_group">
                                          <?php echo form_label('Phone Number', 'phone'); ?>
                                          <?php echo form_input('phone', set_value('phone')) ?>
                                      </div>
                                      <div class="form_group">
                                          <?php echo form_label('P.O. Box', 'po_box'); ?>
                                          <?php echo form_input('po_box', set_value('po_box')); ?>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg" name="submit">Update</button>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="C">
                                    <div class="modal-body" align='center'>
                                      <?php echo validation_errors(); ?>
                                      <?php echo form_open_multipart('updateInfo/updateBank'); ?>
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
                                        <button class="btn btn-primary btn-lg" name="submit">Update</button>
                                        <?php echo form_close();?>
                                      </div>
                                    </div>
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
