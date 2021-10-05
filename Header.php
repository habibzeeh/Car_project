<?php
require 'Manager.php';
$m = Manager::getInstance();
$m->vm->check();
if($m->lm->checkLogin())
?>