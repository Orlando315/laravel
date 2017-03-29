<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller{
	
	public function home(){
		$products = Product::all();

		return view('welcome',['products' => $products]);
	}

}
?>