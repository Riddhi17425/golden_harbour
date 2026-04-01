@include('layouts.frontheader')
<style>
     
 
/*.thank_main {*/
/*  text-align: center;*/
/*}*/
 
.thank_para {
  font-weight: 400;
  font-size: 24px;
  line-height: 36px;
  color: #C3A457;
}
 
</style>
<section class="thank_main">
   <div class="container">
        <div class="row align-items-center">
        <div class="col-md-6">
        <img src="{{asset('public/front/images/thankyou.png')}}" class="img-fluid" alt="note book image">
         </div>
   <div class="col-md-6">
        <h1 class="main_head mb-3">THANK YOU</h1>
           <p class="thank_para mb-4">Your enquiry has been submitted successfully. <br />
            We will get in touch with you shortly.</p>

        <a href="{{url('/')}}" class="btn btn--ripple" id="ripple">Back to Home <svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
   </div>
    </div>
   </div>
</section>

@include('layouts.frontfooter')