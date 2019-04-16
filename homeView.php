<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple CodeIgniter</title>
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
                                <h4>Profile</h4>
                                <img src="/code/images/<?php foreach($details as $detail) { echo $detail->image ;}?>" class="img-responsive" style="width: 300px; height: 300px;">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <section id="tables">
                                <div class="page-header">
                                    <h1>Bank Details</h1>
                                </div>

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Bank Name</th>
                                            <th>Bank Branch</th>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php foreach($bank as $detail) { echo $detail->bank_name ;}?></td>
                                            <td><?php foreach($bank as $detail) { echo $detail->bank_branch ;}?></td>
                                            <td><?php foreach($bank as $detail) { echo $detail->account_name ;}?></td>
                                            <td><?php foreach($bank as $detail) { echo $detail->account_number ;}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>

                            <section id="tables">
                                <div class="page-header">
                                    <h1>Contact Details</h1>
                                </div>

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>P.O. Box</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php foreach($contact as $detail) { echo $detail->address ;}?></td>
                                            <td><?php foreach($contact as $detail) { echo $detail->phone ;}?></td>
                                            <td><?php foreach($contact as $detail) { echo $detail->po_box ;}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
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
