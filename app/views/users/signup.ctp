<div id='signup_form'>
  <?php echo $form->create('User', array('type' => 'post', 'action' => 'signup')); ?>
  <table class='signup_table'>
    <tr>
      <th>name</th>
      <td><?php echo $form->input('name', array('size' => 20)); ?></td>
    </tr>
    <tr>
      <th>username</th>
      <td><?php echo $form->input('username', array('size' => 20)); ?></td>
    </tr>
    <tr>
      <th>email</th>
      <td><?php echo $form->input('email', array('size' => 20)); ?></td>
    </tr>
    <tr>
      <th>password</th>
      <td><?php echo $form->input('passwd', array('type' => 'password', 'size' => 20, 'value' => '')); ?></td>
    </tr>
    <tr>
      <th>password again</th>
      <td><?php echo $form->input('passwdVerify', array('type' => 'password', 'size' => 20, 'value' => '')); ?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo $form->end('Create my account'); ?></td>
    </tr>
  </table>
</div>
<div id="print_data">
  <?php if (!empty($errors)): ?>
    <?php foreach($errors as $error): ?>
      <?php echo $error; ?><br />
    <?php endforeach; ?>
  <?php endif; ?>
  <?php if (!empty($data)): ?>
    <?php print_r($data); ?>
  <?php endif; ?>
  <?php if (!empty($lastid)): ?>
    <?php echo $lastid; ?>
  <?php endif; ?>
</div>
