<?php

class Controller_Error extends Controller {
    
    /**
     * index action error
     */
    function action_index() {
        $this->view->render('error');
    }

    /**
     * render Error page 404
     */
    function action_page404() {
        $this->view->render('page404');
    }

}
