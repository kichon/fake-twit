<?php

class UserTest extends AppModel {
  
  public $name = 'UserTest';

  public $validate = array(
                    'name' => array(
                        'rule' => 'notEmpty',
                        'message' => '名前を入力してください',
                        'last' => true,
                    ),
                    'email' => array(
                        'notempty' => array(
                            'rule' => 'notEmpty',
                            'message' => 'メールアドレスを入力してください',
                            //'last' => true,
                        ),
                        'unique' => array(
                            'rule' => 'isUnique',
                            'message' => 'このメールアドレスは既に使用されています',
                            //'last' => true,
                        ),
                        'mail' => array(
                            'rule' => 'email',
                            'message' => 'メールアドレスの形式と異なっています',
                            //'last' => true,
                        ),
                    ),
                    'passwd' => array(
                        'notempty' => array(
                            'rule' => 'notEmpty',
                            'message' => 'メールアドレスを入力してください',
                            'last' => true,
                        ),
                        'alphaNumeric' => array(
                            'rule' => 'alphaNumeric',
                            'message' => 'アルファベットか数字のみを入力してください',
                            'last' => true,
                        ),
                        'length' => array(
                            'rule' => array('between', 5, 10),
                            'message' => 'パスワードは5文字以上、10文字以下で入力してください',
                            'last' => true,
                        ),
                    ),
                    'proff' => array(
                        'rule' => array('maxLength', 150),
                    ),
                );

}
