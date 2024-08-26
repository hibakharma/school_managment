<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades=Grade::all();
      $My_Classes= Classroom::all();
 return view('Pages.My_Classes.My_Classes',compact('My_Classes','Grades'));
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
     * @param Request $request
     * @return Response
     */
  public function store(StoreClassroom $request)
  {
      $List_Classes= $request->List_Classes;

      try {
          foreach ($List_Classes as $List_Class)
          {
            //  $validated=$request->validate();
              $My_classes= new Classroom();
              $My_classes->Name_class=['en'=> $List_Class['Name_class_en'] ,'ar'=>$List_Class['Name_class']];
              $My_classes->Grade_id=$List_Class['Grade_id'];
              $My_classes->save();
          }
          toastr()->success(trans('messages.success'));
          return redirect()->route('Classrooms');

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
     * @param StoreClassroom $request
     * @return Response
     */
  public function update(StoreClassroom $request )
  {

      try {
       $validated=$request->validate();
       $My_classes=Classroom::find($request->id)  ;
              if($My_classes){
                  $My_classes->Name_class=['en'=> $My_classes['Name_class_en'] ,'ar'=>$My_classes['Name']];
                  $My_classes->Grade_id=$My_classes['Grade_id'];
                  $My_classes->update();
                  toastr()->success(trans('messages.success'));
                  return redirect()->route('classrooms.index');
              }

      }
      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $classroom =Classroom::find($request->id);
      $classroom->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('classrooms.index');

  }

}

?>
