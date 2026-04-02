@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/about-section1.webp')
])
<section class=" news_details_header_main"> 
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap  align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-md-5 mt-4 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{url('/')}}">HOME ></a>  <span>About > </span> <span class="routing_home_news">Company Profile</span></h6>
                    <h1 class="main_head">About Us</h1>
                    <!--<h1 class="main_head">This is Golden Harbour</h1>-->
                    <h2 class="main_head_small">Powering Industry. Delivering Trust. Defining Standards.</h2>
                    <p class="card-text ">
                        For 35+ years, Golden Harbour has stood as a benchmark in the Middle East for specialized engineering and industrial sourcing excellence. Founded in the late 1980s and headquartered in Dubai, we are a name synonymous with scale, reliability, and technical precision. From high-pressure hydraulics and instrumentation solutions to copper-nickel and stainless steel systems, valves, non-ferrous components, and structural fittings — our inventory is built to serve industries where performance is critical and compromise is never an option.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{asset('public/front/images/headerbanner/about_hed_img.png')}}"
                    class="img-fluid" alt="about hed img">
            </div>
        </div>
    </div>
</section>
<section class=" mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    With ISO 9001:2015 certification and a logistics footprint that spans 250,000+ sq. ft. across Al Quoz, Jebel Ali Free Zone, Al Jadaf, and beyond, we maintain over 51,000+ SKU’s in ready stock. This, combined with our presence in Abu Dhabi, Bahrain, and a flagship showroom in Deira, ensures our customers receive unmatched availability, speed, and support — wherever their operations take them.
                </p>
                <p>
                    Golden Harbour is more than a distributor. We are an industry enabler — bridging global engineering standards with regional execution. Trusted by engineers, chosen by project managers, and backed by OEM-approved products, we’re here to move your project forward — with precision, performance, and purpose.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="section_space position-relative">
    <div class="container">
        <div class="row  mb-4">
            <div class="col-md-12">
               <h2 class="main_head main_head_line">Why Partnering with Golden Harbour Works</h2>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-xxl-6 col-lg-4">
                <img src="{{asset('public/front/images/about-section1.webp')}}" alt="Partnering with GOLDEN HARBOUR Means You Receive" class="img-fluid">
            </div>
            <div class="col-xxl-6 col-lg-8">
                <p>
                    At Golden Harbour, partnership means more than procurement - it’s about performance, reliability, and results.
                </p>
                <div>
                     <div class="moretext">
                     <h3 class="sub-hed">
                       Here’s what you can expect when you work with us:
                    </h3>
                
                <ul class="about-item ps-3">
                    <li><b>Global-Grade Sourcing :</b> Access premium, mill-certified products from trusted international manufacturers — delivered at competitive prices without compromise on quality.</li>
                    <li><b>A Unified Supply Ecosystem :</b> From Metals & Alloys to various products and components for the Oil & Gas, Marine Offshore, Energy and Industrial sectors, our portfolio offers a consolidated single-source solution tailored to your project requirements.</li>
                    <li><b>Logistics That Work Like Clockwork :</b> Our dedicated fleet ensures seamless doorstep deliveries, while our agile logistics network allows us to fulfill urgent requirements at short notice, reducing your downtime and inventory burden.</li>
                    <li><b>Precision-Timed Fulfillment :</b> We strictly adhere to Just-In-Time (JIT) delivery models, ensuring your materials arrive exactly when and where they’re needed.</li>
                    <li><b>A Legacy of Trust :</b> For over 35 years, Golden Harbour has earned a reputation as the region’s most reliable partner, known for consistency, commitment, and on-time deliveries that align with your operational timelines.</li>
                    <li><b>People-Powered Service :</b> Our strength lies in our people - a team of highly skilled professionals who prioritize customer satisfaction through responsiveness, transparency, and round-the-clock support.</li>

                </ul>
                 <p>At Golden Harbour, you’re not just a client, you're the core of our mission. Together, we move industries forward.</p>
                 </div>
                 <a href="javascript:void(0)" class="read-more-text mt-2" onclick="toggleText(this)">Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="catalog_wrapper about_catalog_wrapper">
    <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 order-2 order-md-1 mt-4 mt-md-0">
            <img src="{{asset('public/front/images/managing_director.png')}}" alt="director" class="img-fluid pe-lg-4">
          </div>
          <div class="col-md-8 bd_left order-1 order-md-2">
             <h2 class="main_head">Managing Director's Message</h2>
             <p>
                 With the blessings of late His Holiness Dr. Syedna Mohammed Burhanuddin Saheb (TUS), after five decades of similar business experience, Golden Harbour dropped anchor on the shores of Dubai in the late 80's with a vision to supply metal products to the marine, offshore, oilfield and Industrial sectors.
             </p>
             <p>
             We started small, with a humble beginning of a showroom at Nasser Square in Deira Dubai. Today we operate from a 5000 sq. ft modern fully equipped, computerized office, with associate branches in Abu Dhabi, Bahrain, Cairo and Mumbai. Our success has been due as much to our corporate philosophy of unwavering commitment to quality and service as to our teams of highly skilled and dedicated staff who strive continuously to fulfill the company's vision.
             </p>
             <p>
                 We also owe our success to the continued support of our customers. We are equally thankful to the UAE government and the Rulers of Dubai, whose exemplary leadership and vision have helped, create a dynamic business environment in the country, turning Dubai into the trading and commercial Capital of the Middle East.
             </p>
             <p>
                 But we are also aware that all growth, in its wake, also brings new challenges. And we, at Golden Harbour, are geared up to meet them. And as our past record amply shows, we are confident that we will meet all the emerging challenges in our field of business competently and efficiently.
             </p>
             <div class="d-flex align-items-center">
                  <div>
                  <img src="{{asset('public/front/images/solution-layer.svg')}}" alt="solution" class="img-fluid me-3">
                  </div>
                  <div>
                    <h3 class="director_name">Huzaifa S.T.</h3>
                    <p class="f-16 mb-0">Managing Director</p>
                   </div>
             </div>
            
            </div>
      </div>
       <div class="row align-items-center mt-5 mb-0">
            <div class="col-md-8 bd_right">
                <h2 class="main_head">Commercial Director's Message</h2>
                <P>
                    For more than 30 years, I have had the privilege of leading Golden Harbour, shaping a company that has grown into a trusted partner in the Marine, Offshore, Energy, and Oil & Gas industries. Our journey has been guided by the strong values and ethics laid down by our founders and built upon a foundation of quality, integrity, and a consistent focus on delivering solutions that address the complex requirements of these specialized sectors. 
                </P>
                <p>
                    Operating in such dynamic and high-stakes environments requires more than just products; it demands expertise, reliability, and a deep understanding of industry standards. At Golden Harbour, we have consistently met these expectations, providing high-performance industrial products and solutions designed for harsh conditions and complex industrial operations.
                </p>
                <P>
                    Our continued growth is a reflection of the trust our clients and partners place in us. We remain committed to exceeding expectations, whether through upholding the highest standards in safety and compliance or by embracing innovation to stay ahead in a rapidly evolving industry.
                </P>
                <p>
                    Thank you for your continued support and partnership. We look forward to navigating the future together.
                </p>
                 <div class="d-flex align-items-center">
                  <div>
                  <img src="{{asset('public/front/images/solution-layer.svg')}}" alt="solution" class="img-fluid me-3">
                  </div>
                  <div>
                    <h3 class="director_name">Mufaddal Mohsin</h3>
                    <p class="f-16 mb-0">Director, Golden Harbour</p>
                   </div>
             </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
               <img src="{{asset('public/front/images/Commercial_director.png')}}" alt="director" class="img-fluid img-fluid ps-lg-4">
            </div>
        </div>
    </div>
    
</section>

<section class="section_space position-relative">
    <div class="container">
        <div class="row ">
            <div class="col-md-5">
                <h2 class="main_head main_head_line">Why Choose Us?</h2>
            </div>
            <div class="col-md-7 text-start">
                 <p class="mb-0">Golden Harbour stands as a premier provider of specialized engineering products and services for the Oil & Gas, Marine, Offshore, Onshore, and Industrial sectors. Here's why partnering with us is a strategic choice:</p>
            </div>
        </div>
        <div class="row gx-md-5 mt-5">
            <div class="col-md-6  pe-md-4 pe-xxl-5  ">
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                       Comprehensive Product Range
                    </h3>
                    <p>We offer an extensive selection of products, including instrumentation, high-pressure hydraulic tubes, compression tube fittings, copper-nickel pipes and fittings, stainless steel pipes and fittings, valves, and non-ferrous items such as bars, flanges, pipes, fittings, sheets, and tube clamps. Our diverse inventory ensures that clients find precise solutions tailored to their specific requirements.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Robust Stock Availability
                    </h3>
                    <p>With a stock holding exceeding 15,000 line items at any given time, we are equipped to meet urgent and large-scale demands efficiently. Our substantial inventory levels enable prompt deliveries, minimizing downtime for our clients.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Extensive Industry Experience
                    </h3>
                    <p>Founded in the late 1980s, Golden Harbour boasts over 25 years of business acumen in the Middle East. Our deep-rooted industry knowledge and experience empower us to understand and anticipate market needs effectively.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Exclusive Partnerships                  
                  </h3>
                    <p>Serving as exclusive agents for several world-renowned conglomerates, we offer quality products that meet international standards. Our strategic alliances enhance our product offerings and provide clients with access to globally recognized brands.</p>
                </div>
            </div>
            <div class="col-md-6 ps-md-4 ps-xxl-5 why_choose_borderleft">
            <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Strategic Infrastructure
                    </h3>
                    <p>Golden Harbour is a regional leader in service excellence, backed by ISO 9001:2015 certification and a ready stock of over 51,000+ SKUs. Our 40,000 sq. ft. Corporate Headquarters in Al Quoz anchors a robust logistics network spanning more than 250,000 sq. ft. across Dubai, Abu Dhabi, and Jebel Ali Free Zone, including our flagship showroom in Deira. With additional regional hubs in Abu Dhabi and the Kingdom of Bahrain, we ensure exceptional product availability, fast delivery and dedicated customer support, wherever your operations are located.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Quality Assurance
                    </h3>
                    <p>As an ISO 9001:2015 certified company, we adhere to stringent quality management systems. All our products are sourced from reputable Original Equipment Manufacturers (OEMs), guaranteeing reliability and performance.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="sub-hed">
                    Diverse Clientele
                    </h3>
                    <p>We successfully supply to a robust customer base of over 500 clients across the UAE, Middle East, and other parts of the world. Our strong distribution network ensures timely deliveries, bolstered by our own fast and reliable transportation fleet for UAE-based customers.</p>
                </div>
                <div class="why_choose_borderbottom"></div>
                <div class="why_choose_item">
                    <h3 class="main_head_small">Choosing Golden Harbour means partnering with a trusted leader committed to quality, reliability, and customer satisfaction in the engineering sector.</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')