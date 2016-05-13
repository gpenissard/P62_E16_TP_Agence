<?php

function authenticate($username, $password) {
    $users = array(
        'mustapha' => 'b6aa96b82d9361378ae6287c25c72a91', // mdp mousto
        'danilo' => 'ab233b682ec355648e7891e66c54191b', // mdp 654
        'eder' => '68053af2923e00204c3ca7c6a3150cf7', // mdp 20
        'lucy' => '9f9d51bc70ef21ca5c14f307980a29d8', // mdp bob
    );
    $result = array_key_exists($username, $users) && ($users[$username] == md5($password));
/*    $result = false;
    foreach ($users as $v_username => $v_pwd) {
        if (($username == $v_username) && ($password == $v_pwd)) {
            $result = true;
            break;
        }
    }*/
    return $result;
}
