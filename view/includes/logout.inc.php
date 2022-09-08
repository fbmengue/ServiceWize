<?php

session_start();
session_unset();
session_destroy();

//volta para a home
header("location: ../../");
