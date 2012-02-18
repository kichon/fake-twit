<?php

class TestComponent extends Object
{

    function initialize(&$controller) {
        //echo "Test::initialize<br>";
    }

    function startup(&$controller) {
        //echo "Test::startup<br>";
    }

    function beforeRender() {
        //echo "Test::beforeRender<br>";
    }

    function shutdown() {
        //echo "Test::shutdown<br>";
    }

}

    
