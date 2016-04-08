<?php
$ldap = ldap_connect("eagle.office.hummingsoft.com.my");
if ($bind = ldap_bind($ldap, '', '')) {
  // log them in!
  var_dump($bind);
} else {
  // error message
}