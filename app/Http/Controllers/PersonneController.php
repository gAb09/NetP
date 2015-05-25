<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG;
use App\Gestion\AdresseG;
use App\Gestion\QualiteG;
use App\Gestion\StructureG;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;
use App\Models\Personne;
class PersonneController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(PersonneG $personnes){
    return view('Shared.mosaic')
    ->with('collection', $personnes->index())
    ->with('title', 'Les personnes')
    ->with('titre_page', 'Les personnes')
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id, PersonneG $personnes, AdresseG $adresseG, QualiteG $qualiteG, StructureG $structureG){
    $personne = $personnes->edit($id);
    $listAdresses = $personnes->listAdresses();
    $listTelephones = $personnes->listTelephones();
    $listMails = $personnes->listMails();
    $adresseCommuneWith = $adresseG->adresseCommuneWith($id, $personne->adresses->first()->id);
    $listQualites = $personnes->listQualites();
    $listStructures = $personnes->listStructures();

    // return dd($personne);
    return view('Personnes.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$personne->nom_complet)
    ->with(compact('personne'))
    ->with(compact('listAdresses'))
    ->with(compact('listTelephones'))
    ->with(compact('listMails'))
    ->with(compact('adresseCommuneWith'))
    ->with(compact('listQualites'))
    ->with(compact('listStructures'))
    ;
}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, PersonneG $personne, Request $request, Redirector $redirect)
  {
    $personne->update($id);
// return var_dump('controleur');

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