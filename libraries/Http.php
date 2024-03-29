<?php

class Http {


    /**
     * Redirect user to $url
     *
     * @param string $url
     * @return void
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }

}