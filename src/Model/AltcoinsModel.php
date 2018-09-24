<?php

/**
 * DB-actions with altcoins
 */
class Altcoin
{

    /**
     * @param object $mysqli
     * @param string $name
     * @param string $symbol
     * @param float $percent
     * @return boolean
     */
    public function addAltcoin($mysqli, $name, $symbol, $percent)
    {
        $query = "INSERT INTO `altcoins` VALUES (null,'$symbol','$name','$percent')"; echo $query . '<br>';
        if (!$mysqli->query($query)) {
            return FALSE;
        } else
            return TRUE;
    }

    /**
     * @param object $mysqli
     * @param string $symbol
     * @return boolean
     */
    public function deleteAltcoin($mysqli, $symbol)
    {
        $query = "DELETE FROM `altcoins` WHERE symbol='" . $symbol . "'"; echo $query . '<br>';
        if (!$mysqli->query($query)) {
            return FALSE;
        } else
            return TRUE;
    }

    /**
     * @param object $mysqli
     * @param string $symbol
     * @param float $percent
     * @return boolean
     */
    public function setPercent($mysqli, $symbol, $percent)
    {
        $query = "UPDATE `altcoins` SET percent=" . $percent . " WHERE symbol='" . $symbol . "'"; echo $query . '<br>';
        if (!$mysqli->query($query)) {
            return FALSE;
        } else
            return TRUE;
    }

}
