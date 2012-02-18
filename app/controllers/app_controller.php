<?php

class AppController extends Controller {

  public $components = array('Email', 'Session', 'Test');

  function beforeFilter() {
      //echo "AppController::beforeFilter<br>";
  }

  function beforeRender() {
      //echo "AppController::beforeRender<br>";
  }

  function afterFilter() {
      //echo "AppController::afterFilter<br>";
  }


  //function shutdown() {
  //    echo "AppController::shutdown<br>";
  //}

  function _checkSession() {

    if (!$this->Session->check('id')) {
      $this->redirect('/users/login');
    }

  }

function _sendNewUserMail($id = null) {

  //$User = $this->User->read(null, $id);
  //$user = $this->User->find('all');
  $user = $this->User->read('name', $id);
  $regist_key = $this->User->read('regist_key', $id);
  $this->Email->to = 'kikuchi.yoichi@gmail.com';
  //$this->Email->to = 'y.kikuchi@fine-support.co.jp';
  $this->Email->subject = 'Welcome to fake twit';
  $this->Email->replyTo = 'support@kichon.net';
  $this->Email->from = 'Fake Twit App <support@kichon.net>';
  $this->Email->template = 'simple_message';
  $this->Email->sendAs = 'both';
  //$this->set('User', 'kichon');
  //$this->set('User', $user);
  $this->set('name', $user['User']);
  $this->set('id', $id);
  $this->set('regist_key', $regist_key['User']);
  $this->Email->send();

}

}
