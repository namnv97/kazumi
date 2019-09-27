<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Model\User;
use \Carbon\Carbon;
use App\Model\Reward;

use Mail;

class BirthdayReward extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:reward';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Người dùng nhận được điểm vào ngày sinh nhật của mình';

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
        $date = date('Y-m-d');

        $users = User::whereRaw("DATE_FORMAT(birthday, '%m-%d') = DATE_FORMAT('$date','%m-%d')")
        ->get();
        if($users->count() > 0):
            foreach($users as $user):
                $reward = new Reward;
                $reward->user_id = $user->id;
                $reward->action = "Chúc mừng sinh nhật";
                $reward->point = 500;
                $reward->status = 'approved';
                $reward->save();
                unset($reward);
            endforeach;
        endif;
    }
}
