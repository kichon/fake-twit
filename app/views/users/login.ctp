<div id="content_1">
  <p><b><?php echo $html->link('Do you have an account?', 'signup'); ?></b></p>
</div>
<div id="wrapper">
  <?php echo $form->create('User', array('type' => 'post', 'action' => 'login')); ?>
  <!--
  <form class="login" method="post" action="*">
  -->
    <fieldset class="login-fieldset">
      <table class="login-table">
        <tr>
          <th>Username</th>
          <!--
          <td><input type="text" size="20" name="username"></td>
          -->
          <td><?php echo $form->text('User.email', array('size' => 20)); ?></td>
        </tr>
        <tr>
          <th>Password</th>
          <td>
            <?php echo $form->password('User.passwd', array('size' => 20, 'value' => '')); ?>
            <!--
            <input type="text" size="20" name="password">
            -->
            <small>
              <!--
              <a href="*">Forgot?</a>
              -->
              <?php echo $html->link('Forgot?', '*'); ?>
            </small>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <!--
            <input type="checkbox" value="1" name="remember_me">
            Remenber me?
            -->
            <?php echo $form->checkbox('User.check', array('checked' => false)); ?>
            Remenber me?
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <!--
            <input type="submit" value="Sing In" name="submit">
            -->
            <?php echo $form->end('Sign In'); ?>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <?php echo $html->link('New twit', 'signup'); ?>
          </td>
        </tr>
      </table>
    </fieldset>
  </form>
</div>
<?php if (!empty($data)): ?>
  <?php print_r($data); ?>
<?php endif; ?>
<?php if (!empty($name)): ?>
<?php echo $name; ?>
<?php endif; ?>
<?php if (!empty($err)): ?>
<pre>
  <?php print_r($err); ?>
</pre>
<?php endif; ?>
<?php if (!empty($cookie)): ?>
<pre>
  <?php print_r($cookie); ?>
</pre>
<?php endif; ?>


<!--
<?php if (!empty($auth)): ?>
<pre>
  <?php echo $email; ?>
  <?php echo $auth; ?>
  <?php print_r($db); ?>
</pre>
<?php endif; ?>
-->
