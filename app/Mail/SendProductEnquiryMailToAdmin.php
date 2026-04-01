<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendProductEnquiryMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

    public function __construct($post) 
    {
        $this->data = $post;
    }
    public function build()
    {
        return $this->subject('New Product Enquiry Form Submission')
                    ->view('front.email.productenquiryadmin')
                    ->with('data', $this->data);
    }
}
