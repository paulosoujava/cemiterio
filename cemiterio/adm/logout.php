<?php
session_start();
  unset($_SESSION['ID']);
  unset($_SESSION['ACCESS_ADM']);
  unset($_SESSION['EMAIL']);
  unset($_SESSION['NAME']);
  unset($_SESSION['LAST_NAME']);
  unset($_SESSION['LAST_NAME']);
   
  header('Location: ../');



