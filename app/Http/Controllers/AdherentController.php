<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG as Personne;
use App\Gestion\AdherentG;
use App\Gestion\AdresseG;
use App\Gestion\QualiteG;
use App\Gestion\StructureG;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;

class AdherentController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(AdherentG $adherents){
    return view('Shared.mosaic')
    ->with('collection', $adherents->index())
    ->with('title', 'Les adhérents')
    ->with('titre_page', 'Les adhérents')
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
  public function edit($id, Personne $personnes, AdresseG $adresseG, QualiteG $qualiteG, StructureG $structureG){
    $personne = $personnes->edit($id);
    $listAdresses = $personnes->listAdresses();
    $listCoordonnees = $personnes->listCoordonnees();
    $adresseCommuneWith = $adresseG->adresseCommuneWith($id, $personne->adresses->first()->id);
    $listQualites = $personnes->listQualites();
    $listStructures = $personnes->listStructures();

    // return dd($personne);
    return view('Personnes.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$personne->nom_complet)
    ->with(compact('personne'))
    ->with(compact('listAdresses'))
    ->with(compact('listCoordonnees'))
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
  public function update($id, Personne $Personne, Request $request, Redirector $redirect)
  {
    // return var_dump(Input::all());
    // return 'update de la fiche '.$id;

    $Personne->update($id, $request);
    // return $redirect->back();
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