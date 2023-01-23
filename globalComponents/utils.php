<?php

// The stripos() function finds the position of the first occurrence of a string inside another string :
function isActiveUserAdmin() {
   return stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false;
}

function getActiveUserId() {
   return $_SESSION['user']['id'];
}