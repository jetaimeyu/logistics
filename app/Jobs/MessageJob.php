<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $delay)
    {
        //
        $this->message = $message;
        $this->delay($delay);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.test',['name' => 'ddd'],function($message){
            $to = '2923409299@qq.com';
            $message ->to($to)->subject('回复');
        });
        DB::transaction(function (){
            DB::insert('INSERT INTO posts (title, description,content,type,created_at)VALUES(?,?,?,?,?)', [$this->message,$this->message,$this->message,1, Carbon::now()]);
        });
    }
}
