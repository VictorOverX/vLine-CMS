<?php

	Route::get('editor-arquivo', 	'EditorController@editorArquivo'); // ABRE VIEW EDITOR || OPEN VIEW EDIT
	Route::get('read-file', 		'EditorController@readFile'); // LENDO ARQUIVOS || READ FILE
	Route::post('save-file', 		'EditorController@saveFile'); // SALVANDO ALTERAÇÕES || SAVE UPDATE FILE
	Route::get('read-all', 			'EditorController@readAllFile'); // LENDO ARQUIVO VIEW || READ FILE VIEW
	Route::get('new-file', 			'EditorController@novoArquivo'); // NOVO ARQUIVO || NEW FILE
	Route::get('excluir-file', 		'EditorController@excluirArquivo'); // APAGAR ARQUIVO || DELETE FILE
	Route::get('editor-layout', 	'EditorController@editorLayout');


	Route::get('read-layout', 		'EditorController@readLayout'); //LENDO LAYOUT || READ LAYOUT
	Route::post('save-layout', 		'EditorController@saveLayout'); // SALVA LAYOUT || SAVE LAYOUT
	Route::get('delete-assets',		'EditorController@removeAssets');// REMOVE ASSETS || DELETE ASSETS FILES
	Route::post('send-layout', 		'EditorController@sendLayout'); // ENVIA AQUIVOS DO LAYOUT || SEND LAYOUT FILE



