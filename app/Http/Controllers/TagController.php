<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tag.index')->with('tag', Tag::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    public function show(Tag $tag)
    {
        return view('tag.show')->with(['tag' => $tag, 'produtos' => $tag->produtos()->paginate(4)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tag::create($request -> all());
        //Para dar um retorno para o usuário
        session() -> flash('valido', 'A tag foi cadastrada com sucesso!');
        return redirect(route('tag.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request -> all());
        session() -> flash('valido', "A tag $tag->id foi alterada com sucesso!");
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->products()->count() > 0){
            session()->flash('invalido', "Não pode apagar tag que tenha produto vinculado!");
            return redirect(route('tag.index'));
        }

        $tag->delete();
        session() -> flash('valido', "tag $tag->id foi deletado com sucesso!");
        return redirect(route('tag.index'));
    }

    public function trash()
    {
        return view('tag.trash')->with(['tag'=>Tag::onlyTrashed()->get()]);
    }

    public function restore($id)
    {
        $tag = Tag::onlyTrashed()->where('id', $id)->firstOrFail();
        $tag->restore();

        session() -> flash('valido', "tag $tag->id foi restaurado com sucesso!");
        return redirect(route('tag.trash'));

    }

    public function filtro(Request $request){
        $tags = Tag::where('id', '>', '0');

        if($request->nome != ''){
            $tags = $tags->where('tag_nome','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $tags = $tags->where('id','=', $request->codigo );
        }

        return view('tag.index')->with(['tag' => $tags->paginate(5)]);
    }
}
