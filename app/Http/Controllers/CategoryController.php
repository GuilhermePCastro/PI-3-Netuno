<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('category.index')->with('category', Category::all());
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria foi adicionada com sucesso!");
        return redirect(route('category.index'));

    }

    public function show(Category $category)
    {
       return view('category.show')->with(['category' => $category, 'produtos' => $category->produtos()->paginate(8)]);
    }

    public function edit(Category $category){
        return view('category.edit') -> with('category', $category);
    }

    public function update(Request $request, Category $category){
        //Update pode ser dos dois jeitos (com all ou cada campo especificado)
        /*
        $product->update([
            'name'          => $request -> name,
            'description'   => $request -> description,
            'price'         => $request -> price
        ]);*/

        $category->update($request -> all());

        session() -> flash('valido', "Categoria $category->id foi alterada com sucesso!");
        return redirect(route('category.index'));
    }

    public function destroy (Category $category){

        if($category->products()->count() > 0){
            session()->flash('invalido', "Não pode apagar categoria que tenha produto vinculado!");
            return redirect(route('category.index'));
        }

        $category -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria $category->id foi deletada com sucesso!");
        return redirect(route('category.index'));
    }

    public function trash(){
        return view('category.trash')->with(['category'=>Category::onlyTrashed()->get()]);
    }

    public function restore($id){
        $category = Category::onlyTrashed()->where('id',$id)->firstOrFail();
        $category->restore();

        session() -> flash('valido', "category $category->id foi restaurado com sucesso!");
        return redirect(route('category.trash'));
    }

}
