<?php

// Loading configuration files
include '../app/cnf/app.php';
include '../app/cnf/db.php';
include '../app/cnf/routes.php';

// Preloading app variables
include '../app/vars/global.php';

// Loading Libraries
include 'lib/system/util.php';
include 'lib/system/db_mysql.php';

// Loading default controller
if (!isset($_SERVER['PATH_INFO'])){
  include '../app/ctl/'.conf('app','default_controller').'/main.php';
}
else {
  if ( substr($_SERVER['PATH_INFO'],0,1) == '/' && substr($_SERVER['PATH_INFO'],3,1) == '/'){
    $lang = substr($_SERVER['PATH_INFO'],1,2);

    if (in_array($lang,conf('app','accepted_languages'))){
      $_SERVER['PATH_INFO'] = substr($_SERVER['PATH_INFO'],3);
      conf('app','current_language', $lang);
    }
    else {
      // Language not valid in the path
      conf('app','current_language', conf('app','default_language'));
    }
    unset($lang);
  }
  else {
    conf('app','default_language',conf('app','default_language'));
  }
  if(!is_null(conf('routes',$_SERVER['PATH_INFO']))){
    v('controller_name','global',conf('routes',$_SERVER['PATH_INFO']));
    include '../app/ctl/'.v('controller_name').'/main.php';
  }
  else {
    // Page not found
    include '../app/ctl/'.conf('app','page_not_found').'/main.php';
  }
}
