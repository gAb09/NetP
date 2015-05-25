<?php namespace App\Http\Controllers;
use App\Gestion\StructureG;
use App\Gestion\AdresseG;
use App\Gestion\QualiteG;

class StructureController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(StructureG $structuresG)
  {
    $structures = $structuresG->getAll();
    return view('Structures.index')
    ->with(compact('structures'))
    ->with('title', 'Les structures')
    ->with('titre_page', 'Structures')
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
  public function edit($id, StructureG $structuresG, AdresseG $adresseG, QualiteG $qualiteG){
    dd("édition de la structure id = $id");
    $structure = $structuresG->edit($id);
    $listAdresses = $structuresG->listAdresses();
    $listCoordonnees = $structuresG->listCoordonnees();
    $adresseCommuneWith = $adresseG->adresseCommuneWith($id, $structure->adresses->first()->id);
    $listQualites = $structuresG->listQualites();

    // return dd($structure);

    return view('Structures.edit')
    ->with('title', 'Modification d\'une fiche')
    ->with('titre_page', 'Modification de la fiche de '.$structure->nom_complet)
    ->with(compact('structure'))
    ->with(compact('listAdresses'))
    ->with(compact('listCoordonnees'))
    ->with(compact('adresseCommuneWith'))
    ->with(compact('listQualites'))
    ;
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
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