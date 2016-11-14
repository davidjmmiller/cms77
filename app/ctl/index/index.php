<?php

echo '<h3>Index controller loaded and loading tpl</h3>';
echo '<h3>Loading information from the database</h3>';

$result = db_query('SELECT * FROM user WHERE 1');


echo '<pre>'.print_r($result,true).'</pre>';

include 'tpl/index.tpl.php';




