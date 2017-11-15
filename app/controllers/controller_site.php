<?php

class Controller_Site extends Controller {

    function __construct($DB) {
        parent::__construct();
        $this->model = new Model_Site($DB);
    }

    /**
     * 
     * action index
     */
    function action_index() {
        if (!empty($this->user)) {
            return Helper::redirect('/site/money');
        }
        $this->view->render('index');
    }
    
    /**
     * 
     * action auth
     */
    function action_auth() {
        $data = $_POST;

        if (empty($data)) {
            return Helper::redirect('/');
        }

        $model = $this->model->get_user($data);

        return Helper::redirect('/');
    }

    /**
     * action money
     */
    function action_money($data = null) {
        if (empty($this->user)) {
            return Helper::redirect('/');
        }
        $money = $this->model->get_money($this->user['id']);

        return $this->view->render('money', $money);
    }
    
    /**
     * action get money
     */
    function action_getmoney() {
        if (empty($this->user)) {
            return Helper::redirect('/');
        }

        $data = $_POST;

        $money = $this->model->get_money($this->user['id']);

        if (empty($data['money_off'])) {
            $money['error'] = 'введите сумму для вывода';
        } elseif ($data['money_off'] > $money['money']) {
            $money['error'] = 'сумма для вывода не может бы ть больше, чем у вас есть';
        } else {
            $money = $this->model->set_money($this->user['id'], $data['money_off']);
            return Helper::redirect('/site/money');
        }

        return $this->view->render('money', $money);
    }
}