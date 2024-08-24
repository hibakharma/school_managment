<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;


use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades= Grade::all();
    return view('Pages.Grades.grades',compact('Grades'));
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
     * @param StoreGrades $request
     * @return void
     */
  public function store(StoreGrades $request)
  {
      try {
          $validated = $request->validated();
          Grade::create([
              'Name'=> ['en'=>$request->Name_en , 'ar'=>$request->Name],
              'Notes' => $request->Notes,
          ]);
          toastr()->success('messages.success');


          return redirect('/Grades');
      }
      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


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
  public function edit($id)
  {

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
