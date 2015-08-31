<?php 
namespace LineXTI\Portfolio\Http\Controllers;

use LineXTI\Portfolio\Models\Portfolios;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
	public function index()
	{		
		$dados = array(

		);

		return view('portfolio::index')->with('dados', $dados);
	}
}