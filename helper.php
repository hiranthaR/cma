<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/18
 * Time: 9:46 AM
 * @param $string
 * @param $type
 */
function displayWaring($string, $type)
{
    echo "
<div class=\"alert {$type} alert-dismissible fade show\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    {$string}
</div>";
}

function displaySuccess($string)
{
    echo "
<div class=\"alert alert-success alert-dismissible fade show\" id='alert_success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>{$string}</div>";
}


?>