<?php

namespace App;

class Session
{
    /**
     * @return void
     */
    public function initSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * @param int $num
     */
    public function insertNumber(int $num)
    {
        $_SESSION['sorted'][] = $num;
    }

    /**
     * @return void
     */
    public function clearNumbers()
    {
        unset($_SESSION['sorted']);
    }
}