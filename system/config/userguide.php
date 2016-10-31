<?php defined('SYSPATH') OR die('No direct script access.');

return array(
	
	// Leave this alone
	
	'modules' => array(
		//这应该是这个模块的路径userguide页面,没有“指南/”。例:“/指导/ mo
		// This should be the path to this modules userguide pages, without the 'guide/'. Ex: '/guide/modulename/' would be 'modulename'
		'kohana' => array(

			// Whether this modules userguide pages should be shown 这个模块是否userguide页面应该显示
			'enabled' => TRUE,

			// The name that should show up on the userguide index page 的名字出现在userguide索引页面
			'name' => 'Kohana',

			// A short description of this module, shown on the index page 简短描述该模块,显示在索引页面
			'description' => 'Documentation for Kohana core/system.',

			// Copyright message, shown in the footer for this module 版权信息,此模块显示在页脚
			'copyright' => '&copy; 2008–2012 Kohana Team',
		),
	),

);
