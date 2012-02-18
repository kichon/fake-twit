<?php

class User extends AppModel {
  
  public $name = 'User';
  public $validate = array(
                    'name' => array(
                        'rule' => 'notEmpty',
                        'message' => '名前を入力してください',
                        'last' => true,
                    ),
                    'username' => array(
                        'notempty' => array(
                            'rule' => 'notEmpty',
                            'message' => 'ユーザ名を入力してください',
                            'last' => true,
                        ),
                        'unique' => array(
                            'rule' => 'isUnique',
                            'message' => '他のユーザが使用しています',
                            'last' => true,
                        ),
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
                    'profile' => array(
                        'rule' => array('maxLength', 150),
                    ),
                );
    public $hasMany = 'Tweet';

    
    public function getAll() {
        $options = array(
                    'conditions' => array(
                                'Offer.sid' => $sid,
                    ),
                    'limit' => 1,
        );

        return $this->find('all', $options);

    }




}
