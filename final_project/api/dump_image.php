<?php

$json = file_get_contents('./earthpornjson/two.json');
​
$json = json_decode($json,true);
​
foreach($json as $img){
    echo'<img src="'.$img['localurl'].'" width="400" data-id="'.$img['id'].'">\n';
}