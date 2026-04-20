<style>
.ft_itmes li:not(:last-child) {
    margin-bottom: 15px;
}

.ft_itmes li {
    line-height: normal;
}

.WhatsAppButton {
    position: relative;
    transform: translate(120px, 0);
    width: 170px;
    overflow: hidden;
    background-color: #25d366;
    color: #fff;
    border-radius: 10px 0 0 10px;
    transition: all .5s ease-in-out;
    vertical-align: middle;
}

.float-buttons {
    position: fixed;
    top: 80%;
    right: 0;
    z-index: 900;
}

.WhatsAppButton i {
    font-size: 30px;
    color: #fff;
    line-height: 30px;
    margin-left: 4px;
    margin-right: 10px;
    padding: 10px;
    transform: rotate(0);
    transition: all .5s ease-in-out;
    text-align: center !important;
}

.WhatsAppButton a span {
    color: #fff;
    font-size: 15px;
    padding-top: 8px;
    padding-bottom: 10px;
    position: absolute;
    line-height: 16px;
    font-weight: bolder;
}

.WhatsAppButton:hover {
    color: #fff;
    background-color: #182a41;
    transform: translate(0, 0);
}

.enquiry-now-wrapper {
    position: fixed;
    top: 50%;
    right: -15px;
    transform: translateY(-50%);
    rotate: 90deg;
    z-index: 1001;
}
</style>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-12 mb-5 mb-md-0">
                        <img src="{{ asset('public/front/images//GOLDEN-HARBOUR-blue.svg') }}" alt="Logo"
                            class="img-fluid footer-logo mb-4">
                        <p class="foot_lt_para">Golden Harbour, part of the Al Mufaddal Group’s 85-year legacy, delivers
                            trusted solutions for the Oil & Gas, Marine, Offshore, Energy, and Industrial sectors. Our
                            footprint spans across the MENA region with offices in Dubai, Abu Dhabi, Jebel Ali, and
                            Bahrain.</p>
                        <div class="d-flex gap-3 mt-4 mt-md-0">
                            <a href="https://www.linkedin.com/company/golden-harbour-llc/" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M22.2234 0H1.77187C0.792187 0 0 0.773438 0 1.72969V22.2656C0 23.2219 0.792187 24 1.77187 24H22.2234C23.2031 24 24 23.2219 24 22.2703V1.72969C24 0.773438 23.2031 0 22.2234 0ZM7.12031 20.4516H3.55781V8.99531H7.12031V20.4516ZM5.33906 7.43437C4.19531 7.43437 3.27187 6.51094 3.27187 5.37187C3.27187 4.23281 4.19531 3.30937 5.33906 3.30937C6.47812 3.30937 7.40156 4.23281 7.40156 5.37187C7.40156 6.50625 6.47812 7.43437 5.33906 7.43437ZM20.4516 20.4516H16.8937V14.8828C16.8937 13.5562 16.8703 11.8453 15.0422 11.8453C13.1906 11.8453 12.9094 13.2937 12.9094 14.7891V20.4516H9.35625V8.99531H12.7687V10.5609H12.8156C13.2891 9.66094 14.4516 8.70937 16.1813 8.70937C19.7859 8.70937 20.4516 11.0812 20.4516 14.1656V20.4516V20.4516Z"
                                        fill="#0F0E13" />
                                </svg>
                            </a>
                            <a href="https://x.com/llc_Gharbour" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_621_5293)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.9455 23L10.396 15.0901L3.44886 23H0.509766L9.09209 13.2311L0.509766 1H8.05571L13.286 8.45502L19.8393 1H22.7784L14.5943 10.3165L23.4914 23H15.9455ZM19.2185 20.77H17.2397L4.71811 3.23H6.6971L11.7121 10.2532L12.5793 11.4719L19.2185 20.77Z"
                                            fill="#0F0E13" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_621_5293">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/goldenharbourllc" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <g clip-path="url(#clip0_621_5294)">
                                        <path
                                            d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4687H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3437 4.92187 17.3437 4.92187V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4687H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"
                                            fill="#0F0E13" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_621_5294">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/goldenharbour.uae/" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M12 2.16094C15.2063 2.16094 15.5859 2.175 16.8469 2.23125C18.0188 2.28281 18.6516 2.47969 19.0734 2.64375C19.6312 2.85938 20.0344 3.12187 20.4516 3.53906C20.8734 3.96094 21.1312 4.35937 21.3469 4.91719C21.5109 5.33906 21.7078 5.97656 21.7594 7.14375C21.8156 8.40937 21.8297 8.78906 21.8297 11.9906C21.8297 15.1969 21.8156 15.5766 21.7594 16.8375C21.7078 18.0094 21.5109 18.6422 21.3469 19.0641C21.1312 19.6219 20.8687 20.025 20.4516 20.4422C20.0297 20.8641 19.6312 21.1219 19.0734 21.3375C18.6516 21.5016 18.0141 21.6984 16.8469 21.75C15.5813 21.8062 15.2016 21.8203 12 21.8203C8.79375 21.8203 8.41406 21.8062 7.15313 21.75C5.98125 21.6984 5.34844 21.5016 4.92656 21.3375C4.36875 21.1219 3.96562 20.8594 3.54844 20.4422C3.12656 20.0203 2.86875 19.6219 2.65312 19.0641C2.48906 18.6422 2.29219 18.0047 2.24063 16.8375C2.18438 15.5719 2.17031 15.1922 2.17031 11.9906C2.17031 8.78437 2.18438 8.40469 2.24063 7.14375C2.29219 5.97187 2.48906 5.33906 2.65312 4.91719C2.86875 4.35937 3.13125 3.95625 3.54844 3.53906C3.97031 3.11719 4.36875 2.85938 4.92656 2.64375C5.34844 2.47969 5.98594 2.28281 7.15313 2.23125C8.41406 2.175 8.79375 2.16094 12 2.16094ZM12 0C8.74219 0 8.33438 0.0140625 7.05469 0.0703125C5.77969 0.126562 4.90312 0.332812 4.14375 0.628125C3.35156 0.9375 2.68125 1.34531 2.01563 2.01562C1.34531 2.68125 0.9375 3.35156 0.628125 4.13906C0.332812 4.90313 0.126563 5.775 0.0703125 7.05C0.0140625 8.33437 0 8.74219 0 12C0 15.2578 0.0140625 15.6656 0.0703125 16.9453C0.126563 18.2203 0.332812 19.0969 0.628125 19.8562C0.9375 20.6484 1.34531 21.3187 2.01563 21.9844C2.68125 22.65 3.35156 23.0625 4.13906 23.3672C4.90313 23.6625 5.775 23.8687 7.05 23.925C8.32969 23.9812 8.7375 23.9953 11.9953 23.9953C15.2531 23.9953 15.6609 23.9812 16.9406 23.925C18.2156 23.8687 19.0922 23.6625 19.8516 23.3672C20.6391 23.0625 21.3094 22.65 21.975 21.9844C22.6406 21.3187 23.0531 20.6484 23.3578 19.8609C23.6531 19.0969 23.8594 18.225 23.9156 16.95C23.9719 15.6703 23.9859 15.2625 23.9859 12.0047C23.9859 8.74688 23.9719 8.33906 23.9156 7.05937C23.8594 5.78437 23.6531 4.90781 23.3578 4.14844C23.0625 3.35156 22.6547 2.68125 21.9844 2.01562C21.3188 1.35 20.6484 0.9375 19.8609 0.632812C19.0969 0.3375 18.225 0.13125 16.95 0.075C15.6656 0.0140625 15.2578 0 12 0Z"
                                        fill="#0F0E13" />
                                    <path
                                        d="M12 5.83594C8.59688 5.83594 5.83594 8.59688 5.83594 12C5.83594 15.4031 8.59688 18.1641 12 18.1641C15.4031 18.1641 18.1641 15.4031 18.1641 12C18.1641 8.59688 15.4031 5.83594 12 5.83594ZM12 15.9984C9.79219 15.9984 8.00156 14.2078 8.00156 12C8.00156 9.79219 9.79219 8.00156 12 8.00156C14.2078 8.00156 15.9984 9.79219 15.9984 12C15.9984 14.2078 14.2078 15.9984 12 15.9984Z"
                                        fill="#0F0E13" />
                                    <path
                                        d="M19.8469 5.59141C19.8469 6.38828 19.2 7.03047 18.4078 7.03047C17.6109 7.03047 16.9688 6.3836 16.9688 5.59141C16.9688 4.79453 17.6156 4.15234 18.4078 4.15234C19.2 4.15234 19.8469 4.79922 19.8469 5.59141Z"
                                        fill="#0F0E13" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6  mb-4 mb-md-0 ft_left_border">
                        <h3 class="ft_title">Quick Menu</h3>
                        <ul class="ft_itmes">
                            <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                            <li><a href="{{ route('industries') }}" title="Industries">Industries</a></li>
                            <!--<li><a href="{{ route('event') }}" title="Events">Events</a></li>-->
                            <!--<li><a href="{{ route('news') }}" title="News">News</a></li>-->
                            <li><a href="{{ route('blog') }}" title="Blogs">Blogs</a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a></li>
                            <li><a href="{{ route('gallery') }}" title="Gallery">Gallery</a></li>
                            <li><a href="{{route('faq')}}" title="FAQ">FAQs</a></li>
                            <li><a href="{{ route('contact') }}" onclick="localStorage.setItem('scrollToBuildTogether','1')" title="Contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-6 mb-4 mb-md-0 ft_left_border d-block d-md-none">
                        <h3 class="ft_title">About Us</h3>
                        <ul class="ft_itmes">
                            <li><a href="{{route('about')}}" title="Company Profile">Company Profile</a></li>
                            <li><a href="{{route('our-agencies')}}" title="Our Partners">Our Partners</a></li>
                            <li><a href="{{route('milestone')}}" title="Milestone">Milestone</a></li>
                            <li><a href="{{route('certifications')}}" title="Certifications">Certifications</a></li>
                        </ul>
                    </div>
                    @php
                    use Illuminate\Support\Facades\DB;
                    $categories = DB::table('category')->whereNull('deleted_at')
                    ->where('name', '!=', 'Ferrous Metal & Alloys')
                    ->get();
                    @endphp
                    <div class="col-lg-2  mb-4 mb-md-0 ft_left_border">
                        <h3 class="ft_title">Products</h3>
                        <ul class="ft_itmes">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('subcategorylist',['category'=>$category->url])}}"
                                    title="{{ $category->name }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-2  mb-4 mb-md-0 ft_left_border d-none d-md-block">
                        <h3 class="ft_title">About Us</h3>
                        <ul class="ft_itmes">
                            <li><a href="{{route('about')}}" title="Company Profile">Company Profile</a></li>
                            <li><a href="{{route('our-agencies')}}" title="Our Partners">Our Partners</a></li>
                            <!--<li><a href="javascript:void(0);" title="Marine Valves">Marine Valves</a></li>-->
                            <li><a href="{{route('milestone')}}" title="Milestone">Milestone</a></li>
                            <li><a href="{{route('certifications')}}" title="Certifications">Certifications</a></li>
                        </ul>
                        <h3 class="ft_title mt-4">Career</h3>
                        <ul class="ft_itmes">
                            <li><a href="{{route('ourculture')}}" title="Our Culture & Values">Our Culture & Values</a>
                            </li>
                            <li><a href="{{route('currentopportunities')}}" title="Current Opportunities">Current
                                    Opportunities</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3  mb-4 mb-md-0 ft_left_border">
                        <h3 class="ft_title">Contact Us</h3>
                        <ul class="ft_itmes">
                            <li class="d-flex gap-2 lh-base"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M15 10.5C15 11.2956 14.6839 12.0587 14.1213 12.6213C13.5587 13.1839 12.7956 13.5 12 13.5C11.2044 13.5 10.4413 13.1839 9.87868 12.6213C9.31607 12.0587 9 11.2956 9 10.5C9 9.70435 9.31607 8.94129 9.87868 8.37868C10.4413 7.81607 11.2044 7.5 12 7.5C12.7956 7.5 13.5587 7.81607 14.1213 8.37868C14.6839 8.94129 15 9.70435 15 10.5Z"
                                            stroke="#565656" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M19.5 10.5C19.5 17.642 12 21.75 12 21.75C12 21.75 4.5 17.642 4.5 10.5C4.5 8.51088 5.29018 6.60322 6.6967 5.1967C8.10322 3.79018 10.0109 3 12 3C13.9891 3 15.8968 3.79018 17.3033 5.1967C18.7098 6.60322 19.5 8.51088 19.5 10.5Z"
                                            stroke="#565656" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span><a
                                    href="https://www.google.com/maps/place/Golden+Harbour+LLC/@25.1166235,55.2225863,17z/data=!3m1!4b1!4m6!3m5!1s0x140dc5480f149847:0x845b4e89f74123d0!8m2!3d25.1166187!4d55.2251612!16s%2Fg%2F11b7010_5d?entry=ttu&g_ep=EgoyMDI1MDYxMS4wIKXMDSoASAFQAw%3D%3D">Plot
                                    No. 3690251, Al Quoz Ind. Area - 4, P.O. Box 13840, Dubai, UAE</a>
                            </li>
                            <li class="d-flex gap-2     align-items-center"><span><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M21.75 6.75V17.25C21.75 17.8467 21.5129 18.419 21.091 18.841C20.669 19.2629 20.0967 19.5 19.5 19.5H4.5C3.90326 19.5 3.33097 19.2629 2.90901 18.841C2.48705 18.419 2.25 17.8467 2.25 17.25V6.75M21.75 6.75C21.75 6.15326 21.5129 5.58097 21.091 5.15901C20.669 4.73705 20.0967 4.5 19.5 4.5H4.5C3.90326 4.5 3.33097 4.73705 2.90901 5.15901C2.48705 5.58097 2.25 6.15326 2.25 6.75M21.75 6.75V6.993C21.75 7.37715 21.6517 7.75491 21.4644 8.0903C21.2771 8.42569 21.0071 8.70754 20.68 8.909L13.18 13.524C12.8252 13.7425 12.4167 13.8582 12 13.8582C11.5833 13.8582 11.1748 13.7425 10.82 13.524L3.32 8.91C2.99292 8.70854 2.72287 8.42669 2.53557 8.0913C2.34827 7.75591 2.24996 7.37815 2.25 6.994V6.75"
                                            stroke="#565656" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span><a href="mailto:support@goldenharbour.ae">support@goldenharbour.ae</a></li>

                            <li class="d-flex gap-2 align-items-center">
                                <span>
                                    
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
                                            stroke="#565656" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <a href="tel:+971529037471">+971 5 2903 7471</a>
                            </li>
                        </ul>
                        <h3 class="ft_title mt-3 mb-3" style="color:#ca8e55;">A Part Of</h3>
                        <img src="{{ asset('public/front/images/ft_apartof.svg') }}" alt="A Part Of"
                            class="img-fluid ft_apart">
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="row ">
                <div class="col-12 col-md-4 text-center text-md-start">
                    <a href="{{route('privacypolicy')}}">
                        Privacy Policy
                    </a>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="Javascript::void(0)">
                        © <?php echo date('Y'); ?> Golden Harbour LLC. All Rights Reserved.
                    </a>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <a href="{{route('termsandconditions')}}">
                        Terms & Conditions
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="float-buttons">
    <div class="WhatsAppButton">
        <a href="https://api.whatsapp.com/send?phone=971529037471&text=Hello,%20I%20have%20visited%20your%20website%20and%20I%20would%20like%20to%20know%20more%20about%20your%20company."
            id="whatsapp" rel="nofollow" target="_blank">
            <i class="fab fa-whatsapp"></i>
            <span>WhatsApp<br><small>+971529037471</small></span>
        </a>
    </div>
</div>

<div class="enquiry-now-wrapper network">
    <button type="button" class="btn btn--ripple" data-bs-toggle="modal" data-bs-target="#enquiryNowModal"
        title="Enquiry Now" id="ripple">Enquiry Now</button>
</div>

<div class="modal fade" id="enquiryNowModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enquiry Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="contact_input">
                    <form method="POST"  id="inquiryForm" action="{{ route('inquiery-store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-4">
                                <label for="first-name" class="form-label"><b>First Name *:</b></label>
                                <input type="text" class="form-control px-0" id="inq_firstname" name="firstname" 
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your First Name" maxlength="40" minlength="2">
                            </div>
                            <div class="col-12 col-lg-6  mb-4">
                                <label for="last-name" class="form-label"><b>Last Name *:</b></label>
                                <input type="text" class="form-control px-0" id="inq_lastname" name="lastname" 
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your Last Name" maxlength="40" minlength="2">
                            </div>

                            <div class="col-12 col-lg-6 mb-4">
                                <label for="email" class="form-label"><b>Email ID *:</b></label>
                                <input type="email" class="form-control px-0" id="inq_email" name="email"
                                    placeholder="Enter your email"  maxlength="50" minlength="5">
                                <div id="email-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="col-12 col-lg-6 mb-4">
                                <label for="phone" class="form-label"><b>Phone Number *:</b></label>
                                <input type="tel" class="form-control px-0" id="inq_number" name="number" maxlength="15"
                                    minlength="10" 
                                    oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(?!^)\+/g, '').slice(0, 15);"
                                    placeholder="Enter your Phone Number" pattern="\d{10,15}"
                                    title="Phone number should be between 10 to 15 digits">
                            </div>

                             <div class="col-12 col-lg-6 mb-4">
                                <label for="company" class="form-label"><b>Company Name *:</b></label>
                                <input type="text" class="form-control px-0" id="inq_company_name" name="company_name"
                                    placeholder="Enter your Company Name"  maxlength="100" minlength="2">
                            </div>
                            <div class="col-12 col-lg-6 mb-4">
                                <label for="city" class="form-label"><b>City *:</b></label>
                                <input type="text" class="form-control px-0" id="inq_city" name="city" 
                                    placeholder="Enter your City Name" maxlength="30" minlength="2">
                            </div>

                              <div class="col-12 col-lg-6 mb-4">
                                <label for="subject" class="form-label"><b>Subject *:</b></label>
                                <input type="text" class="form-control px-0" id="inq_subject" name="subject"
                                    placeholder="Enter your Subject"  maxlength="50" minlength="2">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="message" class="form-label"><b>Message :</b></label>
                                <textarea class="form-control px-0" id="inq_message" name="message" rows="1"
                                    placeholder="Enter your Message"></textarea>
                            </div>

                        </div>
                        <div class="col-lg-12">
                        <div class="form_item">
                            <div id="inquiry-recaptcha"></div>
                            <div id="inq_recaptcha-error" class="error-message" style="color: red; margin-top: 5px;"></div>
                        </div>
                        <button type="submit" class="btn btn--ripple" id="submitBtn">
                            Submit
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== MODAL DESIGN ===== */
    .Whats_mpp_modal .popup-box_whatsapp {
        border-radius: 16px;
        /* overflow: hidden;   */
    }

    /* Header */
    .Whats_mpp_modal .popup-header {
        background: #182A41;
        color: #fff;
        padding: 15px 20px;
    }

    .Whats_mpp_modal .popup-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .Whats_mpp_modal .white-close {
        filter: invert(1);
    }

    /* Body */
    .Whats_mpp_modal .popup-box_whatsapp .modal-body {
        padding: 25px;
    }

    /* Inputs */
    .Whats_mpp_modal .popup-input {
        border-radius: 12px;
        height: 50px;
        border: 1px solid #ddd;
        box-shadow: none !important;
    }

    .Whats_mpp_modal .popup-input:focus {
        border-color: #182A41;
    }

    /* Textarea */
    .Whats_mpp_modal textarea.popup-input {
        height: 90px;
    }

    /* Button */
    .Whats_mpp_modal .popup-btn {
        background: #182A41;
        color: #fff;
        height: 50px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
    }

    .Whats_mpp_modal .popup-btn:hover {
        background: #182A41;
        color: #fff;
    }

    /* intl tel input full width */
    .Whats_mpp_modal .iti {
        width: 100%;
    }

    .Whats_mpp_modal .iti__selected-flag {
        border-radius: 10px 0 0 10px;
    }

    /* Remove modal scroll */
    .Whats_mpp_modal .modal-dialog {
        max-width: 420px;
    }

    .Whats_mpp_modal .modal-content {
        /* overflow: hidden; */
    }

    .WhatsAppButton_mpp {
        background: #14a614;
        position: fixed;
        bottom: 35px;
        right: 0px;
        z-index: 9999;
        width: 45px;
        height: 45px;
        border-radius: 5px 0 0 5px;
        cursor: pointer;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(20, 166, 20, 0.7);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(20, 166, 20, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(20, 166, 20, 0);
        }
    }

    .WhatsAppButton_mpp img {
        width: 100%;
        height: 100%;
    }

    #enquiryNowModal .modal-header {
        background: var(--blue);
        border:1px solid var(--blue);
    }

    #enquiryNowModal .modal-title {
        color: #fff;
    }

    #enquiryNowModal .btn-close {
        filter: invert(1);
    }
</style>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadRecaptchaCallback&render=explicit" async defer></script>


<!--// for render captcha and working for both so thats why created command by Darshan -->
<script>
    let contactCaptchaWidgetId;
    let inquiryCaptchaWidgetId;

    function onloadRecaptchaCallback() {
        if (document.getElementById('contact-recaptcha')) {
            contactCaptchaWidgetId = grecaptcha.render('contact-recaptcha', {
                'sitekey': "{{ env('RECAPTCHA_SITE_KEY') }}"
            });
        }

        if (document.getElementById('inquiry-recaptcha')) {
            inquiryCaptchaWidgetId = grecaptcha.render('inquiry-recaptcha', {
                'sitekey': "{{ env('RECAPTCHA_SITE_KEY') }}"
            });
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["in", "ae", "us", "gb"],
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json/")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("in"));
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",
        });

        $("#whatsappForm").on("submit", function(e) {
            alert("Your enquiry has been received. We will get back to you shortly.");
        });

    });
</script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function () {

        // Remove old error when typing
        $('#inquiryForm input, #inquiryForm textarea').on('input keyup change', function () {
            $(this).removeClass('is-invalid');
            $(this).next('.error-text').remove();
        });

        $('#inquiryForm').on('submit', function (e) {
            e.preventDefault();

            let isValid = true;


            // Remove old errors
            $('.error-text').remove();
            $('.form-control').removeClass('is-invalid');

            // Get values
            let firstname = $('#inq_firstname').val().trim();
            let lastname = $('#inq_lastname').val().trim();
            let email = $('#inq_email').val().trim();
            let number = $('#inq_number').val().trim();
            let company_name = $('#inq_company_name').val().trim();
            let city = $('#inq_city').val().trim();
            let subject = $('#inq_subject').val().trim();
            let message = $('#inq_message').val().trim();
            let submitBtn = $('#submitBtn');

            let recaptchaResponse = grecaptcha.getResponse(inquiryCaptchaWidgetId);
            
            if (recaptchaResponse === '') {
                $('#inq_recaptcha-error').text('Please verify that you are not a robot.');
                isValid = false;
            } else {
                $('#inq_recaptcha-error').text('');
            }

            // Show error function
            function showError(inputId, message) {
                $('#' + inputId).addClass('is-invalid');
                $('#' + inputId).after('<div class="error-text text-danger mt-1" style="font-size:14px;">' + message + '</div>');
                isValid = false;
            }

            // First Name
            if (firstname === '') {
                showError('inq_firstname', 'First Name is required.');
            }

            // Last Name
            if (lastname === '') {
                showError('inq_lastname', 'Last Name is required.');
            } 
            // Email
            if (email === '') {
                showError('inq_email', 'Email is required.');
            } else {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    showError('inq_email', 'Please enter a valid email address.');
                }
            }
            // Phone Number
            if (number === '') {
                showError('inq_number', 'Phone Number is required.');
            } 
            // Company Name
            if (company_name === '') {
                showError('inq_company_name', 'Company Name is required.');
            } 

            // City
            if (city === '') {
                showError('inq_city', 'City is required.');
            } 
            // Subject
            if (subject === '') {
                showError('inq_subject', 'Subject is required.');
            } 
            // Optional Message Validation
            if (message !== '' && message.length < 3) {
                showError('inq_message', 'Message must be at least 3 characters if entered.');
            }

            // If valid, submit form
            if (isValid) {
                submitBtn.contents().filter(function () {
                    return this.nodeType === 3;
                }).first().replaceWith('Submitting... ');
                submitBtn.prop('disabled', true);
                // small delay so UI updates properly
                setTimeout(() => {
                    this.submit();
                }, 100);
            }
        });
    });

</script>



@include('layouts.catalogue')

<script src="{{ asset('public/front/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('public/front/js/slick.min.js') }}"></script>
<script src="{{ asset('public/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/front/js/main.js') }}"></script>
<script src="{{ asset('public/front/js/jquery.validate.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>
<!-- aos -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>

<script>
// window.onload = function () {
//     var elfsightBranding = document.querySelector('a[href*="elfsight.com/linkedin-feed-widget"]');
//     if (elfsightBranding) {
//         elfsightBranding.remove();
//     }
// };
function removeElfsightBranding() {
    setTimeout(() => {
        var elfsightBranding = document.querySelector('a[href*="elfsight.com/linkedin-feed-widget"]');
        if (elfsightBranding) {
            elfsightBranding.remove();
            console.log("Elfsight branding removed"); // Debug ke liye
        }
    }, 2000); // 2-second delay taaki widget load ho jaye
}

window.addEventListener("load", removeElfsightBranding);
</script>
<script>
const searchInput = document.querySelector(".search-input");
const searchContainer = document.querySelector(".search-container");

searchContainer.style.transition = "width 0.3s ease-in-out";

searchInput.addEventListener("input", function() {
    if (window.innerWidth > 768) { // Only apply on screens wider than 768px
        if (searchInput.value.length > 0) {
            searchInput.style.width = "250px";
        } else {
            searchInput.style.width = "auto";
        }
    }
});



/*-------------------------------------
responsive side menu close js
 -------------------------------------*/
document.addEventListener("DOMContentLoaded", function() {
    // Get elements
    const closePanelButton = document.querySelector(".closepanel");
    const navbarCollapse = document.querySelector("#navbarScroll");

    // Add click event listener
    closePanelButton.addEventListener("click", function() {
        // Remove 'show' class to collapse the menu
        navbarCollapse.classList.remove("show");
    });
});
</script>
</body>

</html>