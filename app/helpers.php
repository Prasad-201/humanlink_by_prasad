<?php

function getUserData()
{
    $userData = session()->get(HLINK);
    return $userData;
}

function getUserId()
{
    $userId = session()->get(HLINKID);
    return $userId;
}
