<?php

class UsersController extends AppController {

  public $name = 'Users';
  public $uses = array('User', 'Tweet');
  public $autoRender = true;
  public $layout = "twit";
  public $autoLayout = true;
  //public $components = array('Cookie');
  public $helpers = array('Cache');
  //public $scaffold;

//  function beforeFilter() {
//
//      //$this->Cookie->name = 'tweet_id';
//      $this->Cookie->time = 3600;
//      $this->Cookie->path = '/Library/WebServer/Documents/twit/app';
//      $this->Cookie->domain = 'localhost';
//      $this->Cookie->secure = false;
//      $this->Cookie->key = 'kichon';
//
//  }

    function beforeFilter() {
        //echo "UsersController::beforeFilter<br>";
        //$this->cacheAction = 3600;
        $this->cacheAction = array('mypage' => 3600);
        parent::beforeFilter();
    }

    function afterFilter() {
        //echo "UsersController::afterFilter<br>";
        parent::afterFilter();
    }

    function beforeRender() {
        //echo "UsersController::beforeRender<br>";
        parent::beforeRender();
    }

    //afterRenderなんてものはない
    //function afterRender() {
    //    echo "UsersController::afterRender<br>";
    //}

  function index() {

    //if ($this->Session->check('myname')) {
    //  $this->redirect('/tweets/mypage');
    //} else {
    //  $this->redirect('login');
    //}

    $this->_checkSession();
    $this->redirect('mypage');

  }

  function login() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");


    if (!empty($this->data)) {
      //$this->set('cookie', $this->Cookie->read('PHPSESSID'));
      $someone = $this->User->findByEmail($this->data['User']['email']);
      if (!empty($someone) && $someone['User']['passwd'] == $this->data['User']['passwd']) {
        $id = $someone['User']['id'];
        //$this->Session->write('myname', $someone['User']['username']);
        $this->Session->write('id', $id);
        //$this->Cookie->write('cookie', 'kichon');
        //$this->redirect('mypage' . DS . $id);
        $this->redirect('mypage');
        //$this->set('data', $someone);
        //$this->set('name', $this->Session->read('myname'));
      } else {
        $this->set('err', 'ユーザ名かパスワードが間違っています。');
      }

      //$this->set('email', $someone);
      //$this->set('auth', '認証成功');
      //$this->set('db', $this->User->find(all));
    } else {
      //$this->set('auth', '認証失敗');
      //$this->checkSession('myname');
      //$this->redirect('/tweets/mypage');
    }

  }

  function logout() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    //$this->Session->delete('myname');
    $this->Session->delete('id');

    $this->flash('signout', '/users/login', 1);

  }

  function signup() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $err = Array();

    if (!empty($this->data)) {
      if (empty($this->data['User']['username'])) {
        $err['name'] = 'ユーザ名は必須です.';
      }
      if (empty($this->data['User']['email'])) {
        $err['email'] = 'メールアドレスは必須です.';
      }
      if (empty($this->data['User']['passwd'])) {
        $err['passwd'] = 'パスワードを記入してください.';
      }
  
      if (!$err) {
        if ($this->data['User']['passwd'] === $this->data['User']['passwdVerify']) {
          // ユーザ登録作業
          unset($this->data['User']['passwdVerify']);
          $this->data['User']['regist_key'] = sha1(uniqid(rand(), 1));
          $this->data['User']['passwd'] = sha1($this->data['User']['passwd']);
          $this->User->save($this->data);
          //$this->Session->write('myname', $this->data['User']['username']);
          $user_id =  $this->User->getLastInsertID();
          $this->Session->write('id', $user_id);
          $this->_sendNewUserMail($user_id);
          //$this->_sendNewUserMail($this->data['User']['name'], $this->data['User']['regist_key']);
          //$last_id = $this->User->getLastInsertID();
          //$this->set('data', $this->data);
          //$this->set('lastid', $last_id);
        } else {
          $err['missmach'] = 'パスワードが異なっています.';
        }
      }
      $this->set('errors', $err);
    }

  }


  function confirm_email($id = null, $key = null) {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    if (!empty($id) && !empty($key)) {
      $this->set('id', $id);
      $this->set('key', $key);
      $user = $this->User->findById($id);
      $this->set('data', $user);

      if ($user['User']['regist_key'] === $key) {
        $this->set('check', 'OK');
        //$this->data['User']['registed'] = 1;
        $this->User->id = $id;
        $this->User->saveField('registed', 1);
        //$this->redirect('mypage' . DS . $id);
        $this->redirect('mypage');
      }
    }

    $this->set('err', '申し訳ありません。そのページは存在しません。');

    //$this->redirect('sorry');
  }

  function mypage($id = null) {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    //$this->_checkSession('id');
    //$user_id = $this->Session->read('id');
    $user_id = $id;
    if (!empty($this->data)) {
        //$this->data['Tweet']['user_id'] = $id;
        $this->data['Tweet']['user_id'] = $user_id;
        //$this->set('tweet', $this->data);
        $this->Tweet->save($this->data);
    }

    $data = $this->User->findById($user_id);
    //$data = $this->User->findById($id);
    //$data = $this->Tweet->findAllByUserId($id);
    $this->set('id', $user_id);
    $this->set('datas', $data);
    //$this->set('cookie', $this->Cookie->read('cookie'));
 
  }

  function profile($id = null) {
  
    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");
  
    $this->_checkSession('id');
    $user_id = $this->Session->read('id');
    if (!empty($this->data)) {
      $this->User->id = $user_id;
      if (empty($this->data['User']['username'])) {
        unset($this->data['User']['username']);
      }
      if (empty($this->data['User']['email'])) {
        unset($this->data['User']['email']);
      }
      if (empty($this->data['User']['profile'])) {
        unset($this->data['User']['profile']);
      }
  
      //$this->User->set($this->data);
      //if ($this->User->validates()) {
          //$this->set('data', '成功！');
          //$this->User->save($this->data, false);
          //$this->redirect('mypage' . DS . $id);
      //} else {
          //$errors = $this->User->invalidFields();
          //$this->set('data', $this->User->invalidFields());
      //}
      //$this->data['User']['id'] = $id;
  
      //if ($this->User->validates()) {
        $this->User->save($this->data);
        $this->set('data', $this->data);
        //$this->redirect('mypage' . DS . $id);
      //} 
    }
    $this->set('id', $user_id);
  
    //$this->redirect('profile' . DS . $id);
    //$this->render('profile' . DS . $id);
  
  }

  function test() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $data = $this->Tweet->findAllByUserId(1);
    $this->set('data', $data);

  }




  function sorry() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

  }

}
