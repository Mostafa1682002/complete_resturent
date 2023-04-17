<?php
function getAllDate($table, $col = '', $value = '')
{
    global $connection;
    global $data;
    $condition = '';
    if ($value != '' && $col != '') {
        $condition = "WHERE `$col`='$value'";
    }
    $data = $connection->query("SELECT * FROM `$table` $condition");
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function countOfElement($table, $col = '', $value = '')
{
    global $connection;
    global $count;
    $condition = '';
    if ($value != '' && $col != '') {
        $condition = "WHERE `$col`='$value'";
    }
    $count = $connection->query("SELECT * FROM `$table` $condition");
    return $count->rowCount();
}