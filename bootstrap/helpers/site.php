<?php

if (! function_exists('secondsToReadable')) {
    /**
     * Take a number of seconds and return it as a readable amount of time.
     *
     * @param $seconds
     *
     * @return string
     */
    function secondsToReadable($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
    }
}
