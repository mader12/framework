<?php

class Helper {

    public static function redirect($url, $redirect = 303) {
        header('Location: ' . $url, true, $redirect);
    }

}
