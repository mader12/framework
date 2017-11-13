<?php

class Controller {

    public $model;
    public $view;
    public $user;

    function __construct() {
        global $user;
        $this->user = $user;
        $this->view = new View();
    }

    function action_index() {
        
    }

}
