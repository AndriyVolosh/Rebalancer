<?php

/**
 * Actions with Altcoins
 */
require_once '../Model/Db.php';
require_once '../Model/AltcoinsModel.php';

if ($_GET && $_GET['action']) {
    $action = $_GET['action'];
    if ($action == 'add') {
        addAltcoin($mysqli);
    } elseif ($action == 'delete') {
        deleteAltcoin($mysqli);
    } elseif ($action == 'setPercent') {
        setPercent($mysqli);
    }
}

/**
 * @param object $mysqli
 */
function addAltcoin($mysqli)
{
    if ($_GET['symbol'] != '') {
        $symbol = $_GET['symbol'];
        if ($_GET['name']) {
            $name = $_GET['name'];
        } else
            $name = '';
        if ($_GET['percent']) {
            $percent = $_GET['percent'];
        } else
            $percent = 0;
    } else
        header('Location: ../View/AltcoinAdd.php');

    $altcoin = new Altcoin();
    if ($altcoin->addAltcoin($mysqli, $name, $symbol, $percent)) {
        header('Location: ../View/ControlPanel.php');
    } else {
        echo 'NOT write in DB';
    }
}

/**
 * @param object $mysqli
 */
function deleteAltcoin($mysqli)
{
    if ($_GET['symbol'] != '') {
        $symbol = $_GET['symbol'];
    } else
        header('Location: ../View/ControlPanel.php');

    $altcoin = new Altcoin();
    if ($altcoin->deleteAltcoin($mysqli, $symbol)) {
        header('Location: ../View/ControlPanel.php');
    } else {
        echo 'NOT delete from DB';
    }
}

/**
 * @param object $mysqli
 */
function setPercent($mysqli)
{
    if ($_GET['symbol'] != '') {
        $symbol = $_GET['symbol'];
        if ($_GET['percent']) {
            $percent = $_GET['percent'];
        } else
            $percent = 0;
    } else
        header('Location: ../View/SetPercent.php');

    $altcoin = new Altcoin();
    if ($altcoin->setPercent($mysqli, $symbol, $percent)) {
        header('Location: ../View/ControlPanel.php');
    } else {
        echo 'NOT write in DB';
    }
}
