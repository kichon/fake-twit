<?php if (!empty($err)): ?>
  <h1><?php echo $err; ?></h1>
<?php endif; ?>

id: <?php echo $id; ?><br />
key:  <?php echo $key; ?><br />
data: <?php print_r($data); ?><br />
check:
<?php if (!empty($check)): ?>
<?php echo $check; ?>
<?php endif; ?>
