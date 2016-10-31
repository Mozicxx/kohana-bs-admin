<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-10-31 15:54:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: PATH_INFO ~ DOCROOT/index.php [ 112 ] in /Users/MozDoc/Sites/market_backend/index.php:112
2016-10-31 15:54:26 --- DEBUG: #0 /Users/MozDoc/Sites/market_backend/index.php(112): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/MozDoc/S...', 112, Array)
#1 {main} in /Users/MozDoc/Sites/market_backend/index.php:112
2016-10-31 16:38:20 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'kohana_bs_admin_basic.market_admin_user' doesn't exist [ SELECT * FROM `market_admin_user` WHERE `username` = 'admin' ] ~ MODPATH/database/classes/Kohana/Database/MySQLi.php [ 171 ] in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251
2016-10-31 16:38:20 --- DEBUG: #0 /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQLi->query(1, 'SELECT * FROM `...', false, Array)
#1 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Auth/Backend.php(25): Kohana_Database_Query->execute()
#2 /Users/MozDoc/Sites/market_backend/modules/auth/classes/Kohana/Auth.php(92): Auth_Backend->_login('admin', 'admin', false)
#3 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Controller/Backend/Auth.php(26): Kohana_Auth->login('admin', 'admin')
#4 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Controller.php(84): Controller_Backend_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Backend_Auth))
#7 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /Users/MozDoc/Sites/market_backend/index.php(116): Kohana_Request->execute()
#10 {main} in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251
2016-10-31 16:38:24 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'kohana_bs_admin_basic.market_admin_user' doesn't exist [ SELECT * FROM `market_admin_user` WHERE `username` = 'admin' ] ~ MODPATH/database/classes/Kohana/Database/MySQLi.php [ 171 ] in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251
2016-10-31 16:38:24 --- DEBUG: #0 /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQLi->query(1, 'SELECT * FROM `...', false, Array)
#1 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Auth/Backend.php(25): Kohana_Database_Query->execute()
#2 /Users/MozDoc/Sites/market_backend/modules/auth/classes/Kohana/Auth.php(92): Auth_Backend->_login('admin', 'admin', false)
#3 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Controller/Backend/Auth.php(26): Kohana_Auth->login('admin', 'admin')
#4 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Controller.php(84): Controller_Backend_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Backend_Auth))
#7 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /Users/MozDoc/Sites/market_backend/index.php(116): Kohana_Request->execute()
#10 {main} in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251
2016-10-31 16:38:26 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'kohana_bs_admin_basic.market_admin_user' doesn't exist [ SELECT * FROM `market_admin_user` WHERE `username` = 'admin' ] ~ MODPATH/database/classes/Kohana/Database/MySQLi.php [ 171 ] in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251
2016-10-31 16:38:26 --- DEBUG: #0 /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQLi->query(1, 'SELECT * FROM `...', false, Array)
#1 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Auth/Backend.php(25): Kohana_Database_Query->execute()
#2 /Users/MozDoc/Sites/market_backend/modules/auth/classes/Kohana/Auth.php(92): Auth_Backend->_login('admin', 'admin', false)
#3 /Users/MozDoc/Sites/market_backend/modules/backend/classes/Controller/Backend/Auth.php(26): Kohana_Auth->login('admin', 'admin')
#4 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Controller.php(84): Controller_Backend_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Backend_Auth))
#7 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/MozDoc/Sites/market_backend/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /Users/MozDoc/Sites/market_backend/index.php(116): Kohana_Request->execute()
#10 {main} in /Users/MozDoc/Sites/market_backend/modules/database/classes/Kohana/Database/Query.php:251