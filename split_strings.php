<?php
function solution($str) {
    $hola =str_split($str,2);
    if(strlen(end($hola)) %2 !=0){
      $hola[count($hola)-1].='_';
    }
    return $hola;
    }
    echo  implode(" ",solution("ab", "cd", "ef",  "g_"));
?>
<?php
function solution2($str) {
    $hola = explode(2, $str);
    if(strlen(end($hola)) %2 !=0){
        $hola[count($hola)-1].='_';
        
      }
      return $hola[0];
}
    echo  implode(" ",solution2("ab", "cd", "ef",  "g_"));
?>
