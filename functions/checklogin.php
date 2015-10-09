<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vtexuser
 * Date: 10/9/15
 * Time: 4:43 PM
 * To change this template use File | Settings | File Templates.
 */

function getLogin($login){

    $sql = "SELECT * FROM `login_allowed` WHERE `email` = $login";

    $con=mysql_connect("phpmyadmin.local","root","vtexmoda") or
        die("Could not connect: " . mysql_error());

    mysql_select_db(strtolower("frachisedashboard"));

    $result = mysql_query($sql);

    $loginList = array();

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $loginList[] = $row['value'];
    }

    mysql_free_result($result);

    if($loginList != ""){
        return true;
    }else{
        return false;
    }

}