<?php

return array(
	
	'admin/station/create' => 'AdminStation/create',
	'admin/station/edit/([0-9]+)' => 'AdminStation/edit/$1',
	'admin/station/delete/([0-9]+)' => 'AdminStation/delete/$1',
	'admin/station' => 'AdminStation/index',
	'admin/route/create' => 'AdminRoute/create',

	'admin/route/create' => 'AdminRoute/create',
	'admin/route/edit/([0-9]+)' => 'AdminRoute/edit/$1',
	'admin/route/delete/([0-9]+)' => 'AdminRoute/delete/$1',
	'admin/route' => 'AdminRoute/index',

	'admin/category/create' => 'AdminCategory/create',
	'admin/category/edit/([0-9]+)' => 'AdminCategory/edit/$1',
	'admin/category/delete/([0-9]+)' => 'AdminCategory/delete/$1',
	'admin/category' => 'AdminCategory/index',

	'admin/user/create' => 'AdminUser/create',
	'admin/user/edit/([0-9]+)' => 'AdminUser/edit/$1',
	'admin/user/delete/([0-9]+)' => 'AdminUser/delete/$1',
	'admin/articles' => 'AdminUser/articles',
	'admin/users' => 'AdminUser/index',
	);