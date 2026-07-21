<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Models\ValuableClient;
use App\Models\WhyChoose;
use App\Models\Network;
use App\Models\IndustrySolution;
use App\Models\Industry;
use App\Models\IndustryProduct;
use App\Models\Event;
use App\Models\News;
use App\Models\ImageSlider;
use App\Models\Video;
use App\Models\ProductEnquiry;
use App\Models\Faq;
use App\Models\FaqForm;
use App\Models\Catelogue;
use App\Models\Contact;
use App\Models\Certificate;
use App\Models\Catalog;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Milestone;
use App\Models\Principals;
use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Agencies;
use App\Helpers\LocalTranslator;
use App\Models\AgencySlider;
use App\Models\Category;
use App\Models\Novacancy;
use App\Models\HomeBanner;
use App\Models\Blogs;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Http;
use App\Mail\SendContactMailToUser;
use App\Mail\SendContactMailToAdmin;
use App\Mail\SendProductEnquiryMailToUser;
use App\Mail\SendProductEnquiryMailToAdmin;
use App\Models\WhatsappInquiry;
use Illuminate\Support\Carbon;
use App\Models\Inquires;
use App\Mail\SendCatalogueMailToAdmin;
use App\Mail\SendCatalogueMailToUser;

class DashboardController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function admin(){
        return view('admin.admin');
    }
    public function index()
    {
        // $meta_title = 'Industrial Equipment Supplier in UAE | Golden Harbour';
        // $meta_description = 'With decades of expertise and experience, Golden Harbour provides reliable marine equipment and services tailored to your needs.';
        $meta_title = 'Metals, Alloys & Industrial Materials Supplier UAE | Golden Harbour';
        $meta_description = 'Golden Harbour is a trusted industrial material supplier in the UAE, providing metals, alloys, and engineering products to industrial sectors across the GCC.';
    
        $clientdata = ValuableClient::whereNull('deleted_at')->get();
        $home_banner = HomeBanner::whereNull('deleted_at')->get();
        $whychoosedata = WhyChoose::whereNull('deleted_at')->get();
        $networkdata = Network::whereNull('deleted_at')->get();
        $industrialsolutiondata = IndustrySolution::whereNull('deleted_at')->get();
        $industrydata = Industry::whereNull('deleted_at')->get();
        $eventdata = Event::whereNull('deleted_at')->get();
        $homeslider = HomeSlider::whereNull('deleted_at')->orderBy('id', 'asc')->get();
        $certificates = Certificate::whereNull('deleted_at')->get();
    
        $feed = [];
        $hasLinkedinFeed = false;
    
        try {
            $accessToken = env('LINKEDIN_ACCESS_TOKEN');
            $organizationUrn = 'urn:li:organization:13665693';
    
            if ($accessToken) {
                $url = "https://api.linkedin.com/v2/shares?q=owners&owners={$organizationUrn}&sortBy=LAST_MODIFIED";
    
                $response = Http::withToken($accessToken)
                    ->acceptJson()
                    ->timeout(10)
                    ->get($url);
    
                if ($response->successful()) {
                    $feed = $response->json()['elements'] ?? [];
    
                    // Remove unwanted index (your existing logic)
                    if (isset($feed[5])) {
                        unset($feed[5]);
                        $feed = array_values($feed);
                    }
    
                    $hasLinkedinFeed = count($feed) > 0;
                }
            }
        } catch (\Exception $e) {
            \Log::error('LinkedIn API Error', ['message' => $e->getMessage()]);
        }
        
    
        return view('front.dashboard', compact(
            'meta_title',
            'meta_description',
            'clientdata',
            'whychoosedata',
            'networkdata',
            'industrialsolutiondata',
            'industrydata',
            'eventdata',
            'feed',
            'hasLinkedinFeed',
            'home_banner',
            'homeslider',
            'certificates'
        ));
    }

    public function import(Request $request)
    {
        // <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        //     @csrf
        //     <input type="file" name="file" accept=".csv">
        //     <button type="submit">Import</button>
        // </form>

        $file = fopen($request->file('file')->getRealPath(), 'r');
        // Skip header row
        fgetcsv($file);

        // IMPORT CATEGORY DETAILS
        // while (($row = fgetcsv($file, 0, ',')) !== false) {
        //     $url = trim($row[0] ?? '');
        //     $metaTitle = $row[1] ?? '';
        //     $metaDescription = $row[2] ?? '';
        //     $faqs = $row[3] ?? '';

        //     if (empty($url)) {
        //         continue;
        //     }
        //     Category::where('url', $url)->update([
        //         'meta_title'       => $metaTitle,
        //         'meta_description' => $metaDescription,
        //         'faqs'             => $faqs,
        //     ]);
        // }

        // IMPORT SUB CATEGORY DETAILS
        // $categories = Category::pluck('id', 'url')->toArray();
        // while (($row = fgetcsv($file, 0, ',')) !== false) {
        //     $categoryUrl     = trim($row[0] ?? '');
        //     $subCategoryUrl  = trim($row[1] ?? '');
        //     $metaTitle       = $row[2] ?? '';
        //     $metaDescription = $row[3] ?? '';
        //     $faqs            = $row[4] ?? '';
            
        //     $categoryId = $categories[$categoryUrl] ?? null;
        //     if (!$categoryId) {
        //         continue;
        //     }

        //     SubCategory::where('category_id', $categoryId)
        //         ->where('url', $subCategoryUrl)
        //         ->update([
        //             'meta_title'       => $metaTitle,
        //             'meta_description' => $metaDescription,
        //             'faqs'             => $faqs,
        //         ]);
        // }
     
        // IMPORT PRODUCT
        $categories = Category::pluck('id', 'url')->toArray();
        $subCategories = SubCategory::select('id', 'url', 'category_id')
            ->get()
            ->groupBy('category_id')
            ->map(function ($items) {
                return $items->pluck('id', 'url')->toArray();
            })
            ->toArray();

        while (($row = fgetcsv($file, 0, ',')) !== false) {
            $categoryUrl    = trim($row[0] ?? '');
            $subCategoryUrl = trim($row[1] ?? '');
            $productUrl     = trim($row[2] ?? '');
            $metaTitle      = $row[3] ?? '';
            $metaDesc       = $row[4] ?? '';
            $faqs           = $row[5] ?? '';

            if (!$categoryUrl || !$subCategoryUrl || !$productUrl) {
                continue;
            }

            $categoryId = $categories[$categoryUrl] ?? null;
            if (!$categoryId) {
                continue;
            }

            $subCategoryId = $subCategories[$categoryId][$subCategoryUrl] ?? null;
            if (!$subCategoryId) {
                continue;
            }
            Product::where('category_id', $categoryId)
                ->where('subcategory_id', $subCategoryId)
                ->where('url', $productUrl)
                ->update([
                    //'meta_title'       => $metaTitle,
                    //'meta_description' => $metaDesc,
                    'faqs'             => $faqs,
                ]);
        }
        die;
        // IMPORT SUB PRODUCT
        // $categories = Category::pluck('id', 'url')->toArray();
        // $subCategories = SubCategory::select('id', 'url', 'category_id')
        //     ->get()
        //     ->groupBy('category_id')
        //     ->map(fn($items) => $items->pluck('id', 'url')->toArray())
        //     ->toArray();

        // $products = Product::select('id', 'url', 'subcategory_id')
        //     ->get()
        //     ->groupBy('subcategory_id')
        //     ->map(fn($items) => $items->pluck('id', 'url')->toArray())
        //     ->toArray();

        // while (($row = fgetcsv($file, 0, ',')) !== false) {

        //     $categoryUrl     = trim($row[0] ?? '');
        //     $subCategoryUrl  = trim($row[1] ?? '');
        //     $productUrl      = trim($row[2] ?? '');
        //     $subProductUrl   = trim($row[3] ?? '');
        //     $metaTitle       = $row[4] ?? '';
        //     $metaDesc        = $row[5] ?? '';
        //     $faqs            = $row[6] ?? '';

        //     if (!$categoryUrl || !$subCategoryUrl || !$productUrl || !$subProductUrl) {
        //         continue;
        //     }

        //     $categoryId = $categories[$categoryUrl] ?? null;
        //     if (!$categoryId) continue;

        //     $subCategoryId = $subCategories[$categoryId][$subCategoryUrl] ?? null;
        //     if (!$subCategoryId) continue;

        //     $productId = $products[$subCategoryId][$productUrl] ?? null;
        //     if (!$productId) continue;

        //     SubProduct::where('category_id', $categoryId)
        //         ->where('subcategory_id', $subCategoryId)
        //         ->where('product_id', $productId)
        //         ->where('url', $subProductUrl)
        //         ->update([
        //             'meta_title'       => $metaTitle,
        //             'meta_description' => $metaDesc,
        //             'faqs'             => $faqs,
        //         ]);
        // }


        fclose($file);
        die;
    }

    public function inquieryStore(Request $request){
        $request->validate([
            'firstname' => [
                'required',
                'string',
                'max:100',
                // Block URLs
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed.');
                    }
                },
                // Spam keywords
                function ($attribute, $value, $fail) {
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale','упаковка','оборудование'];
    
                    foreach ($spamWords as $word) {
                        if (str_contains(strtolower($value), $word)) {
                            $fail('Spam content detected.');
                            break;
                        }
                    }
                },
            ],
            'lastname' => [
                'required',
                'string',
                'max:100',
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed.');
                    }
                },
                function ($attribute, $value, $fail) {
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale','упаковка','оборудование'];
    
                    foreach ($spamWords as $word) {
                        if (str_contains(strtolower($value), $word)) {
                            $fail('Spam content detected.');
                            break;
                        }
                    }
                },
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
    
                function ($attribute, $value, $fail) {
                    $domain = explode('@', $value)[1] ?? '';
    
                    $blockedDomains = [
                        'mail.ru',
                        'yopmail.com',
                        'tempmail.com',
                        '10minutemail.com',
                        'guerrillamail.com',
                        'throwawaymail.com',
                        'mailinator.com',
                    ];
    
                    if (in_array(strtolower($domain), $blockedDomains)) {
                        $fail('Disposable email addresses are not allowed.');
                    }
                },
            ],
            'number' => [
                'required',
                'numeric',
                'digits_between:10,15',
            ],
            'company_name' => [
                'required',
                'string',
                'max:255',
            ],
            'city' => [
                'required',
                'string',
                'max:255',
            ],
            'subject' => [
                'required',
                'string',
                'max:255',
            ],
    
            'message' => [
                'nullable',
                'string',
                'max:500',
    
                // Block URLs
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed in message.');
                    }
                },
                // Spam keyword + density check
                function ($attribute, $value, $fail) {
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale','упаковка','оборудование'];
    
                    $valueLower = strtolower($value);
                    $count = 0;
    
                    foreach ($spamWords as $word) {
                        if (str_contains($valueLower, $word)) {
                            $count++;
                        }
                    }
    
                    if ($count >= 2) {
                        $fail('Spam content detected.');
                    }
                },
    
                // Too many links
                function ($attribute, $value, $fail) {
                    preg_match_all('/https?:\/\/|www\./i', $value, $matches);
    
                    if (count($matches[0]) > 1) {
                        $fail('Too many links are not allowed.');
                    }
                },
            ],
    
            // Honeypot field (must be hidden in form)
            'website' => 'prohibited',
    
            // Bot timing check (hidden field form_time)
            'form_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ((time() - (int)$value) < 5) {
                        $fail('Form submitted too quickly.');
                    }
                },
            ],
    
            // 'g-recaptcha-response' => 'required',
        ]);
        
        $store = new Inquires();
        $store->firstname = $request->firstname;
        $store->lastname = $request->lastname;
        $store->email = $request->email;
        $store->number = $request->number;
        $store->company_name = $request->company_name;
        $store->city = $request->city;
        $store->subject = $request->subject;
        $store->message = $request->message;
        $store->save();    

        $name = trim(($request->firstname ?? '') . ' ' . ($request->lastname ?? ''));
        $sheetData = [
                    'form_type' => 'Contact Popup Form',
                    'name'     => $name,
                    'company_name' => $request->company_name ?? '',
                    'contact' => $request->number ?? $request->phone ?? '',
                    'email' => $request->email ?? '',
                    'city' => $request->city ?? '',
                    'subject' =>  $request->subject ?? '',
                    'message' => $request->message ?? '',
                    'date'    => now()->format('Y-m-d H:i:s')
                ];  
        try {
            // Send data to Google Sheets via the API
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])                                         
                //->post('https://script.google.com/macros/s/AKfycbwZL6oC_ItpTFtVbtAqN73baSSDj0iIO_Cptfpvz0yOhYD2EC-AHAcVQHcG_7Qdg-i1/exec', $sheetData);
                ->post('https://script.google.com/macros/s/AKfycbxhhn1CK9MHsp0Ubj-zEmPWs0PM-E3ljatCA6SjXWLDtU4mACIo4dXgu8WLkIv7EkMuAw/exec', $sheetData);

            // Check if the request was successful
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'name' => $request->firstname . ' ' . $request->lastname,
                        
                    ]);
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                       
                    ]);
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }

            return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');

        } catch (\Exception $e) {
            Log::error('Google Sheets API request failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the message. Please try again later.');
        }


    }

    public function about()
    {
        $meta_title = 'About Us | Specialized in Engineering Solutions';
        $meta_description = 'Golden Harbour is one of the region’s leading importers, stockiest, agents, distributors and suppliers of specialized Oil and Gas engineering products.							';
        return view('front.about',compact('meta_title', 'meta_description'));
    }
    public function industries()
    {
        $meta_title = 'Topnotch Solutions for your Diverse Sectors | Golden Harbour';
        $meta_description = 'Golden Harbour delivers high-quality industrial solutions tailored for various sectors like oil & gas, petrochemical, offshore & onshore, energy, and marine.';
        $industrydata = Industry::whereNull('deleted_at')->get();
        return view('front.industries', compact('meta_title', 'meta_description','industrydata'));
    }
    public function event(){
        $title = 'Our Events & Exhibitions | Golden Harbour';
        $description = 'Join us at Golden Harbour as we participate in leading industry events and exhibitions across the Energy, Marine, Offshore, and Industrial sectors.';
        $eventdata = Event::whereNull('deleted_at')->get();
        return view('front.event',compact('title', 'description','eventdata'));
    }

    public function news(){
        $title = 'News';
        $description = 'News Description';
        $newsdata = News::whereNull('deleted_at')->get();
        return view('front.news',compact('title', 'description','newsdata'));
    }

    public function newsdetail($url){
        $newsdetail = News::whereNull('deleted_at')->where('url', $url)->first();
        $title = 'Golden Harbour News';
        $description = 'Golden Harbour News Description';
        return view('front.newsdetail',compact('title', 'description','newsdetail'));
    } 
    public function blogs(){
        $title = 'Blogs';
        $description = 'Blogs Description';
        $blogs = Blogs::whereNull('deleted_at')->where('status', 'Active')->orderBy('id', 'desc')->get();
        return view('front.blog',compact('title', 'description','blogs'));
    }
      public function novacancy()
    {
        $title = 'No Vacancies | Golden Harbour';
        $description = 'Currently no open roles at Golden Harbour, but eager to connect with skilled professionals in sales, logistics, tech support and operations. Submit your CV today.';
        return view('front.no-vacancy',compact('title', 'description'));
    }

    public function blogsdetail($url){
        $blogsdetail = Blogs::whereNull('deleted_at')->where('status', 'Active')->where('url', $url)->firstOrFail();
         $title = $blogsdetail->meta_title;
        $description = $blogsdetail->meta_description;
        return view('front.blog_detail',compact('title', 'description','blogsdetail'));
    }

    public function gallery(){
        $meta_title = 'Explore Our Gallery | A Visual Journey of Our Excellence';
        $meta_description = 'Explore our gallery where every frame reveals more than just our work; it captures the discipline, detail, and dedication behind everything we stand for.';
        // $gallerydata = ImageSlider::where('deleted_at',null)->get();
        $gallerydata = ImageSlider::all();

        $videodata = Video::whereNull('deleted_at')->get();
        return view('front.gallery',compact('meta_title', 'meta_description','gallerydata','videodata'));
    }

    public function faq(){
        $title = 'Explore Our FAQs | Golden Harbour';
        $description = 'Explore our frequently asked questions and answers about our sourcing, standards, and operations, helping you move forward with confidence.';
        $faqData = Faq::whereNull('deleted_at')->get();
        return view('front.faq',compact('title', 'description','faqData'));
    }

    public function contact(){
        $meta_title = 'Contact Us | Connect with Golden Harbour';
        $meta_description = 'Contact us today to explore how Golden Harbour can be your trusted partner. Reach out to our offices across the MENA region for prompt and reliable support.';
        return view('front.contact',compact('meta_title', 'meta_description'));
    }

    public function faqstore(){
        $validated = request()->validate([
            'question' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
        ]);
        $data = [
            'question' => $validated['question'],
            'email' => $validated['email'],
        ];
        FaqForm::create($data);
        return response()->json(['message' => 'Thank you! Your question has been submitted.']);
    }

    // public function contactstore(Request $request){

    //     $hiddenValue = $request->input('hiddenvalue');
    //     if ($hiddenValue !== '1') {
    //         return back()->withErrors(['form' => 'Form validation failed. Please try again.']);
    //     }
    //     $validated = request()->validate([
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'number' => 'required|numeric',
    //         'company_name' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => ['nullable','string',
    //                     // Block URLs
    //                     function ($attribute, $value, $fail) {
    //                         if (preg_match('/https?:\/\/|www\./i', $value)) {
    //                             $fail('Links are not allowed in message.');
    //                         }
    //                     },
    //                     // Block Cyrillic characters
    //                     function ($attribute, $value, $fail) {
    //                         if (preg_match('/[А-Яа-яЁё]/u', $value)) {
    //                             $fail('Invalid characters detected.');
    //                         }
    //                     },
    //                     // Block spam keywords
    //                     function ($attribute, $value, $fail) {
    //                         $spamWords = [
    //                             'seo',
    //                             'crypto',
    //                             'viagra',
    //                             'casino',
    //                             'furniture',
    //                             'wholesale'
    //                         ];
    //                         foreach ($spamWords as $word) {
    //                             if (stripos($value, $word) !== false) {
    //                                 $fail('Spam content detected.');
    //                                 break;
    //                             }
    //                         }
    //                     }
    //                 ],
    //         'g-recaptcha-response' => 'required',
    //     ]);

    //     $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');
    //     $recaptchaResponse = $request->input('g-recaptcha-response');
    
    //     $verifyResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'secret' => $recaptchaSecret,
    //         'response' => $recaptchaResponse,
    //     ]);
    
    //     $responseKeys = $verifyResponse->json();
    
    //     if (!$responseKeys['success']) {
    //         return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
    //     }
    
    //     $email = $validated['email'];
    //     $emailDomain = explode('@', $email)[1];
    //     $fakeDomains = [
    //         'tempmail.com', 'mailinator.com', 'guerrillamail.com', 'yopmail.com', '10minutemail.com', 'throwawaymail.com'
    //     ];
    
    //     $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    
    //     if (!preg_match($emailPattern, $email) || in_array($emailDomain, $fakeDomains)) {
    //         return back()->withErrors(['email' => 'Please provide a valid email address.']);
    //     }
    //     $domainParts = explode('.', $emailDomain);
    //     if (count($domainParts) < 2 || strlen($domainParts[count($domainParts) - 1]) < 2) {
    //         return back()->withErrors(['email' => 'Please enter a valid email address with a proper domain and TLD.']);
    //     }
    //     if (in_array($emailDomain, $fakeDomains)) {
    //         return back()->withErrors(['email' => 'Please provide a valid email address, not from a disposable email service.']);
    //     }

    //     dd('passed validation');

    //     $data = [
    //         'firstname' => $validated['firstname'],
    //         'lastname' => $validated['lastname'],
    //         'email' => $validated['email'],
    //         'number' => $validated['number'],
    //         'company_name' => $validated['company_name'],
    //         'city' => $validated['city'],
    //         'subject' => $validated['subject'],
    //         'message' => $validated['message'],
    //     ];
    //     Contact::create($data);
    //     $sheetData = [
    //                 'form_type'=>'Contact Form',
    //                 'name'     => ($request->firstname && $request->lastname)
    //                     ? trim($request->firstname . ' ' . $request->lastname)
    //                     : ($request->name ?? $request->fullname ?? $request->firstname ?? ''),
    //                 'company_name' => $request->company_name ?? '',
    //                 'contact' => $request->number ?? $request->phone ?? '',
    //                 'email' => $request->email ?? '',
    //                 'city' => $request->city ?? '',
    //                 'product_title' => $request->product_title ?? '',
    //                 'product_category' => $request->product_category ?? '',
    //                 'product_subcategory' => $request->product_subcategory ?? '',
    //                 'subject' =>  $request->subject ?? '',
    //                 'message' => $request->message ?? '',
    //                 'date'    => now()->format('Y-m-d H:i:s')
    //             ];
    //     try {
    //         // Mail::to($validated['email'])->send(new SendContactMailToUser());
    //         // Mail::to(['webdeveloper11.intelliworkz@gmail.com','webdeveloper10.intelliworkz@gmail.com'])->send(new SendContactMailToAdmin($data));
    //         //return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Email sending failed: ' . $e->getMessage());
    //         //return back()->with('error', 'Failed to send the email. Please try again later.');
    //     }
    //     $response = Http::timeout(30)
    //             ->withHeaders([
    //                 'Content-Type' => 'application/json'
    //             ])
    //             ->post('https://script.google.com/macros/s/AKfycbxhhn1CK9MHsp0Ubj-zEmPWs0PM-E3ljatCA6SjXWLDtU4mACIo4dXgu8WLkIv7EkMuAw/exec', $sheetData);

    //         // Check response
    //         if ($response->successful()) {
    //             $responseData = $response->json();
    //             if (isset($responseData['status']) && $responseData['status'] === 'success') {
    //                 Log::info('Data successfully sent to Google Sheets', [
    //                     'email' => $request->email,
    //                     'response' => $responseData
    //                 ]);
    //                             return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
    //             } else {
    //                 Log::warning('Google Sheets API returned error', [
    //                     'response' => $responseData,
    //                     'email' => $request->email
    //                 ]);
    //                 return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
    //             }
    //         } else {
    //             Log::error('Google Sheets API request failed', [
    //                 'status' => $response->status(),
    //                 'body' => $response->body(),
    //                 'email' => $request->email
    //             ]);
    //                 return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
    //         }
        
    // }
    
    public function contactstore(Request $request)
    {
        //  1. Honeypot / bot field check
        if ($request->input('hiddenvalue') !== '1') {
            return back()->withErrors(['form' => 'Form validation failed.']);
        }
    
        // 2. Validation
        $validated = $request->validate([
            'firstname' => [
                'required','string','max:255',
    
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed.');
                    }
                    if (preg_match('/[\x{0400}-\x{04FF}]/u', $value)) {
                        $fail('Invalid characters detected.');
                    }
    
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale'];
                    foreach ($spamWords as $word) {
                        if (stripos($value, $word) !== false) {
                            $fail('Spam content detected.');
                            break;
                        }
                    }
                }
            ],
    
            'lastname' => [
                'required','string','max:255',
    
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed.');
                    }
                    if (preg_match('/[\x{0400}-\x{04FF}]/u', $value)) {
                        $fail('Invalid characters detected.');
                    }
    
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale'];
                    foreach ($spamWords as $word) {
                        if (stripos($value, $word) !== false) {
                            $fail('Spam content detected.');
                            break;
                        }
                    }
                }
            ],
    
            'email' => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) {
                    $domain = strtolower(substr(strrchr($value, "@"), 1));
    
                    $blocked = [
                        'mail.ru',
                        'yopmail.com',
                        'tempmail.com',
                        '10minutemail.com',
                        'guerrillamail.com',
                        'throwawaymail.com',
                        'mailinator.com',
                    ];
    
                    if (in_array($domain, $blocked)) {
                        $fail('Disposable email not allowed.');
                    }
                }
            ],
    
            'number' => 'required|numeric|digits_between:10,15',
            'company_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
    
            'message' => [
                'nullable','string','max:500',
    
                function ($attribute, $value, $fail) {
                    if (!$value) return;
    
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed in message.');
                    }
    
                    if (preg_match('/[\x{0400}-\x{04FF}]/u', $value)) {
                        $fail('Invalid characters detected.');
                    }
    
                    $spamWords = ['seo','crypto','viagra','casino','furniture','wholesale'];
                    $count = 0;
    
                    foreach ($spamWords as $word) {
                        if (stripos($value, $word) !== false) {
                            $count++;
                        }
                    }
    
                    if ($count >= 2) {
                        $fail('Spam content detected.');
                    }
    
                    preg_match_all('/https?:\/\/|www\./i', $value, $matches);
                    if (count($matches[0]) > 1) {
                        $fail('Too many links not allowed.');
                    }
                }
            ],
            'g-recaptcha-response' => 'required',
        ]);
    
        $verifyResponse = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );
        if (!$verifyResponse->json('success')) {
            Log::error('reCAPTCHA failed', [
                'response' => $verifyResponse->json()
            ]);
            return back()->withErrors([
                'g-recaptcha-response' => 'reCAPTCHA verification failed.'
            ])->withInput();
        }
        if (!$verifyResponse->json('success')) {
            return back()->withErrors([
                'g-recaptcha-response' => 'reCAPTCHA failed.'
            ]);
        }
    
        // 4. Email domain safety check (extra layer)
        $email = $validated['email'];
        $domain = strtolower(substr(strrchr($email, "@"), 1));
    
        $blockedDomains = [
            'mail.ru','yopmail.com','tempmail.com',
            '10minutemail.com','guerrillamail.com','mailinator.com'
        ];
    
        if (in_array($domain, $blockedDomains)) {
            return back()->withErrors(['email' => 'Invalid email domain.']);
        }
    
        // 5. Save data
        $contact = Contact::create($validated);
    
        // 6. Google Sheets payload
        $sheetData = [
            'form_type' => 'Contact Form',
            'name' => trim($request->firstname . ' ' . $request->lastname),
            'company_name' => $request->company_name,
            'contact' => $request->number,
            'email' => $request->email,
            'city' => $request->city,
            'subject' => $request->subject,
            'message' => $request->message,
            'date' => now()->format('Y-m-d H:i:s')
        ];
    
        // 7. Send to Google Sheets (safe handling)
        try {
            Http::timeout(30)->post(
                'https://script.google.com/macros/s/AKfycbxhhn1CK9MHsp0Ubj-zEmPWs0PM-E3ljatCA6SjXWLDtU4mACIo4dXgu8WLkIv7EkMuAw/exec',
                $sheetData
            );
        } catch (\Exception $e) {
            Log::error('Google Sheet error: ' . $e->getMessage());
        }
    
        return redirect()->route('thankyou')
            ->with('success', 'Your message has been sent successfully.');
    }
    
    public function catalogue(){
        $meta_title = 'Our E-Catalogues | Golden Harbour Product Range';
        $meta_description = 'Browse through our comprehensive collection of product catalogues designed to help you explore, compare, and choose with clarity.';
        $catalog = Catalog::whereNull('deleted_at')->get();
        return view('front.catalogue',compact('meta_title', 'meta_description','catalog'));
    }
    
    public function getsubcategory($url)
    {
        $category = Category::where('url', $url)->first();

    if (!$category) {
        abort(404, 'Category not found');
    }

    // Step 2: Set meta title and description from category
    $meta_title = $category->meta_title ?? 'SubCategory';
    $meta_description = $category->meta_description ?? 'SubCategory Of the product';
        // $title = 'SubCategory';
        // $description = 'SubCategory Of the product';
        $subcategory = SubCategory::with(['category', 'products'])
        ->whereHas('category', function ($query) use ($url) {
            $query->where('url', $url);
        })
        ->whereNull('deleted_at')
        ->get();
        
        
       
        return view('front.subcategory',compact('meta_title', 'meta_description','subcategory', 'category'));
    }
    public function getproduct($categoryUrl, $subcategoryUrl)
{
    $title = 'Product';
    $description = 'Product Description For All the product';

    // Step 1: Fetch category
    $category = Category::where('url', $categoryUrl)->first();
    if (!$category) {
        abort(404, 'Category not found');
    }

    // Step 2: Fetch subcategory under that category
    $subcategory = SubCategory::where('url', $subcategoryUrl)
        ->where('category_id', $category->id)
        ->first();

    if (!$subcategory) {
        abort(404, 'Subcategory not found or does not belong to category');
    }

    // Step 3: Set meta (from this subcategory)
    $meta_title = $subcategory->meta_title ?? 'SubCategory';
    $meta_description = $subcategory->meta_description ?? 'SubCategory Of the product';

    // Step 4: Fetch products under subcategory
    $products = Product::with(['category', 'subcategory', 'subproducts'])
        ->where('subcategory_id', $subcategory->id)
        ->where('category_id', $category->id)
        ->whereNull('deleted_at')
        ->get();

    // Step 5: If no products, redirect to first product detail (if any)
    if ($products->isEmpty()) {
        $firstProduct = Product::with('subcategory')
            ->where('subcategory_id', $subcategory->id)
            ->where('category_id', $category->id)
            ->whereNull('deleted_at')
            ->first();

        if ($firstProduct) {
            return redirect()->route('productdetail', [
                'category' => $category->url,
                'subcategory' => $subcategory->url,
                'product' => $firstProduct->url
            ]);
        } else {
            // No products at all under this subcategory
            abort(404, 'No products found for this subcategory');
        }
    }

    // Step 6: Return product listing view
    return view('front.product', compact('meta_title', 'meta_description', 'products', 'subcategory', 'category'));
}
    public function getsubproduct($categoryUrl, $subcategoryUrl, $productUrl)
    {
        // $title = 'Sub Product';
        // $description = 'Sub Product Description under the selected Product';
    
        // Find the product with its subcategory and category
        $product = Product::with(['subcategory.category', 'subproducts'])
            ->where('url', $productUrl)
            ->whereNull('deleted_at')
            ->first();
    
        if (!$product) {
            abort(404, 'Product not found');
        }
    
        $subcategory = $product->subcategory;
        $category = $subcategory->category;
    
        // Check if URL segments match to avoid mismatch
        if ($subcategory->url !== $subcategoryUrl || $category->url !== $categoryUrl) {
            abort(404, 'URL mismatch');
        }
        $meta_title = $product->meta_title ?? 'Sub Product';
        $meta_description = $product->meta_description ?? 'Sub Product Description under the selected Product';
        // Get all subproducts for this product
        $subproducts = $product->subproducts()->whereNull('deleted_at')->get();
    
        return view('front.subproduct', compact('meta_title', 'meta_description', 'product', 'subcategory', 'category', 'subproducts'));
    }
    public function productdetail($category, $subcategory, $product)
    {
        $categoryModel = Category::where('url', $category)->firstOrFail();
        $subcategoryModel = SubCategory::where('url', $subcategory)
        ->where('category_id', $categoryModel->id)
        ->firstOrFail();
 
        // Now fetch the correct product by matching all 3: url, category_id, subcategory_id
        $product = Product::with(['category', 'subcategory'])
        ->where('url', $product)
        ->where('category_id', $categoryModel->id)
        ->where('subcategory_id', $subcategoryModel->id)
        ->firstOrFail();
         $meta_title = $product->meta_title ?? $product->name ?? 'Product Detail';
        $meta_description = $product->meta_description ?? 'Detailed description of the product';
        $productImages = $product->detail_images;
       $industryIds = $product->industries;

        // Handle both JSON string and array safely
        if (is_string($industryIds)) {
            $industryIds = json_decode($industryIds, true);
        }
        
        $industryIds = is_array($industryIds) ? array_map('intval', $industryIds) : [];
        
        $industrydata = null;
        
        if (!empty($industryIds)) {
            $industrydata = IndustryProduct::whereIn('id', $industryIds)
                ->whereNull('deleted_at')
                ->get();
        }
        return view('front.product-detail', compact('meta_title', 'meta_description', 'product','productImages','industrydata'));
    }
    
//     public function productdetail($category, $subcategory, $product)
// {
//     $categoryModel = Category::where('url', $category)->firstOrFail();

//     $subcategoryModel = SubCategory::where('url', $subcategory)
//         ->where('category_id', $categoryModel->id)
//         ->firstOrFail();

//     $product = Product::with(['category', 'subcategory'])
//         ->where('url', $product)
//         ->where('category_id', $categoryModel->id)
//         ->where('subcategory_id', $subcategoryModel->id)
//         ->firstOrFail();

//     $productImages = $product->detail_images;

//     // ✅ Decode and sanitize the industry IDs
//   $industryIds = json_decode($product->industries, true) ?? [];
//     $industryIds = array_filter(array_map('intval', $industryIds));

//     // ✅ Fetch those IndustryProduct records
//     $linkedIndustries = IndustryProduct::whereIn('id', $industryIds)->get()->keyBy('id');

//     return view('front.product-detail', compact(
//         'product',
//         'productImages',
//         'orderedIndustries',
//         'industryFolder'
//     ));
// }
     public function subproductDetail($category, $subcategory, $product, $subproduct)
{
     $categoryModel = Category::where('url', $category)->firstOrFail();
    $subcategoryModel = SubCategory::where('url', $subcategory)
        ->where('category_id', $categoryModel->id)
        ->firstOrFail();

    $productModel = Product::where('url', $product)
        ->where('subcategory_id', $subcategoryModel->id)
        ->where('category_id', $categoryModel->id)
        ->firstOrFail();

    // Now fetch the SubProduct that belongs to this product and matches the URL
    $subproductData = SubProduct::with(['product', 'category', 'subcategory'])
        ->where('url', $subproduct)
        ->where('product_id', $productModel->id)
        ->where('subcategory_id', $subcategoryModel->id)
        ->where('category_id', $categoryModel->id)
        ->firstOrFail();
        
    $meta_title = $subproductData->meta_title ?? $subproductData->name ?? 'Subproduct Detail';
    $meta_description = $subproductData->meta_description ?? 'Detailed description of the subproduct';

    // View me wohi product-detail.blade.php file use karo
    return view('front.product-detail', [
        'type' => 'subproduct', // extra flag
        'subproduct' => $subproductData,
        'product' => $subproductData->product,
        'category' => $subproductData->category,
        'subcategory' => $subproductData->subcategory,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'productImages' => is_string($subproductData->detail_images) && !empty($subproductData->detail_images)
    ? json_decode($subproductData->detail_images, true)
    : [],
        // 'productImages' => $subproductData->detail_images ?? []
    ]);
}
    public function milestone()
    {
        $meta_title = 'Our Milestone | Journey of Growth & Excellence';
        $meta_description = 'Since our founding in 1938, Golden Harbour has grown from a local enterprise into a regional force in the marine, offshore, oilfield, and industrial sectors.';
        $milestone = Milestone::orderBy('year', 'asc')->whereNull('deleted_at')->get();

        return view('front.milestone',compact('meta_title','meta_description','milestone'));
    }
    public function certifications()
    {
        $meta_title = 'Certification | Our Commitment to Quality';
        $meta_description = 'At Golden Harbour, quality is not just a standard, it is our foundation. We are dedicated to delivering products that meet and exceed customer expectations.';
        $certificates = Certificate::whereNull('deleted_at')->get();
        return view('front.certifications',compact('meta_title','meta_description','certificates'));
    }
    public function ouragencies()
    {
        $meta_title = 'Our Agencies | Golden Harbour';
        $meta_description = 'We are partners with leading global manufacturers to deliver trusted, high-performance solutions across the marine, offshore, oilfield, and industrial sectors.';
        $principals = Agencies::orderBy('id', 'asc')->whereNull('deleted_at')->get();
        $agencyslider = AgencySlider::whereNull('deleted_at')->orderBy('id', 'asc')->get();
        return view('front.our-agencies',compact('meta_title','meta_description','principals','agencyslider'));
    }
    public function currentopportunities() {
        $title = 'Current Openings | Golden Harbour';
        $description = 'Whether you are an experienced professional or just starting your career, we offer opportunities that match your skills and aspirations.';
        
        $jobCategories = JobCategory::whereNull('deleted_at')->get();
    
        $jobs = Job::whereNull('deleted_at')
            ->orderBy('jobcategory_id')
            ->get()
            ->groupBy('jobcategory_id');
            // Check if there are any jobs at all
            if ($jobs->isEmpty() || $jobs->flatten()->isEmpty()) {
                return redirect()->route('novacancy')->with([
                    'title' => $title,
                    'description' => $description,
                ]);
            }
                    
        return view('front.current-opportunities', compact('title', 'description', 'jobCategories', 'jobs'));
    }
    public function currentoppdetails($url) {
        
        $job = Job::where('url', $url)->whereNull('deleted_at')->firstOrFail();
        $title = $job->title;
        $description = $job->short_description;
        
        return view('front.current-vacancies-detail', compact('title', 'description', 'job'));
    }
    public function privacypolicy (){
        $title = 'Privacy Policy | How We Collect & Protect Your Data';
        $description = 'At Golden Harbour, we ensure your personal information is handled securely. Learn about our data collection practices, use of cookies, rights, and how to contact us.';
        return view('front.privacy-policy',compact('title', 'description'));
    }
    public function termsandconditions (){
        $title = 'Our Terms & Conditions | Website Use Agreement ';
        $description = 'Read the Terms & Conditions for using Golden Harbour’s website, including your rights, responsibilities, product availability, and liability limitations.';
        return view('front.terms-and-conditions',compact('title', 'description'));
    }
    public function ourculture()
    {
        $meta_title = 'Our Culture & Values at Golden Harbour';
        $meta_description = 'Our culture is built on trust, teamwork, and the drive to create impactful solutions. We believe that our people define our success.';
        return view('front.our-culture',compact('meta_title', 'meta_description'));
    }
    public function thankyou()
    {
        $title = 'thank you';
        $description = 'thank you Description';
        return view('front.thank_you',compact('title', 'description'));
    }
    public function vacancystore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'current_location' => 'nullable|string',
            'linked_link' => 'nullable|string',
            'resume_path' => 'required|mimes:pdf,doc,docx|max:5120',
            'applied_for' => 'required|string'
        ]);
 
        $post = new VacancyForm();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->current_location = $request->current_location;
        $post->linked_link = $request->linked_link;
        $post->applied_for = $request->applied_for;
       if ($request->hasFile('resume_path')) {
            $file = $request->file('resume_path');
            $filename = $file->getClientOriginalName();
            $path = public_path('resumes');
            
            // Ensure the directory exists
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            
            // Save the filename or relative path as needed
            $post->resume_path = $filename;
        }
        $post->save();
 
        return redirect()->route('thankyou')->with('success', 'Your vacancyform has been submitted successfully!');
    }
    public function productenquiry(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'nullable|string',
            'product_title' => 'required',
            'product_category' => 'required',
            'product_subcategory' => 'required',
        ]);
 
        $email = $validated['email'];
        $emailDomain = explode('@', $email)[1];
        $fakeDomains = [
            'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
            'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
            'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
            'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
            'trashmail.com', 'mintemail.com', 'mytemp.email','tempmail.com',
        ];
   
        // $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        // if (!preg_match($emailPattern, $email) || in_array($emailDomain, $fakeDomains)) {
        //     return back()->withErrors(['email' => 'Please provide a valid email address.']);
        // }
        // $domainParts = explode('.', $emailDomain);
        // if (count($domainParts) < 2 || strlen($domainParts[count($domainParts) - 1]) < 2) {
        //     return back()->withErrors(['email' => 'Please enter a valid email address']);
        // }
        if (in_array($emailDomain, $fakeDomains)) {
            return back()->withErrors(['email' => 'Please provide a valid email address']);
        }
 
        $post = new ProductEnquiry();
        $post->firstname = $request->firstname;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->message = $request->message;
        $post->product_title = $request->product_title;
        $post->product_category = $request->product_category;
        $post->product_subcategory = $request->product_subcategory;
        $post->save();
      
        $sheetData = [
            'form_type'=>'Product Form',
            'name'     => ($request->firstname && $request->lastname)
                ? trim($request->firstname . ' ' . $request->lastname)
                : ($request->name ?? $request->fullname ?? $request->firstname ?? ''),
            'company_name' => $request->company_name ?? '',
            'contact' => $request->number ?? $request->phone ?? '',
            'email' => $request->email ?? '',
            'city' => $request->city ?? '',
            'product_title' => $request->product_title ?? '',
            'product_category' => $request->product_category ?? '',
            'product_subcategory' => $request->product_subcategory ?? '',
            'subject' =>  $request->subject ?? '',
            'message' => $request->message ?? '',
            'date'    => now()->format('Y-m-d H:i:s')
        ];
        try {
            Http::timeout(30)->post(
                'https://script.google.com/macros/s/AKfycbxhhn1CK9MHsp0Ubj-zEmPWs0PM-E3ljatCA6SjXWLDtU4mACIo4dXgu8WLkIv7EkMuAw/exec',
                $sheetData
            );
        } catch (\Exception $e) {
            Log::error('Google Sheet error: ' . $e->getMessage());
        }
        
        try {
            // Send mail to user
            Mail::to($validated['email'])->send(new SendProductEnquiryMailToUser($post));
    
            // Send mail to admin
            Mail::to('support@goldenharbour.ae')->send(new SendProductEnquiryMailToAdmin($post));
    
        } catch (\Exception $e) {
            \Log::error('Product enquiry email sending failed: ' . $e->getMessage());
            // return back()->with('error', 'Your enquiry was saved, but email sending failed. Please try again later.');
        }
        
        return redirect()->route('thankyou')->with('success', 'Your form has been submitted successfully!');
    }
    public function autocomplete(Request $request)
{
    $query = $request->get('query');

    // Categories
    $categories = Category::where('name', 'LIKE', "%$query%")
        ->get(['name', 'url']);

    // Subcategories with parent category
    $subcategories = SubCategory::with('category')
        ->where('name', 'LIKE', "%$query%")
        ->get(['name', 'url', 'category_id']);

    // Products with parent category and subcategory
    $products = Product::with(['category', 'subcategory'])
        ->where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
              ->orWhereHas('subcategory', function ($subQ) use ($query) {
                  $subQ->where('name', 'LIKE', "%{$query}%");
              })
              ->orWhereRaw('EXISTS (SELECT 1 FROM subcategory WHERE subcategory.id = product.subcategory_id AND CONCAT(subcategory.name, " ", product.title) LIKE ?)', ["%{$query}%"]);
        })
        ->get(['title', 'url', 'category_id', 'subcategory_id', 'id']);

    $html = '';

    // Categories
    foreach ($categories as $item) {
        $url = url("/product/{$item->url}");
        $html .= "<div data-url='{$url}'>" . htmlspecialchars($item->name) . "</div>";
    }

    // Subcategories
    foreach ($subcategories as $item) {
        if ($item->category) {
            $url = url("/product/{$item->category->url}/{$item->url}");
            $html .= "<div data-url='{$url}'>" . htmlspecialchars($item->name) . "</div>";
        }
    }

    // Products - show "Subcategory – Product"
    foreach ($products as $item) {
        if ($item->category && $item->subcategory) {
            $url = url("/product/{$item->category->url}/{$item->subcategory->url}/{$item->url}/detail");
            $subcategoryName = $item->subcategory->name ?? '';
            $html .= "<div data-url='{$url}'>" . htmlspecialchars("{$subcategoryName} – {$item->title}") . "</div>";
        }
    }

    // No results
    if ($html === '') {
        $html = "<div class='no-result'>No match found</div>";
    }

    return response($html);
}

public function productSearch(Request $request)
{
    $search = trim((string) $request->get('query'));
    $categoryIds = array_filter((array) $request->get('categories', []));
    $industryIds = array_filter((array) $request->get('industries', []));

    if (strlen($search) < 2) {
        return response()->json([]);
    }

    [$products, $subproducts] = $this->getProductSearchMatches($search, $categoryIds, $industryIds);

    $suggestedSearch = null;
    if ($products->isEmpty() && $subproducts->isEmpty()) {
        $suggestedSearch = $this->suggestProductSearchTerm($search, $categoryIds, $industryIds);
        if ($suggestedSearch) {
            [$products, $subproducts] = $this->getProductSearchMatches($suggestedSearch, $categoryIds, $industryIds);
        }
    }

    // Collect all industry IDs
    $allIndustryIds = [];
    foreach ($products as $product) {
        $pInds = $product->industries;
        if (is_string($pInds)) {
            $pInds = json_decode($pInds, true);
        }
        if (is_array($pInds)) {
            $allIndustryIds = array_merge($allIndustryIds, $pInds);
        }
    }
    foreach ($subproducts as $subproduct) {
        if ($subproduct->product) {
            $pInds = $subproduct->product->industries;
            if (is_string($pInds)) {
                $pInds = json_decode($pInds, true);
            }
            if (is_array($pInds)) {
                $allIndustryIds = array_merge($allIndustryIds, $pInds);
            }
        }
    }
    $allIndustryIds = array_unique(array_filter(array_map('intval', $allIndustryIds)));

    $industryMap = [];
    if (!empty($allIndustryIds)) {
        $industryMap = IndustryProduct::whereIn('id', $allIndustryIds)
            ->whereNull('deleted_at')
            ->pluck('title', 'id')
            ->toArray();
    }

    $mappedProducts = $products->map(function ($product) use ($industryMap) {
        if (!$product->category || !$product->subcategory) {
            return null;
        }

        $pInds = $product->industries;
        if (is_string($pInds)) {
            $pInds = json_decode($pInds, true);
        }
        $pInds = is_array($pInds) ? array_map('intval', $pInds) : [];
        $productIndustries = [];
        foreach ($pInds as $id) {
            if (isset($industryMap[$id])) {
                $productIndustries[] = $industryMap[$id];
            }
        }

        return [
            'title' => $product->title,
            'category' => $product->category->name,
            'subcategory' => $product->subcategory->name,
            'image' => asset('public/product_front_image/' . $product->front_image),
            'type' => 'Product',
            'industries' => implode(', ', $productIndustries),
            'url' => route('productdetail', [
                'category' => $product->category->url,
                'subcategory' => $product->subcategory->url,
                'product' => $product->url,
            ]),
        ];
    })->filter();

    $mappedSubproducts = $subproducts->map(function ($subproduct) use ($industryMap) {
        if (!$subproduct->category || !$subproduct->subcategory || !$subproduct->product) {
            return null;
        }

        $pInds = $subproduct->product->industries;
        if (is_string($pInds)) {
            $pInds = json_decode($pInds, true);
        }
        $pInds = is_array($pInds) ? array_map('intval', $pInds) : [];
        $subproductIndustries = [];
        foreach ($pInds as $id) {
            if (isset($industryMap[$id])) {
                $subproductIndustries[] = $industryMap[$id];
            }
        }

        return [
            'title' => $subproduct->title,
            'category' => $subproduct->category->name,
            'subcategory' => $subproduct->subcategory->name,
            'image' => asset('public/subproduct_front_image/' . $subproduct->front_image),
            'type' => 'Sub Product',
            'industries' => implode(', ', $subproductIndustries),
            'url' => route('subproductdetail', [
                'category' => $subproduct->category->url,
                'subcategory' => $subproduct->subcategory->url,
                'product' => $subproduct->product->url,
                'subproduct' => $subproduct->url,
            ]),
        ];
    })->filter();

    $results = $mappedProducts->merge($mappedSubproducts)->values();

    if ($suggestedSearch && $results->isNotEmpty()) {
        return response()->json([
            'suggestion' => $suggestedSearch,
            'items' => $results,
        ]);
    }

    return response()->json($results);
}

private function getProductSearchMatches($search, $categoryIds, $industryIds)
{
    $products = Product::with(['category', 'subcategory'])
        ->whereNull('deleted_at')
        // ->whereHas('category', function($q){
        //     $q->whereRaw('LOWER(name) != ?', ['ferrous metal & alloys']);
        // })
        ->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhereHas('subcategory', function ($subQ) use ($search) {
                  $subQ->where('name', 'LIKE', "%{$search}%");
              })
              ->orWhereRaw('EXISTS (SELECT 1 FROM subcategory WHERE subcategory.id = product.subcategory_id AND CONCAT(subcategory.name, " ", product.title) LIKE ?)', ["%{$search}%"]);
        })
        ->when(!empty($categoryIds), function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->when(!empty($industryIds), function ($query) use ($industryIds) {
            $query->where(function ($q) use ($industryIds) {
                foreach ($industryIds as $id) {
                    $q->orWhere('industries', 'LIKE', "%\"{$id}\"%")
                      ->orWhere('industries', 'LIKE', "%{$id}%");
                }
            });
        })
        ->get();

    $subproducts = SubProduct::with(['category', 'subcategory', 'product'])
        ->whereNull('deleted_at')
        ->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhereHas('subcategory', function ($subQ) use ($search) {
                  $subQ->where('name', 'LIKE', "%{$search}%");
              })
              ->orWhereRaw('EXISTS (SELECT 1 FROM subcategory WHERE subcategory.id = subproduct.subcategory_id AND CONCAT(subcategory.name, " ", subproduct.title) LIKE ?)', ["%{$search}%"])
              ->orWhereRaw('EXISTS (SELECT 1 FROM product WHERE product.id = subproduct.product_id AND CONCAT(product.title, " ", subproduct.title) LIKE ?)', ["%{$search}%"]);
        })
        ->when(!empty($categoryIds), function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->when(!empty($industryIds), function ($query) use ($industryIds) {
            $query->whereHas('product', function ($q) use ($industryIds) {
                $q->where(function ($sq) use ($industryIds) {
                    foreach ($industryIds as $id) {
                        $sq->orWhere('industries', 'LIKE', "%\"{$id}\"%")
                           ->orWhere('industries', 'LIKE', "%{$id}%");
                    }
                });
            });
        })
        ->get();

    return [$products, $subproducts];
}

private function suggestProductSearchTerm($search, $categoryIds, $industryIds)
{
    $phrases = $this->productSearchPhrases($categoryIds, $industryIds);
    $normalizedSearch = $this->normalizeSearchText($search);
    if ($normalizedSearch === '') {
        return null;
    }

    foreach ($phrases as $phrase) {
        if (strpos($this->normalizeSearchText($phrase), $normalizedSearch) === 0) {
            return $phrase;
        }
    }

    $words = [];
    foreach ($phrases as $phrase) {
        foreach (explode(' ', $this->normalizeSearchText($phrase)) as $word) {
            if (strlen($word) > 2) {
                $words[$word] = $word;
            }
        }
    }

    $corrected = [];
    foreach (explode(' ', $normalizedSearch) as $queryWord) {
        if ($queryWord === '') {
            continue;
        }

        $bestWord = $queryWord;
        $bestDistance = 99;
        foreach ($words as $word) {
            if (abs(strlen($word) - strlen($queryWord)) > 2) {
                continue;
            }

            $distance = levenshtein($queryWord, $word);
            if ($distance < $bestDistance) {
                $bestDistance = $distance;
                $bestWord = $word;
            }
        }

        $corrected[] = $bestDistance <= 2 ? $bestWord : $queryWord;
    }

    $suggestion = trim(implode(' ', $corrected));
    return $suggestion !== $normalizedSearch ? $suggestion : null;
}

private function productSearchPhrases($categoryIds, $industryIds)
{
    $products = Product::with(['category', 'subcategory'])
        ->whereNull('deleted_at')
        ->whereHas('category', function($q){
            $q->whereRaw('LOWER(name) != ?', ['ferrous metal & alloys']);
        })
        ->when(!empty($categoryIds), function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->when(!empty($industryIds), function ($query) use ($industryIds) {
            $query->where(function ($q) use ($industryIds) {
                foreach ($industryIds as $id) {
                    $q->orWhere('industries', 'LIKE', "%\"{$id}\"%")
                      ->orWhere('industries', 'LIKE', "%{$id}%");
                }
            });
        })
        ->limit(300)
        ->get();

    $subproducts = SubProduct::with(['category', 'subcategory', 'product'])
        ->whereNull('deleted_at')
        ->when(!empty($categoryIds), function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->when(!empty($industryIds), function ($query) use ($industryIds) {
            $query->whereHas('product', function ($q) use ($industryIds) {
                $q->where(function ($sq) use ($industryIds) {
                    foreach ($industryIds as $id) {
                        $sq->orWhere('industries', 'LIKE', "%\"{$id}\"%")
                           ->orWhere('industries', 'LIKE', "%{$id}%");
                    }
                });
            });
        })
        ->limit(300)
        ->get();

    $phrases = [];
    foreach ($products as $product) {
        $phrases[] = $product->title;
        $phrases[] = trim(($product->subcategory->name ?? '') . ' ' . $product->title);
        $phrases[] = trim(($product->category->name ?? '') . ' ' . ($product->subcategory->name ?? '') . ' ' . $product->title);
    }

    foreach ($subproducts as $subproduct) {
        $phrases[] = $subproduct->title;
        $phrases[] = trim(($subproduct->product->title ?? '') . ' ' . $subproduct->title);
        $phrases[] = trim(($subproduct->subcategory->name ?? '') . ' ' . $subproduct->title);
    }

    return array_values(array_filter(array_unique($phrases)));
}

private function normalizeSearchText($value)
{
    $value = strtolower((string) $value);
    $value = preg_replace('/[^a-z0-9]+/', ' ', $value);
    return trim(preg_replace('/\s+/', ' ', $value));
}


    public function CatelogueSubmit(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'company_name' => 'required',
            'phone' => 'required|string|max:30',
            'email' => 'required|email',
            'message' => 'required|string',
            // 'g-recaptcha-response' => 'required', 
        ]);
        
        $catalogueData = [
            'fullname' => $validated['fullname'],
            'company_name' => $validated['company_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];
        Catelogue::create($catalogueData);
            $sheetData = [
                    'form_type'=>'Catelogue Form',
                    'name'     => ($request->firstname && $request->lastname)
                        ? trim($request->firstname . ' ' . $request->lastname)
                        : ($request->name ?? $request->fullname ?? $request->firstname ?? ''),
                    'company_name' => $request->company_name ?? '',
                    'contact' => $request->number ?? $request->phone ?? '',
                    'email' => $request->email ?? '',
                    'city' => $request->city ?? '',
                    'product_title' => $request->product_title ?? '',
                    'product_category' => $request->product_category ?? '',
                    'product_subcategory' => $request->product_subcategory ?? '',
                    'subject' =>  $request->subject ?? '',
                    'message' => $request->message ?? '',
                    'date'    => now()->format('Y-m-d H:i:s')
                ];
        try {
            // Mail::to($validated['email'])->send(new SendCatalogueMailToUser());
            // Mail::to(['webdeveloper3.intelliworkz@gmail.com','mital@intelliworkz.tech','webdeveloper11.intelliworkz@gmail.com','webdeveloper10.intelliworkz@gmail.com'])->send(new SendCatalogueMailToAdmin($catalogueData));
          //return redirect()->route('dashboard')->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
           // return back()->with('error', 'Failed to send the email. Please try again later.');
        }
        $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbxhhn1CK9MHsp0Ubj-zEmPWs0PM-E3ljatCA6SjXWLDtU4mACIo4dXgu8WLkIv7EkMuAw/exec', $sheetData);

            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                    try {
                        // Mail::to($validated['email'])
                        //     ->send(new SendCatalogueMailToUser());
    
                        // Mail::to(['webdeveloper12.intelliworkz@gmail.com']) // for testing i have set my personal mail so when un coment then replace mail
                        //     ->send(new SendCatalogueMailToAdmin($catalogueData));
    
                    } catch (\Throwable $e) {
                        Log::info('Mail failed', [
                            'message' => $e->getMessage(),
                            'file' => $e->getFile(),
                            'line' => $e->getLine()
                        ]);
                    }
                    
                     return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
 
            }
    }
    
    public function DatasheetSubmit(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'company_name' => 'required',
            'phone' => 'required|string|max:30',
            'email' => 'required|email',
            'message' => 'required|string',
            'product_id' => 'required|integer',
            'pdf_name' => 'required|string',
        ]);
        
        $catalogueData = [
            'fullname' => $validated['fullname'],
            'company_name' => $validated['company_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'product_id' => $validated['product_id'],
        ];
        
        Catelogue::create($catalogueData);
        
        $sheetData = [
            'form_type' => 'Datasheet Form',
            'name'     => $validated['fullname'],
            'company_name' => $validated['company_name'],
            'contact' => $validated['phone'],
            'email' => $validated['email'],
            'city' => '',
            'product_title' => $request->product_title ?? '',
            'product_category' => $request->product_category ?? '',
            'product_subcategory' => $request->product_subcategory ?? '',
            'subject' => 'Datasheet Download Request',
            'message' => $validated['message'],
            'date'    => now()->format('Y-m-d H:i:s')
        ];
        
        try {
            Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbzr6WSvBdHw7wN8p2VVpFE_FnncmGVkacyKXxHwOFoaEKRHpZGqf1x2T8KgENhFjOsR/exec', $sheetData);
        } catch (\Exception $e) {
            Log::error('Google Sheet error in DatasheetSubmit: ' . $e->getMessage());
        }
        
        return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');

        //$pdfUrl = asset('public/product_pdf/' . $validated['pdf_name']);
        //return redirect()->back()->with('success', 'Your request has been submitted successfully');
        //->with('download_pdf', $pdfUrl);
    }
    
    public function novacancystore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:70', 
            'email' => 'required|email|max:60',
            'phone' => 'required|digits_between:10,15',
            'current_location' => 'nullable|string|max:100',
            'linked_in' => 'nullable|max:60',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // ✅ Handle file upload properly
        $resumeFileName = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $resumeFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file->getClientOriginalName());
            $path = public_path('novacancy_resumes');
    
            // Create folder if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
    
            $file->move($path, $resumeFileName);
        }
    
        Novacancy::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'current_location' => $request->current_location,
            'linked_in' => $request->linked_in,
            'resume' => 'novacancy_resumes/' . $resumeFileName, // ✅ path saved
        ]);
    
        return redirect()->route('thankyou')->with('success', 'Your Novacancy form has been submitted successfully!');
    }
    
    public function whatsaapinquiry(Request $request)
    {
        WhatsappInquiry::create([
           
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
    
        // Google Sheet expects:
        // form_type, contact, message, date
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
        try {
            Http::withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbw5fJDG1gpW1LOQikmqJfL2TmT17jVGqeNufmd_8ouqOjZiY0e19aLM4tlfmDUY5HsZ/exec', 
                    $sheetsData
                );
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        
        $number = '971529037471'; // Change if needed
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return redirect()->away($whatsappUrl);
    }


}
