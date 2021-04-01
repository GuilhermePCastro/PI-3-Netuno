<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index')->with('category', Category::all());
    }


    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('valido', 'Categoria foi cadastrada com sucesso!');

        return redirect(route('category.index'));
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

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria $request->id foi alterada com sucesso!");

        return redirect(route('category.index'));
    }

    public function destroy (Category $category){
        $category -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria $category->id foi deletada com sucesso!");
        return redirect(route('category.index'));
    }
}
