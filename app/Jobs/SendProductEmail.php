<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Model\Product;
use App\Model\RegisterMail;

use Mail;

class SendProductEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = ['product' => $this->product];
        
        $emails = RegisterMail::select('email')->get()->toArray();

        $emails = array_merge_recursive(...$emails)['email'];

        if(!empty($emails)):
            foreach($emails as $email):
                Mail::send('mail.new_product',$data, 
                    function($message) use ($email){
                        $message
                        ->from('admin@127.0.0.1', 'Administrator')
                        ->subject('Thông báo sản phẩm mới')
                        ->to($email);
                    });
            endforeach;
        endif;
        
    }
}
