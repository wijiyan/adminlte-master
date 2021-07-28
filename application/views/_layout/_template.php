<!DOCTYPE html>
<html>
<head>
  <!-- meta -->
  <?php echo @$_meta; ?>
  <!-- css --> 
  <?php echo @$_css; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- header -->
    <?php echo @$_header; ?>
    <!-- sidebar -->
    <?php echo @$_sidebar; ?>

    <div class="content-wrapper">
      <!-- content wrapper -->
      <?php echo @$_content_wrapper; ?>
      <?php echo @$_content; ?> 
    </div>
    <!-- footer -->
    <?php echo @$_footer; ?>
    <!-- control sidebar -->
    <?php echo @$_control_sidebar; ?>
    <?php echo @$_sidebar; ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- js -->
  <?php echo @$_js; ?>

</body>  
</html>