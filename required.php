<?php
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require_once $projectRoot.'/model/classes/User.class.php';
require_once $projectRoot.'/model/classes/RefPlan.class.php';
require_once $projectRoot.'/model/classes/Account.class.php';

require_once $projectRoot.'/model/pdo/UserPdoManager.class.php';
require_once $projectRoot.'/model/pdo/RefPlanPdoManager.class.php';
require_once $projectRoot.'/model/pdo/AccountPdoManager.class.php';
?>