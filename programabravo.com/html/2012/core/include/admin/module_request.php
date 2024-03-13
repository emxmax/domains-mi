<?php

$moduleID	=(isset($_REQUEST["moduleID"])) ? $_REQUEST["moduleID"] : 0;
$FormView	=(isset($_REQUEST["FormView"])) ? $_REQUEST["FormView"] : null;
$Command	=(isset($_REQUEST["Command"])) ? $_REQUEST["Command"] : null;
$Page		=(isset($_REQUEST["Page"])) ? $_REQUEST["Page"] : null;
$OrderBy	=(isset($_REQUEST["OrderBy"])) ? $_REQUEST["OrderBy"] : null;
$callback	=isset($_REQUEST["callback"]) ? $_REQUEST["callback"] : false;

$kID		=(isset($_REQUEST["kID"])) ? $_REQUEST["kID"] : null;
$OrderBy	=(isset($_REQUEST["OrderBy"])) ? $_REQUEST["OrderBy"] : null;
$state		=(isset($_REQUEST["state"])) ? $_REQUEST["state"] : null;
$fullname	=(isset($_REQUEST["fullname"])) ? $_REQUEST["fullname"] : null;
$description=(isset($_REQUEST["description"])) ? $_REQUEST["description"] : null;

$MODULE=new UI_AdmPage($moduleID, $FormView, $Command);
$MODULE->Page=$Page;
$MODULE->OrderBy=$OrderBy;
?>