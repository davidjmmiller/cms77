<?php

function conf($sub, $varname, $value = NULL){
	global $global_config;
	if (is_null($value) && isset($global_config[$sub][$varname])){
		return $global_config[$sub][$varname];
	}
	if (!is_null($value)){
		$global_config[$sub][$varname] = $value;
	}
	else {
		return NULL;
	}
}

function v($varname, $namespace = 'global', $value = NULL){
	global $global_vars;
	if (is_null($value)){
		return $global_vars[$namespace][$varname];
	}
	$global_vars[$namespace][$varname] = $value;
}
