<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Class Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/codeigniter_test/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/codeigniter_test/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Class Form</h1>
      </div>
      <div class="modal-body" align='center'>
          <div class="alert alert-success">
            Sign Up Successfull !.
          </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <?php echo form_open('classForm/proceed'); ?>
              <button class="btn btn-primary btn-lg" name="submit">PROCEED</button>
          <?php echo form_close();?>
		      </div>
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="/codeigniter_test/js/vendor/jQuery.js.js"></script>
		<script src="/codeigniter_test/js/bootstrap.min.js"></script>
	</body>
</html>
