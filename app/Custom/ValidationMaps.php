<?php

	function getArticlesValidationMap($action)
	{
		if ($action === 'add') {
			return
				[
					'title' => 'required|unique:articles|max:200|min:6',
					'content' => 'required|max:300|min:10',
				];
		}
		elseif ($action === 'edit') {
			return
				[
					'title' => 'required|max:200|min:6',
					'content' => 'required|max:300|min:10',
				];
		}
	}
	
	
	function getMessagesValidationMap()
	{
		return
			[
				'name' => 'required|max:20|min:2',
				'text' => 'required|max:300|min:10',
			];
	}