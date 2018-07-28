<?php

session_start();
unset($_SESSION['FASE_1']);
unset($_SESSION['IDSEPULATDO']);
unset($_SESSION['QUADRA']);
unset($_SESSION['NUMERO']);

echo json_encode(array("code" => "ac_ok"));



