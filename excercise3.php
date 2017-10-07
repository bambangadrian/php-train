<?php
if(function_exists('main') === false){
    /**
     * .
     *
     * @return
     */
    function main(){
        $request = getFormData();
        render(getResponse($request));
    }
}

if(function_exists('getFormData') === false){
    /**
     * .
     *
     * @return array
     */
    function getFormData(){
    return $_POST;
    }
}
if(function_exists('getResponse') === false){
    /**
     * .
     *
     * @return array
     */
    function getResponse(array $request=[]){
        $response['form']= getForm();
            if (isFormSubmitted($request)=== true){
                try {
                    validateRequest($request);
                    $dataField = $request['num1'];
                    $response['result'] = getCalculate($dataField);
                } catch (\Exception $ex) {
                    $response['error'] = $ex->getMessage();
                }
            }
            return $response;
    }
}
if(function_exists('getForm') === false){
    /**
     * Get form.
     *
     * @return string
     */
    function getForm()
    {
       return '
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
    function isFormSubmitted(array $request=[])
    {
    return array_key_exists('submit', $request);
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
if(function_exists('getCalculate') === false){
    /**
     * .
     *
     * @return
     */
    function getCalculate($dataField=''){
        $int1 = $_POST['num1'];
        $int2 = $_POST['num2'];
        $hasil = $int1+$int2;
        return $hasil;
    }
}
main();
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
