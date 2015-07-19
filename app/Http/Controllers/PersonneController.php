<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG;
use App\Gestion\AdresseG;
use App\Gestion\QualiteG;
use App\Gestion\StructureG;
use App\Gestion\TelephoneG;
use App\Gestion\MailG;
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
    ->with('collection', $personnes->getAll())
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
  public function edit(
    $id, 
    PersonneG $personnes, 
    QualiteG $qualites, 
    AdresseG $adresses, 
    TelephoneG $telephones, 
    MailG $mails, 
    StructureG $structures
    ){
    $personne = $personnes->edit($id);
    $listQualites = $qualites->listForSelect();
    $listAdresses = $adresses->listForSelect();
    $adresseCommuneWith = $adresses->adresseCommuneWith($id, $personne->adresses->first()->id);
    $listTelephones = $telephones->listForSelect();
    $listMails = $mails->listForSelect();
    $listStructures = $structures->listForSelect();

    return view('Personnes.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$personne->nom_complet)
    ->with(compact('personne'))
    ->with(compact('listQualites'))
    ->with(compact('listAdresses'))
    ->with(compact('adresseCommuneWith'))
    ->with(compact('listTelephones'))
    ->with(compact('listMails'))
    ->with(compact('listStructures'))
    ;
}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, PersonneG $personneG)
  {
    $personneG->update($id);

    return \Redirect::action('PersonneController@index');
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