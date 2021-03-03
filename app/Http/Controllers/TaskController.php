<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
// use Image;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tasks = Task::orderBy('task_date_time','asc')->get();


        return view('all_task', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $date = Carbon::now();
        $request->task_date_time=date('Y-m-d H:i:s', strtotime($request->task_date_time ));
    
    // dd(date('Y-m-d H:i:s', strtotime($request->task_date_time )));

      $request->validate(
        [
         'title' => 'required|max:100',
         'task_date_time'=>'required|after:'.$date,
         'task_image[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ],

        [
            'title.required' => 'Please give your task title',
            'title.max' => 'Please give your task title within 100 character',
            

        ]);


        $task = new Task();
        $task->title=$request->title;
        $task->description=$request->description;
        $task->task_date_time=date('Y-m-d H:i:s', strtotime($request->task_date_time ));
        $task->user_id=1;
        $task->save();

      if(!is_null($request->task_image))
      {
          if (count($request->task_image) > 0) {
              $i = 0;
              foreach ($request->task_image as $image) {

                //insert that image
                //$image = $request->file('task_image');
                $imageName = time() . $i .'.'. $image->extension();
                $image->move(public_path('images'), $imageName);
               

                // $location = 'images/' .$img;

                // Image::make($image)->save($location);

                $task_img = new TaskImage();
                $task_img->task_id = $task->id;
                $task_img->image = $imageName;
                $task_img->save();
                $i++;
              }
            }
      }

       session()->flash('success', 'Task created  successfully !!');
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task= Task::find($id);
        // $images= TaskImage::where('task_id', $task->id )->get();
         $images=$task->image;


        if(! is_null($task))
        {
          return view('task_view', compact('task','images'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

         $task= Task::find($id);
        if(!is_null($task))
        {
            return view('task_edit', compact('task'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $daten = Carbon::now();
         if(!is_null($request->task_date_time_chng))
            {
                 $validated=$request->validate(
                    [
                     
                     'task_date_time_chng' => 'required|after:'.$daten,
                     
                     ]);
            }

            if(!is_null($request->task_image))
                  {
                    $validated = $request->validate(
                        [
                         
                         'task_image[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                         ]);
                    
                  }

        

         

        $task=Task::find($id);
          if(!is_null($task))
        {
            $task->title=$request->title;
            $task->description=$request->description;
            if(!is_null($request->task_date_time_chng))
            {


              $task->task_date_time=$request->task_date_time_chng;
            }
            else
            {
                $task->task_date_time=$task->task_date_time;
            }
            $task->is_completed=$request->is_completed;
            $task->user_id=1;
            $task->save();

             if(!is_null($request->task_image))
                  {

                    

                      if (count($request->task_image) > 0) {
                          $i = 0;
                          foreach ($request->task_image as $image) {

                            
                            $imageName = time() . $i .'.'. $image->extension();
                            $image->move(public_path('images'), $imageName);
                            $task_img = new TaskImage();
                            $task_img->task_id = $task->id;
                            $task_img->image = $imageName;
                            $task_img->save();
                            $i++;
                          }
                        }
                  }



            session()->flash('success', 'Task has updated successfully !!');
            
            return redirect()->route('tasks.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $task= Task::find($id);
        $images=TaskImage::where('task_id',$id)->get();

        if(!is_null($task))
        {
            $task->delete();

           //images delete
            foreach ($images as $img) {
            
              $file_name = $img->image;
              if (file_exists("images/".$file_name)) {
                unlink("images/".$file_name);
              }

              $img->delete();
            }
            session()->flash('success', 'Task has deleted successfully !!');
            
        }

        return redirect()->route('tasks.index');
    }
}
