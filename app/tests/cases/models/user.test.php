<?php

App::import('Model', 'User');

class UserTestCase extends CakeTestCase
{
    var $TestObject = null;

    function setUp()
    {
        $this->TestObject = new UserTest();
    }

    function tearDown()
    {
        unset($this->TestObject);
    }

}
