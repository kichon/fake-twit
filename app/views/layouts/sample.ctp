<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title><?php echo $page_title; ?></title>
  <?php echo $html->css("cake.sample"); ?>
</head>
<body>
  <div id="header"><?php echo $content_header; ?></div>
  <div id="content">
    <?php echo $content_for_layout; ?><br /><br />
  </div>
  <div id="footer"><?php echo $content_footer; ?></div>
</body>
</html>
