<?php

// Loading configuration files
include '../app/cnf/app.php';
include '../app/cnf/db.php';

// Preloading app variables
include '../app/vars/global.php';

// Loading Libraries
include 'lib/system/util.php';
include 'lib/system/db_mysql.php';

// Loading default controller
include '../app/ctl/'.conf('app','default_controller').'/index.php';

