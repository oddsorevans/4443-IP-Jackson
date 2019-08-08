<?php
echo'<pre>';
$data= file_get_contents('https://www.reddit.com/r/earthporn.json');

$jason = json_decode($data, true);

$clean = [];

$id = 1;

foreach($jason['data']['children'] as $key => $val){
    $origurl = $val['data']['preview']['images'][0]['source']['url'];
    list($url,$null) = explode('?',$origurl);
    $name = $val['data']['created'].'-'.basename($url);
    $origurl = str_replace('amp;','',$origurl);
    $clean[] = [
        'title'=>$val['data']['title'],
        'img'=>$origurl,
        'name'=>$name,
        'path'=>'../earthporn/',
        'localurl'=>'http://167.99.158.119/final_project/api/earthporn/'.$name,
        'id'=>$id
    ];
    $file = file_get_contents($origurl);
    if($file){
        file_put_contents('./earthporn/'.$name,$file);
    }else{
        echo"{$origurl} did not work!!!\n";
    }
    
    $id++;
}
 print_r($clean);
 file_put_contents('./earthporn/two.json',json_encode($clean));