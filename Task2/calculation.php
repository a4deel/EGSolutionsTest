<?php

//checking if parameters are being sent by form or not
$parameter_1 = isset($_POST['parameter_1']) ? $_POST['parameter_1'] : 0;
$parameter_2 = isset($_POST['parameter_2']) ? $_POST['parameter_2'] : 0;
$operation = $_POST['operation'];
$result = "";

//checking operation type
if ($operation == 'plus') {
    $result = $parameter_1 + $parameter_2;
} else if ($operation == 'minus') {
    $result = $parameter_1 - $parameter_2;
} else if ($operation == 'multiply') {
    $result = $parameter_1 * $parameter_2;
} else if ($operation == 'divide') {
    if ($parameter_2 != 0) {
        $result = $parameter_1 / $parameter_2;
    }
}

//return result
echo json_encode($result);
exit;