<?php 
namespace Amitav\Todo\Http;

use Amitav\Todo\Models\Todo;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
	public function getUserToolsList()
	{
		
		$todos = Todo::all();
		return view('todo::todo-list')->with('todos', $todos);
	}
}