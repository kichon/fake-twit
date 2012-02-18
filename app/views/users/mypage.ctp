<div id="main-content">
  <div id="home-header">
    <div id="tweet-box-title">
      <h2>いまなにしてる？</h2>
    </div>
    <div id="tweet-box">
      <?php echo $form->create('User', array('type' => 'post', 'action' => 'mypage')); ?>
      <?php echo $form->input('Tweet.tweet', array('type' => 'textarea', 'cols' => 55, 'rows' => 2, 'value' => '', 'label' => false)); ?>
      <!--
      <?php echo $form->textarea('Tweet.tweet', array('cols' => 55, 'rows' => 2)); ?>
      <?php echo $form->create('Tweet', array('type' => 'post', 'action' => '/twit/users/add')); ?>
      <?php echo $form->input('tweet', array('type' => 'textarea', 'cols' => 55, 'rows' => 2, 'label' => false)); ?>
      -->
    </div>
    <div id="tweet-box-button">
      <?php echo $form->end('ツイート'); ?>
    </div>
    <div id="tweets-area">
      <?php if (!empty($datas)): ?>
        <?php foreach ($datas['Tweet'] as $data): ?>
            <p><?php print_r($data['tweet']); ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div id="dashboard">
  <div id="my-prof">
    <div id="my-photo">
      <?php echo $html->image('_sized/sml_kichon.png', array('alt' => 'my-photo')); ?>
    </div>
    <div id="my-name">
      <b><?php echo $datas['User']['username']; ?></b>
    </div>
    <div id="my-comment">
      <p><?php echo $datas['User']['profile']; ?></p>
    </div>
    <!--
    <div id="my-id">
      <?php if (!empty($id)): ?>
        <?php echo $id; ?>
      <?php endif; ?>
    </div>
    -->
    <div id="signout">
      <?php echo $form->create('User', array('type' => 'post', 'action' => 'logout')); ?>
      <?php echo $form->end('ログアウト'); ?>
    </div>
    <div id="prof">
      <?php echo $form->create('User', array('type' => 'post', 'action' => 'profile')); ?>
      <?php echo $form->end('プロフィール変更'); ?>
    </div>
    <div id="cookie">
      <?php if (!empty($cookie)): ?>
        <pre>
        <?php echo print_r($cookie); ?>
        </pre>
      <?php endif; ?>
    </div>
    <div id="tweet">
      <?php if (!empty($tweet)): ?>
        <pre>
        <?php echo print_r($tweet); ?>
        </pre>
      <?php endif; ?>
    </div>
    <div id="include_path">
        <pre>
        <?php print_r(ini_get('include_path')); ?>
        </pre>
    </div>
  </div>
</div>
