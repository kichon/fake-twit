<?php

class TweetsController extends AppController {

  public $name = 'Tweets';
  public $uses = 'Tweet';
  public $autoRender = true;
  public $layout = "twit";
  public $autoLayout = true;
  //public $scaffold;

  function index() {

    //$data = $this->Tweet->find('all');
    //$this->set('data', $data);
    //$this->set("page_title", "fake twit");
    //$this->set("content_header", "fake twit");
    //$this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $this->redirect('/users/index');

  }
  
//  function login() {
//
//    $this->set("page_title", "fake twit");
//    $this->set("content_header", "fake twit");
//    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");
//
//    //if (!empty($this->data)) {
//    //  $this->set('datas', $this->data);
//    //  //$this->redirect('mypage');
//    //  $this->render('/tweets/printd');
//    //}
//
//  }

//  function mypage($id = null) {
//
//    $this->set("page_title", "fake twit");
//    $this->set("content_header", "fake twit");
//    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");
//
//    //if ($this->Session->check('myname')) {
//    //  $data = $this->Tweet->find('all');
//    //  $this->set('datas', $data);
//    //} else {
//    //  $this->redirect('/users/index');
//    //}
//
//    $this->_checkSession('myname');
//    $data = $this->Tweet->find('all');
//    $this->set('id', $id);
//    $this->set('datas', $data);
// 
//  }

  function add($id = null) {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    //if (!empty($this->data)) {
      //$this->data['Tweet']['name'] = 'kichon';
      //$this->data['Tweet']['created'] = time();
      //$this->Tweet->set($this->data);
      //if ($this->Tweet->validates()) {
          //$this->data['Tweet']['user_id'] = $id;
          //$this->Tweet->save($this->data, false);
          //$this->redirect('/users/mypage' . DS . $id);
      //}
      //  $this->set('error', $this->Tweet->invalidate('tweet', 'too Long'));
      //  $this->render('/users/mypage');
      //$tweets = $this->Tweet->find('all');
      //$this->set('data', $this->data);
      //$this->set('vali', $this->Tweet->validates());
    //}
    //$this->set('tweets', $this->Tweet->find('all'));

  }

  function printd() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $this->set('datas', $this->data);

  }


  function test() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    //$data = $this->Tweet->find('all');
    $this->set('datas', $data);

  }
 
  function test1($id1 = null, $id2 = null) {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $this->set('data1', $id1);
    $this->set('data2', $id2);

  }

  function model_test() {

    $this->set("page_title", "fake twit");
    $this->set("content_header", "fake twit");
    $this->set("content_footer", "Copyright 2010 kichon fake twit, All Rights Reserved.");

    $this->set('data', get_class_methods($this->Tweet));

  }
 
}
