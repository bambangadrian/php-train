<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   -
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */
if (function_exists('main') === false) {
    /**
     * Main program.
     *
     * @return void
     */
    function main()
    {
        $request = getFormData();
        render(getResponse($request));
    }
}
if (function_exists('getFormData') === false) {
    /**
     * Get all form data collection.
     *
     * @return array
     */
    function getFormData()
    {
        return $_POST;
    }
}
if (function_exists('getResponse') === false) {
    /**
     * Get response data.
     *
     * @param array $request Request data parameter.
     *
     * @return array
     */
    function getResponse(array $request = [])
    {
        $response['form'] = getForm();
        if (isFormSubmitted($request) === true) {
            try {
                validateRequest($request);
                $dateField = $request['date'];
                $response['result'] = getCalculateDiffDate($dateField);
            } catch (\Exception $ex) {
                $response['error'] = $ex->getMessage();
            }
        }
        return $response;
    }
}
if (function_exists('getForm') === false) {
    /**
     * Get form.
     *
     * @return string
     */
    function getForm()
    {
        return '
            <form name="test" method="post" action="' . $_SERVER['PHP_SELF'] . '">
                <input type="text" name="date" /> (<em>Use format YYYY-mm-dd</em>) <br />
                <input type="submit" name="submit" value="submit" />
            </form>
        ';
    }
}
if (function_exists('isFormSubmitted') === false) {
    /**
     * Check if form has been submitted.
     *
     * @param array $request Request data parameter.
     *
     * @return boolean
     */
    function isFormSubmitted(array $request = [])
    {
        return array_key_exists('submit', $request);
    }
}
if (function_exists('validateRequest') === false) {
    /**
     * Validate request and throw an exception if any invalid request found.
     *
     * @param array $request Request data parameter.
     *
     * @throws \Exception If date field is empty.
     * @throws \Exception If given date is invalid date format.
     * @return void
     */
    function validateRequest(array $request = [])
    {
        if (
            array_key_exists('date', $request) === false or
            (array_key_exists('date', $request) === true and trim($request['date']) === '')
        ) {
            throw new \Exception('Date field cannot be empty');
        }
        if (\DateTime::createFromFormat('Y-m-d', $request['date']) === false) {
            throw new \Exception('Inputted date is invalid date format');
        }
    }
}
if (function_exists('getCalculateDiffDate') === false) {
    /**
     * Get calculated diff date result.
     *
     * @param string $dateField Date field data parameter.
     *
     * @return string
     */
    function getCalculateDiffDate($dateField = '')
    {
        $date1 = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
        $date2 = DateTime::createFromFormat('Y-m-d', $dateField);
        $dateDiffIntervalObj = $date1->diff($date2);
        return $dateDiffIntervalObj->format('%r %y years %m months %a days');
    }
}
if (function_exists('render') === false) {
    /**
     * Render all the response data.
     *
     * @param array $response Response data parameter.
     *
     * @return void
     */
    function render(array $response = [])
    {
        $result = '';
        if (array_key_exists('error', $response) === true) {
            $result .= '<div style="color:red"><strong>Error:</strong><br />' . $response['error'] . '</div>';
        }
        if (array_key_exists('form', $response) === true) {
            $result .= '<div>' . $response['form'] . '</div>';
        }
        if (array_key_exists('result', $response) === true) {
            $result .= '<div style="border:1px solid #eee;color:blue;"><strong>Result: </strong><br/>' .
                $response['result'] . '</div>';
        }
        echo $result;
    }
}
main();
