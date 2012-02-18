<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $page_title; ?></title>
  <?php echo $html->css("/css/style"); ?>
</head>
<body>
<div id="container">
  <div id="header"><h1><?php echo $content_header; ?></h1></div>
  <div id="contents">
    <?php echo $content_for_layout; ?>
  </div>
  <div id="footer"><p><?php echo $content_footer; ?></p></div>
</div>
</body>
</html>

