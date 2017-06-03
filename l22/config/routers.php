<?php

return array(

	'index.php' => 'Index/index',
	'index' => 'Index/index',
	'news/([0-9]+)' => 'News/news/$1',
	'news' => 'News/index',
	'general' => 'Index/index',
	
	'admin/station/create' => 'AdminStation/create',
	'admin/station/edit/([0-9]+)' => 'AdminStation/edit/$1',
	'admin/station/delete/([0-9]+)' => 'AdminStation/delete/$1',
	'admin/station/([0-9]+)' => 'AdminStation/index/$1',
	'admin/station' => 'AdminStation/index',
	
	'admin/route/create' => 'AdminRoute/create',
	'admin/route/edit/([0-9]+)' => 'AdminRoute/edit/$1',
	'admin/route/revers/([0-9]+)' => 'AdminRoute/revers/$1',
	'admin/route/delete/([0-9]+)' => 'AdminRoute/delete/$1',
	'admin/route/([0-9]+)' => 'AdminRoute/index/$1',
	'admin/route/way/([0-9]+)' => 'AdminRoute/way/$1',
	'admin/route' => 'AdminRoute/index',
	'route/([0-9]+)' => 'Route/index/$1',

	'admin/category/create' => 'AdminCategory/create',
	'admin/category/edit/([0-9]+)' => 'AdminCategory/edit/$1',
	'admin/category/delete/([0-9]+)' => 'AdminCategory/delete/$1',
	'admin/category' => 'AdminCategory/index',

	'admin/user/create' => 'AdminUser/create',
	'registration' => 'AdminUser/create',
	'admin/user/edit/([0-9]+)' => 'AdminUser/edit/$1',
	'admin/user/delete/([0-9]+)' => 'AdminUser/delete/$1',
	'admin/articles' => 'AdminUser/articles',
	'admin/users' => 'AdminUser/index',
	'admin/authorization' => 'AdminUser/authorization',
	'authorization' => 'AdminUser/authorization',
	'admin/logout' => 'AdminUser/logout',

	'admin/transport/create' => 'AdminTransport/create',
	'admin/transport/edit/([0-9]+)' => 'AdminTransport/edit/$1',
	'admin/transport/delete/([0-9]+)' => 'AdminTransport/delete/$1',
	'admin/transport' => 'AdminTransport/index',

	'admin/article/create' => 'AdminArticle/create',
	'admin/article/edit/([0-9]+)' => 'AdminArticle/edit/$1',
	'admin/article/delete/([0-9]+)' => 'AdminArticle/delete/$1',
	'admin/article' => 'AdminArticle/index',
	
	'ajax' => 'Ajax/index',
	
	'admin/gallery/upload' => "AdminGallery/upload",
	'admin/gallery' => "AdminGallery/index"

	// 'admin/timeroutestart/edit/([0-9]+)' => 'AdminTimeRoute/edit/$1'
	// 'admin/timeroutestart/delete/([0-9]+)' => 'AdminTimeRoute/delete/$1'

	);