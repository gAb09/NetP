<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gestion\ArticleG;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ArticleG $articleG)
    {
        return view('Articles.index')
        ->with('collection', $articleG->index())
        ->with('title', 'Les articles')
        ->with('titre_article', 'Les articles'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, ArticleG $articleG)
    {
     return view('Articles.raw_index')
     ->with('article', $articleG->show($id))
     ;
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, ArticleG $articleG)
    {
       return view('Articles.raw_edit')
       ->with('article', $articleG->edit($id))
       ;
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, ArticleG $articleG)
    {
        $articleG->update($id);
      return \Response::make('', 204);
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
