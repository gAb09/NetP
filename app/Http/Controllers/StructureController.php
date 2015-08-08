<?php namespace App\Http\Controllers;
use App\Gestion\StructureG;
use App\Gestion\PersonneG;
use App\Gestion\AdresseG;
use App\Gestion\TelephoneG;
use App\Gestion\MailG;
use App\Gestion\QualiteG;

class StructureController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(StructureG $structuresG){
    return view('Shared.mosaic')
    ->with('collection', $structuresG->getAll())
    ->with('title', 'Les structures')
    ->with('titre_page', 'Structures')
    ;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(StructureG $structures, QualiteG $qualites, AdresseG $adresses, TelephoneG $telephones, MailG $mails)
  {
    $structure = $structures->create();

    $listQualites = $qualites->listForSelect();
    $listAdresses = $adresses->listForSelect();
    $adresseCommuneWith = array();
    $listTelephones = $telephones->listForSelect();
    $listMails = $mails->listForSelect();

    return \View::make('Structures.create')
    ->with(compact('structure'))
    ->with(compact('listQualites'))
    ->with(compact('listAdresses'))
    ->with(compact('adresseCommuneWith'))
    ->with(compact('listTelephones'))
    ->with(compact('listMails'))
    ->with('title', 'Structure - Création')
    ->with('titre_page', 'Création d’une structure')
    ;
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StructureG $structures)
  {
    $structures->store();
    return \Redirect::action('StructureController@index');
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



    // return dd($personne);


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(
    $id, 
    StructureG $structures, 
    QualiteG $qualites, 
    AdresseG $adresses, 
    TelephoneG $telephones, 
    MailG $mails,
    PersonneG $personnes
    ){
    $structure = $structures->edit($id);
    $listAdresses = $adresses->listForSelect();
    $listQualites = $qualites->listForSelect();
    $adresseCommuneWith = $adresses->adresseCommuneWith($id, $structure->adresses->first()->id);
    $listTelephones = $telephones->listForSelect();
    $listMails = $mails->listForSelect();

    // return var_dump(count($adresseCommuneWith));
    // return dd($adresseCommuneWith);

    return view('Structures.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$structure->nom_complet)
    ->with(compact('structure'))
    ->with(compact('listQualites'))
    ->with(compact('listAdresses'))
    ->with(compact('adresseCommuneWith'))
    ->with(compact('listTelephones'))
    ->with(compact('listMails'))
    ;
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, StructureG $structure)
  {
    $structure->update($id);

    return \Redirect::action('StructureController@index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }
  
}

?>