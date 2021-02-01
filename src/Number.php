<?php

namespace App;

class Number
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Session $session
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session ?? $this->createDefaultSession();
    }

    /**
     * @return Session
     */
    private function createDefaultSession()
    {
        return new Session();
    }

    /**
     * @return int
     */
    public function sortNumber()
    {
        $num = 0;

        if (count($_SESSION['sorted'] ?? []) <= 74) {
            do {
                $num = rand(1, 75);
            } while ($this->verifyNumber($num) === false);

            $this->getSession()->insertNumber($num);
        }

        return $num;
    }

    /**
     * @param int $num
     * @return bool
     */
    public function verifyNumber(int $num)
    {
        if (!in_array($num, $_SESSION['sorted'] ?? [])) {
            return true;
        }

        return false;
    }

    /**
     * @return void
     */
    public function clearSortedNumbers()
    {
        $this->getSession()->clearNumbers();
    }
}
