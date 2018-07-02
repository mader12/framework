<?php

class Helper {

    /**
     * 
     * @param string $url
     * @param int $redirect
     */
    public static function redirect($url, $redirect = 303) {
        header('Location: ' . $url, true, $redirect);
    }

}
