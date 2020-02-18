<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Shops;
use App\Products;
use App\Category;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorys = Category::get()->toArray();
        $categorys = Category::paginate(1)->toArray();
        // echo '<pre>';
        // print_r($categorys['data']);
        // die;
        return view('category', ['categorys' => $categorys]);
    }

    public function createCategorys()
    {
        return view('createCategory');
    }


    public function saveCategorys(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            
        ]);



        $categorys = new Category();

        $categorys->name = $request->name;
        

        $categorys->save();
        return redirect('/categorys');
    }

    public function editCategorys($id)
    {
        $data = Category::where('id', ($id))->first()->toArray();
        return view('editCategory', ['data' => $data]);
    }

    public function updateCategorys(Request $request)
    {

        $categorys = Category::find($request->id);

        $categorys->name = $request->name;
        

        $categorys->save();
        return redirect('/categorys')->with('success', 'successfully saved!');
    }

    public function deleteCategorys($id)
    {
        $data = Category::where('id', ($id))->first();
        $data->delete();
        return redirect('/categorys');
    }

}
