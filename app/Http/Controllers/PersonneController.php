<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG;
use App\Gestion\AdresseG;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class PersonneController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(PersonneG $personnesG){
    $personnes = $personnesG->getAll();
    return view('Personnes.index')
    ->with(compact('personnes'))
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
  public function edit($id, PersonneG $personnesG, AdresseG $adresseG){
    $personne = $personnesG->edit($id);
    $selectAdresses = $personnesG->selectAdresses();
    $selectContacts = $personnesG->selectContacts();
    $adressePartagedWith = $adresseG->adressePartaged($id, $personne->adresses->first()->id);

    return view('Personnes.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$personne->nomcomplet)
    ->with(compact('personne'))
    ->with(compact('selectAdresses'))
    ->with(compact('selectContacts'))
    ->with(compact('adressePartagedWith'))
    ;
}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, PersonneG $PersonneG, Request $request, Redirector $redirect)
  {
    // return 'update de la fiche '.$id;

    $PersonneG->update($id, $request);
    return $redirect->action('PersonneController@index');
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