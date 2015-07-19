<?php namespace App\Http\Controllers;
use App\Gestion\PersonneG;
use App\Gestion\AdhesionG;
use App\Gestion\StructureG;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;

class AdhesionController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(AdhesionG $adhesionG){
    return view('Adhesions.liste')
    ->with('collection', $adhesionG->index())
    ->with('title', 'Les adhésions')
    ->with('titre_page', 'Les adhésions')
    ->with('mode', 'index')
    ;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($type, AdhesionG $adhesionG, PersonneG $personneG, StructureG $structureG)
  {

    $adhesion = $adhesionG->create($type);

    $title = $adhesionG->setTitleCreation($adhesion);

    $listAdherents = $adhesionG->getListForSelect($type, $personneG, $structureG);

    return \View::make('Adhesions.create')
    ->with(compact('adhesion'))
    ->with('title', $title)
    ->with('titre_page', $title)
    ->with(compact('listAdherents'))
    ;
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(AdhesionG $adhesionG, Redirector $redirect)
  {
    $adhesionG->store();
    return redirect()->route('adhesion.index');
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
  public function edit($id, AdhesionG $adhesionG){
    return view('Adhesions.edit_raw')
    ->with('adhesion', $adhesionG->edit($id))
    ;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, AdhesionG $adhesion, Request $request, Redirector $redirect)
  {
    return dd(Input::all());
    return 'update de la fiche '.$id;

    // $adhesion->update($id, $request);
    // return $redirect->back();
    // return $redirect->action('PersonneController@index');
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