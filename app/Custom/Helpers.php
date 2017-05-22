<?php

	function getCurrentYear()
	{
		return date('Y');
	}
	
	
	function getMenu() //тестовый метод, который будет переписан после изучения работы с БД.
	{
		return
			[
				'index' => [
						'href' => '/articles',
						'text' => 'Главная',
						'is_active' => false
					],
					
				'guestbook' => [
						'href' => '/guestbook',
						'text' => 'Гостевая',
						'is_active' => false
					],
			];
	}
	
	
	function getAdminMenu()
	{
		return
			[
				'index' => [
						'href' => '/admin/articles',
						'text' => 'Главная',
						'is_active' => false
					],
					
				'addArticle' => [
					'href' => '/admin/articles/add',
					'text' => 'Добавить',
					'is_active' => false
				],
					
				'guestbook' => [
						'href' => '/admin/guestbook',
						'text' => 'Гостевая',
						'is_active' => false
					],
			];
	}