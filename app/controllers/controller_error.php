<?php

class Controller_Error extends Controller {

    function action_index() {
        $this->view->render('error');
    }

    function action_page404() {
        $this->view->render('page404');
    }

}
