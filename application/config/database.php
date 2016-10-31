<?php

defined('SYSPATH') OR die('No direct access allowed.');

return array
    (
        'default' => array
        (
            'type'       => 'MySQLi',
            'connection' => array(
                'hostname'   => 'localhost',
                'database'   => 'kohana_bs_admin_basic',
                'username'   => 'root',
                'password'   => 'fulu',
                'port'       => 8889,
                'persistent' => FALSE,
                'ssl'        => NULL,
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'caching'      => FALSE,
        ),
        'core' => array
		(
			'type'       => 'MySQLi',
			'connection' => array(
				'hostname'   => '60.191.101.213',
				'database'   => 'dx',
				'username'   => 'root',
				'password'   => 'mysql.hht',
				'persistent' => FALSE,
				'ssl'        => NULL,
			),
			'table_prefix' => '',
			'charset'      => 'utf8',
			'caching'      => FALSE,
		),
);
