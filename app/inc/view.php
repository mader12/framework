<?php

class View {

    public $controller = 'site';

    function render($content_view, $data = null) {

        include 'app/views/' . $content_view . '.php';
    }

}
