<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updatemovie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update new movies every five minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        error_log('====== STRATING UPDATED ====');
        // error_log('===== SCHEDULE START =====');
        // //load all new movie categorys:
        // $news = Inventory::where('isadd' ,'=', 'Phim mới')->where('categoryid','!=',6)->get();
        // if(!empty($news)){

        // }
    }

    public function isDateNew($created){
        //get current day:
        $currentDay = new DateTime();
        $current_date = strtotime($currentDay->format('Y-m-d'));
        $created_date = strtotime(date("Y-m-d", strtotime($created)));
        $datediff = abs($current_date - $created_date);
        $dateConvert = floor($datediff / (60*60*24));

        if($datediff <= 14){
            return true;
        }

        return false;
    }
}
