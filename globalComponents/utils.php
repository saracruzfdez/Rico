<?php

function isActiveUserAdmin() {
   return stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false;
}

function getActiveUserId() {
   return $_SESSION['user']['id'];
}