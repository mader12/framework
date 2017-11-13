<?php

class Controller_Site extends Controller {

    function __construct($DB) {
        parent::__construct();
        $this->model = new Model_Site($DB);
    }

    function action_index() {
        if (!empty($this->user)) {
            return Helper::redirect('/site/money');
        }
        $this->view->render('index');
    }

    function action_auth() {
        $data = $_POST;

        if (empty($data)) {
            return Helper::redirect('/');
        }

        $model = $this->model->get_user($data);

        return Helper::redirect('/');
    }

    function action_money($data = null) {
        if (empty($this->user)) {
            return Helper::redirect('/');
        }
        $money = $this->model->get_money($this->user['id']);

        return $this->view->render('money', $money);
    }

    function action_getmoney() {
        if (empty($this->user)) {
            return Helper::redirect('/');
        }

        $data = $_POST;

        if (empty($data['money_off'])) {
            $money = $this->model->get_money($this->user['id']);
            $money['error'] = 'введите сумму для вывода';
            return $this->view->render('money', $money);
        } elseif ($data['money_off'] > $data['money_have']) {
            $money = $this->model->get_money($this->user['id']);
            $money['error'] = 'сумма для вывода не может бы ть больше, чем у вас есть';
            return $this->view->render('money', $money);
        } else {
            $money = $this->model->set_money($this->user['id'], $data['money_off']);
            return Helper::redirect('/site/money');
        }


        $money = $this->model->get_money($this->user['id']);

        return $this->view->render('money', $money);
    }

}
