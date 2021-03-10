<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Auth;
use App\Models\Task;
use Carbon\Carbon;


class SenEmailJOb implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user ;
    public $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // return redirect()->route('send.mail.index');
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
 
                $tasks = Task::all();
                foreach ($tasks as $task ) {
                    
                    $now =Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());
                    
                     $taskTime=Carbon::createFromFormat('Y-m-d H:i:s', $task->task_date_time);
                     
                      $dfrmnt= $taskTime->diffInMinutes($now);
                     
                       

                    if ( $dfrmnt<=50){

                          
                        $user=User::find($task->user_id)->toArray();

                            Mail::send('mail', $user, function($message) use ($user) {
                                $message->to($user['email']);
                                $message->subject('Welcome Mail');
                             });

                      
                    }
           }
             
    }
}
