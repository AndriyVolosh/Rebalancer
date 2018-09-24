<?php

/**
 * Connect to DB
 * Set your password to your DB
 * Set DB using rebalancer.sql file
 * @param your_password PASSWORD
 */
@$mysqli = new mysqli("localhost", "root", "PASSWORD", "rebalancer");

if ($mysqli->connect_errno) {
    echo "Ошибка: Не удалось создать соединение с базой MySQL и вот почему: \n";
    echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
}
