<?php
$tab1=[15,8,17,14.5];
sort($tab1);
print_r($tab1);
rsort($tab1);
print_r($tab1);
echo "<hr>";
$tab2=["sami"=>14,"youssef"=>9,"omar"=>17];
arsort($tab2);
print_r($tab2);
krsort($tab2);
print_r($tab2);

echo "<hr>";
$moyenne=21;
switch($moyenne){
    case $moyenne<10 : echo "refusé";
    break;
    case $moyenne<12 : echo "passable";
    break;
    case $moyenne<14 : echo "assez bien";
    break;
    case $moyenne<16 : echo "bien";
    break;
    case $moyenne<18 : echo "tres bien";
    break;
    case $moyenne<=20 : echo "excelent";
    break;
    default: echo "error";
}

//activité
echo "<hr>";
$colors=["red","green"];
$index=rand(0,2);
/*$color="";
if(isset($colors[$index]))
$color=$colors[$index];*/

/*switch($color){
    case "red": echo "hello";
    break;
    case "green": echo "welcome";
    break;
    default: echo "error";
}*/

switch($index){
    case 0: echo "hello";
    break;
    case 1: echo "welcome";
    break;
    default: echo "error";
}
?>