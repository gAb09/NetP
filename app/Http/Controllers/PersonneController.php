<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG;

class PersonneController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(PersonneG $Personnes){
    return view('Personnes.index')
    ->with('personnes', $Personnes->getAll())
    ->with('title', 'Les personnes')
    ->with('titre_page', 'Personnes')
    ;
}

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id, PersonneG $Personnes){
    $personne = $Personnes->edit($id);
    $selectAdresses = $Personnes->selectAdresses();
    $selectContacts = $Personnes->selectContacts();

    return view('Personnes.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$personne->nomcomplet)
    ->with(compact('personne'))
    ->with(compact('selectAdresses'))
    ->with(compact('selectContacts'))
    ;
}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, PersonneG $PersonneG)
  {
    // return 'update de la fiche '.$id;
    dd(Input::all());

    $PersonneG->update($id, Input::all());
}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    return 'suppression de la fiche '.$id;
}

}

?>