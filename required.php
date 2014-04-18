<?php
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require_once $projectRoot.'/model/classes/User.class.php';
require_once $projectRoot.'/model/classes/RefPlan.class.php';
require_once $projectRoot.'/model/classes/Account.class.php';
require_once $projectRoot.'/model/classes/RefAction.class.php';
require_once $projectRoot.'/model/classes/Transaction.class.php';

require_once $projectRoot.'/model/interfaces/AccountManager.interface.php';
require_once $projectRoot.'/model/interfaces/RefPlanManager.interface.php';
require_once $projectRoot.'/model/interfaces/UserManager.interface.php';
require_once $projectRoot.'/model/interfaces/RefActionManager.interface.php';
require_once $projectRoot.'/model/interfaces/TransactionManager.interface.php';

require_once $projectRoot.'/model/pdo/AbstractPdoManager.class.php';
require_once $projectRoot.'/model/pdo/UserPdoManager.class.php';
require_once $projectRoot.'/model/pdo/RefPlanPdoManager.class.php';
require_once $projectRoot.'/model/pdo/AccountPdoManager.class.php';
require_once $projectRoot.'/model/pdo/RefActionPdoManager.class.php';
require_once $projectRoot.'/model/pdo/TransactionPdoManager.class.php';

require_once $projectRoot.'/controller/functions.php';
?>