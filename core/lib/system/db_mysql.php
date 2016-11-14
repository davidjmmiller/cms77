<?php

function db_connect($profile = 'db'){
	static $link;
	if (isset($link[$profile])){
		return $link[$link][$profile];
	}

	$link[$profile] = @mysqli_connect(
		conf($profile,'host'),
		conf($profile,'user'),
		conf($profile,'pass'),
		conf($profile,'name'),
		conf($profile,'port')
	);
	
	if ($link[$profile]){
		return $link[$profile];
	}

	echo '<pre>';
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	echo '</pre>';
	exit;
}


function db_query($query, $profile = 'db'){
	$link = db_connect($profile);


	/* create a prepared statement */
	$stmt = mysqli_stmt_init($link);
	if (mysqli_stmt_prepare($stmt,$query)) {

	    	/* bind parameters for markers */
    		//mysqli_stmt_bind_param($stmt, "s", $city);

    		/* execute query */
    		mysqli_stmt_execute($stmt);

    		/* bind result variables */
    		mysqli_stmt_bind_result($stmt, $id, $name);

    		/* fetch value */
    		mysqli_stmt_fetch($stmt);

		/* close statement */
    		mysqli_stmt_close($stmt);

		return $id.'-'.$name;
	}
}


/* close connection */
//mysqli_close($link);


