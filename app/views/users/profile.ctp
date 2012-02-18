<div id="page-header">
  <h2>
    <a href="/twit/users/profile"><img class="sumbnail" src="*" alt="prof photo" align="left"></a>
    kichonの設定
  </h2>
</div>
<div id="wrapper">
  <?php echo $form->create('User', array('type' => 'post', 'action' => 'profile')); ?>
  <table id="profile">
    <tr>
      <th>アイコン</th>
      <td><?php echo $html->image('*', array('alt' => 'photo')); ?></td>
    </tr>
    <tr
      <th>username</th>
      <td><?php echo $form->input('username', array('size' => 20, 'label' => false)); ?></td>
    </tr>
    <tr>
      <th>email</th>
      <td><?php echo $form->input('email', array('size' => 20, 'label' => false)); ?></td>
    </tr>
    <tr>
      <th>profile</th>
      <td><?php echo $form->input('profile', array('type' => 'textarea', 'cols' => 55, 'rows' => 2, 'label' => false)); ?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo $form->end('登録'); ?></td>
    </tr>
  </table>
</div>
<?php if (!empty($data)): ?>
  <pre>
  <?php print_r($data); ?>
  </pre>
<?php endif; ?>

