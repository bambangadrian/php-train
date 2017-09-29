<?php
if(function_exists('main') === false){
    /**
     * .
     *
     * @return
     */
    function main(){

    }
}

if(function_exists('getFormData') === false){
    /**
     * .
     *
     * @return
     */
    function getFormData(){
    return $_POST;
    }
}

if(function_exists('getResponse') === false){
    /**
     * .
     *
     * @return
     */
    function getResponse(){

    }
}
if(function_exists('getForm') === false){
    /**
     * .
     *
     * @return string
     */
    function getForm(){
       return'
        <form name="test" method="post" action="' . $_SERVER['PHP_SELF'] .'">
            <input type="text" name="num1" /> (<em> + </em>) <input type="text" name="num2" /><br />
            <input type="submit" name="submit" value="submit" />
        </form>
       ';
    }
}

if(function_exists('isFormSubmitted') === false){
    /**
     * .
     *
     * @return
     */
    function isFormSubmitted(){

    }
}
if(function_exists('validateRequest') === false){
    /**
     * .
     *
     * @return
     */
    function validateRequest(){

    }
}
if(function_exists('render') === false){
    /**
     * .
     *
     * @return
     */
    function render(){

    }
}
//function dump($var)
//{
//    echo '<pre>';
//    var_dump($var);
//    echo "\n";
//    echo '</pre>';
//}
//
//if (array_key_exists('num1', $_POST) and array_key_exists('num2', $_POST) === true) {
//    $int1 = $_POST['num1'];
//    $int2 = $_POST['num2'];
//    $result = $int1+$int2;
//    echo 'hasil perkalian bilangan 1 dan 2 adalah ', $result;
//} else {
//    echo 'Isi Dulu Coy Angkanya';
//}
//?>
<!--<form name="test" method="post" action="--><?php //echo $_SERVER['PHP_SELF'] ?><!--">-->
<!--    <input type="text" name="num1" /> (<em> + </em>) <input type="text" name="num2" /><br />-->
<!--    <input type="submit" name="submit" value="submit" />-->
<!--</form>-->
