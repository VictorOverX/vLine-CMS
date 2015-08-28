<?php

	Route::get('editor-arquivo', 	'EditorController@editorArquivo'); // Abrindo a view principal do editor
	Route::get('read-file', 		'EditorController@readFile'); // Lendo os arquivos
	Route::get('save-file', 		'EditorController@saveFile'); // Salvando alterações no arquivo
	Route::get('read-all', 			'EditorController@readAllFile'); // Lendo arquivo de view
	Route::get('new-file', 			'EditorController@novoArquivo'); // Novo arquivo
	Route::get('excluir-file', 		'EditorController@excluirArquivo'); // Excluir o arquivo
	Route::get('editor-layout', 	'EditorController@editorLayout');


	Route::get('read-layout', 		'EditorController@readLayout');
	Route::post('save-layout', 		'EditorController@saveLayout');
	Route::get('delete-assets',		'EditorController@removeAssets');
	Route::post('send-layout', 		'EditorController@sendLayout');



