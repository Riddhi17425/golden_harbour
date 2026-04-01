@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/about-section1.webp')
])
<section class=" news_details_header_main my-5">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME > </a>
                       <span> ABOUT > </span>
                        <span class="routing_home_news"> Milestone</span>
                    </h6>
                    <h1 class="main_head">Our Milestone</h1>
                    
                    <h2 class="main_head_small">Journey of Growth & Excellence</h2>
                    <p class="card-text">Since our founding in 1938, Golden Harbour has grown from a local enterprise into a regional force in the marine, offshore, oilfield, and industrial sectors. What began as a vision to deliver quality engineering solutions has evolved into a legacy of excellence spanning over seven decades.
                                        From earning ISO 9001:2015 certification to establishing a cutting-edge 250,000+ sq. ft. facility in Dubai, each milestone reflects our drive to set new benchmarks. Our ever-expanding inventory of 51,000+ SKUs ensures swift, reliable delivery to meet the evolving needs of our clients.
                                        With strategic offices in Dubai, Abu Dhabi, Jebel Ali, and Bahrain, our footprint across the MENA region highlights a journey shaped by innovation, integrity, and an unwavering focus on customer success.
                                        Each chapter in our story is a testament to the people, partnerships, and purpose that power Golden Harbour.

                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/ourculture_hed_img.png') }}" class="img-fluid" alt="ourculture hed img">
            </div>
        </div>
    </div>
</section>


<!-------------------- new milestone html --------------->

<section class="milestone-section">
  <!-- Background Video -->
  <div class="milestone-video">
    <video id="milestoneVideo" autoplay controls>
      <source src="{{ asset('public/front/images/Our-Milestone.mp4') }}" type="video/mp4">
    </video>
  </div>

  <!-- Center Content -->
  <div class="milestone-content" id="milestone-content">
    @if($milestone->count())
      <h2 class="main_head">{{ $milestone->first()->year ?? 'Our Journey Begins' }}</h2>
      <p>{!! $milestone->first()->description ?? '' !!}</p>
    @else
      <h2 class="main_head">Our Journey Begins</h2>
      <p>The foundation was laid with a small team and a big vision.</p>
    @endif
  </div>

  <!-- Timeline Line (Desktop) -->
  <div class="timeline">
    @foreach($milestone as $key => $mile)
      <div class="milestone-dot {{ $key === 0 ? 'active' : '' }}" 
           style="left: {{ $mile->position ?? ($key * (100 / max(1, $milestone->count() - 1))) }}%;" 
           data-title="{{ $mile->year }}" 
           data-text="{{ $mile->description }}">
      </div>
      <div class="milestone-year {{ $key === 0 ? 'active' : '' }}" 
           style="left: {{ $mile->position ?? ($key * (100 / max(1, $milestone->count() - 1))) }}%;">
           {{ $mile->year }}
      </div>
    @endforeach
  </div>

  <!-- Mobile Arrows -->
  <div class="milestone-arrows">
    <button class="arrow-btn" id="prev">&#8592;</button>
    <button class="arrow-btn" id="next">&#8594;</button>
  </div>
</section>


<!------------------- new milestone css ------------->

<style>
    /* ---------- Video Background ---------- */
.milestone-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding-bottom: 70px;
    padding-top: 20px;
}

.milestone-video {
  display: flex;
  justify-content: center;
  align-items: center;
}
.milestone-video video {
  max-width: 800px;
  width: 90%;
   border: 1px solid #C4A458;
    border-radius: 10px;
}

/* ---------- Content ---------- */
.milestone-content {
  position: relative;
  z-index: 2;
  max-width: 900px;
  margin: 40px auto 0;
  text-align: center;
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.milestone-content.fade {
  opacity: 0;
  transform: translateY(20px);
}

.milestone-content h2 {
  margin-bottom: 0px;
}

.milestone-content p {
  font-size: 20px;
 
}

/* ---------- Timeline Line ---------- */
.timeline {
  position: relative;
  margin-top:40px;
  width: 100%;
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  height: 1px;
  background: linear-gradient(90deg, #c4a458, #c4a458);
  border-radius: 10px;
}

/* ---------- Dots ---------- */
.milestone-dot {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 18px;
  height: 18px;
  background: #ebf4ff;
  border: 1px solid #182a41;
  border-radius: 50%;
  cursor: pointer;
  transition: transform 0.3s ease, background 0.3s ease;
}

.milestone-dot.active {
  background: #182a41;
  transform: translateY(-50%) scale(1.2);
}

/* ---------- Year Labels ---------- */
.milestone-year {
  position: absolute;
  top: 25px;
  transform: translateX(-15%);
  color: #333;
  font-size: 0.9rem;
  cursor: pointer;
  user-select: none;
  transition: color 0.3s ease, font-weight 0.3s ease;
}

.milestone-year.active {
  color: #182a41;
  font-weight: bold;
  font-size: 2rem;
  transform: translateX(-35%);
}

/* ---------- Mobile Arrows ---------- */
.milestone-arrows {
  display: none;
  justify-content: center;
  align-items: center;
  gap: 20px;
  margin-top: 30px;
}

.arrow-btn {
  background: #182a41;
  color: white;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  font-size: 24px;
  cursor: pointer;
  transition: background 0.3s;
}

.arrow-btn:hover {
  background: #c4a458;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
  .timeline,
  .milestone-dot,
  .milestone-year {
    display: none;
  }
  .milestone-arrows {
    display: flex;
  }
  .milestone-content p {
    font-size: 20px;
  }
}
</style>


<!---------------------- new milestone js --------------->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const dots = document.querySelectorAll(".milestone-dot");
  const years = document.querySelectorAll(".milestone-year");
  const contentBox = document.getElementById("milestone-content");
  const prevBtn = document.getElementById("prev");
  const nextBtn = document.getElementById("next");
  let currentIndex = 0;

  function updateMilestone(index) {
    dots.forEach(d => d.classList.remove("active"));
    years.forEach(y => y.classList.remove("active"));
    dots[index].classList.add("active");
    years[index].classList.add("active");

    const title = dots[index].getAttribute("data-title");
    const text = dots[index].getAttribute("data-text");

    contentBox.classList.add("fade");
    setTimeout(() => {
      contentBox.innerHTML = `<h2 class="main_head">${title}</h2><p>${text}</p>`;
      contentBox.classList.remove("fade");
    }, 300);
  }

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      currentIndex = index;
      updateMilestone(index);
    });
  });

  years.forEach((year, index) => {
    year.addEventListener("click", () => {
      currentIndex = index;
      updateMilestone(index);
    });
  });

  // Mobile arrows
  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % dots.length;
    updateMilestone(currentIndex);
  });
  prevBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + dots.length) % dots.length;
    updateMilestone(currentIndex);
  });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const video = document.getElementById('milestoneVideo');
  video.play().catch(() => {
    // Autoplay failed; wait for user interaction
    document.body.addEventListener('click', () => video.play(), { once: true });
  });
});
</script>






<!--<section class="section_space">-->
<!--    <div class="container">-->
<!--        <div class="h--timeline js-h--timeline  position-relative">-->
            
<!--             <video autoplay muted loop playsinline controls class="video_style">-->
<!--                                    <source src="{{ asset('public/front/images/Our-Milestone.mp4') }}" type="video/mp4">-->
<!--                                  </video>-->
            
<!--            <div class="h--timeline-events">-->
<!--                <ol>-->
<!--                    @foreach($milestone as $key => $item)-->
<!--                    <li class="h--timeline-event {{ $key == 0 ? 'h--timeline-event--selected' : '' }} text-component">-->
<!--                        <div class="row h--timeline-event-content">-->
                            
<!--                                <em class="h--timeline-event-date">{{ $item->year }}</em>-->
<!--                                <h2 class="h--timeline-event-title">{!! $item->description !!}</h2>-->
                            
<!--                        </div>-->
<!--                    </li>-->
<!--                    @endforeach-->
<!--                </ol>-->
<!--            </div>-->
            
<!--            <div class="h--timeline-container">-->
<!--                <div class="h--timeline-dates">-->
<!--                    <div class="h--timeline-line">-->
<!--                        <ol>-->
<!--                            @foreach($milestone as $key => $item)-->
<!--                            <li><a class="h--timeline-date {{ $key == 0 ? 'h--timeline-date--selected' : '' }}">{{ $item->year }}</a></li>-->
<!--                            @endforeach-->
<!--                        </ol>-->
<!--                    </div>-->
<!--                </div> -->

<!--                <nav class="h--timeline-navigation-container">-->
<!--                    <ul>-->
<!--                        <li><a class="text-replace h--timeline-navigation h--timeline-navigation--prev h--timeline-navigation--inactive">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">-->
<!--                                    <g clip-path="url(#clip0_382_169)">-->
<!--                                        <mask id="mask0_382_169" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">-->
<!--                                            <path d="M25.5 0.5H0.5V25.5H25.5V0.5Z" fill="white" />-->
<!--                                        </mask>-->
<!--                                        <g mask="url(#mask0_382_169)">-->
<!--                                            <path d="M22.375 12.9999H3.625M3.625 12.9999L9.18021 20.2916M3.625 12.9999L9.18021 5.70825" stroke="#ffffff" stroke-width="2.08333" stroke-linecap="round" stroke-linejoin="round" />-->
<!--                                        </g>-->
<!--                                    </g>-->
<!--                                    <defs>-->
<!--                                        <clipPath id="clip0_382_169">-->
<!--                                            <rect width="25" height="25" fill="white" transform="matrix(-1 0 0 1 25.5 0.5)" />-->
<!--                                        </clipPath>-->
<!--                                    </defs>-->
<!--                                </svg>-->
<!--                            </a></li>-->
<!--                            <li>-->
<!--                                <a class="text-replace h--timeline-navigation h--timeline-navigation--next">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">-->
<!--                                        <g clip-path="url(#clip0_382_161)">-->
<!--                                            <mask id="mask0_382_161" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">-->
<!--                                                <path d="M0.5 0.5H25.5V25.5H0.5V0.5Z" fill="white" />-->
<!--                                            </mask>-->
<!--                                            <g mask="url(#mask0_382_161)">-->
<!--                                                <path d="M3.625 12.9999H22.375M22.375 12.9999L16.8198 20.2916M22.375 12.9999L16.8198 5.70825" stroke="#ffffff" stroke-width="2.08333" stroke-linecap="round" stroke-linejoin="round" />-->
<!--                                            </g>-->
<!--                                        </g>-->
<!--                                        <defs>-->
<!--                                            <clipPath id="clip0_382_161">-->
<!--                                                <rect width="25" height="25" fill="white" transform="translate(0.5 0.5)" />-->
<!--                                            </clipPath>-->
<!--                                        </defs>-->
<!--                                </svg>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div> -->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- timline js -->

<!--<script>-->
<!--    document.addEventListener('DOMContentLoaded', () => {-->
<!--        class HorizontalTimeline {-->
<!--            constructor(element) {-->
<!--                this.element = element;-->
<!--                this.dates = element.querySelectorAll('.h--timeline-date');-->
<!--                this.contents = element.querySelectorAll('.h--timeline-event');-->
<!--                this.line = element.querySelector('.h--timeline-line');-->
<!--                this.fillingLine = element.querySelector('.h--timeline-filling-line');-->
<!--                this.navPrev = element.querySelector('.h--timeline-navigation--prev');-->
<!--                this.navNext = element.querySelector('.h--timeline-navigation--next');-->
<!--                this.selectedIndex = 0;-->
<!--                this.translate = 0;-->
<!--                this.isDragging = false;-->
<!--                this.startX = 0;-->
<!--                this.init();-->
<!--            }-->

<!--            init() {-->
<!--                this.positionDates();-->
<!--                this.dates.forEach((date, index) => {-->
<!--                    date.addEventListener('click', (e) => {-->
<!--                        e.preventDefault();-->
<!--                        this.selectDate(index);-->
<!--                    });-->
<!--                });-->
<!--                this.navPrev.addEventListener('click', (e) => {-->
<!--                    e.preventDefault();-->
<!--                    this.navigate('prev');-->
<!--                });-->
<!--                this.navNext.addEventListener('click', (e) => {-->
<!--                    e.preventDefault();-->
<!--                    this.navigate('next');-->
<!--                });-->

                
<!--                this.line.addEventListener('mousedown', (e) => this.startDrag(e));-->
<!--                this.line.addEventListener('mousemove', (e) => this.drag(e));-->
<!--                this.line.addEventListener('mouseup', () => this.endDrag());-->
<!--                this.line.addEventListener('mouseleave', () => this.endDrag());-->
<!--                this.line.addEventListener('touchstart', (e) => this.startDrag(e));-->
<!--                this.line.addEventListener('touchmove', (e) => this.drag(e));-->
<!--                this.line.addEventListener('touchend', () => this.endDrag());-->

<!--                this.element.classList.add('h--timeline--loaded');-->
<!--                this.selectDate(0);-->
<!--            }-->

<!--                positionDates() {-->
<!--                    let left = 0;-->
<!--                    this.dates.forEach((date, i) => {-->
<!--                        date.style.left = `${left}px`;-->
<!--                        left += 0; -->
<!--                    });-->
<!--                    this.line.style.width = `${left}px`;-->
<!--                }-->

<!--            selectDate(index) {-->
<!--                this.dates[this.selectedIndex].classList.remove('h--timeline-date--selected');-->
<!--                this.contents[this.selectedIndex].classList.remove('h--timeline-event--selected');-->
<!--                this.dates[index].classList.add('h--timeline-date--selected');-->
<!--                this.contents[index].classList.add('h--timeline-event--selected');-->
<!--                this.selectedIndex = index;-->
<!--                this.updateFilling();-->
<!--                this.updateNav();-->
<!--            }-->

<!--            updateFilling() {-->
<!--                const dateStyle = window.getComputedStyle(this.dates[this.selectedIndex]);-->
<!--                const left = Number(dateStyle.getPropertyValue('left').replace('px', '')) +-->
<!--                    Number(dateStyle.getPropertyValue('width').replace('px', '')) / 2;-->
<!--                const lineWidth = Number(this.line.style.width.replace('px', ''));-->
<!--                this.fillingLine.style.transform = `scaleX(${left / lineWidth})`;-->
<!--            }-->

<!--            navigate(direction) {-->
<!--                const containerWidth = this.element.querySelector('.h--timeline-dates').offsetWidth;-->
<!--                const lineWidth = Number(this.line.style.width.replace('px', ''));-->
<!--                this.translate = direction === 'next' ? this.translate - containerWidth + 160 : this.translate + containerWidth - 160;-->
<!--                if (-this.translate > lineWidth - containerWidth) this.translate = containerWidth - lineWidth;-->
<!--                if (this.translate > 0) this.translate = 0;-->
<!--                this.line.style.transform = `translateX(${this.translate}px)`;-->
<!--                let newIndex = direction === 'next' ? this.selectedIndex + 1 : this.selectedIndex - 1;-->
<!--                if (newIndex >= 0 && newIndex < this.dates.length) {-->
<!--                    this.selectDate(newIndex);-->
<!--                }-->
<!--            }-->

<!--            updateNav() {-->
<!--                this.navPrev.classList.toggle('h--timeline-navigation--inactive', this.selectedIndex === 0);-->
<!--                this.navNext.classList.toggle('h--timeline-navigation--inactive', this.selectedIndex === this.dates.length - 1);-->
<!--            }-->

        
<!--            startDrag(e) {-->
<!--                this.isDragging = true;-->
<!--                this.startX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;-->
<!--            }-->

<!--            drag(e) {-->
<!--                if (!this.isDragging) return;-->
<!--                const currentX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;-->
<!--                const delta = currentX - this.startX;-->
<!--                const containerWidth = this.element.querySelector('.h--timeline-dates').offsetWidth;-->
<!--                const lineWidth = Number(this.line.style.width.replace('px', ''));-->
<!--                let newTranslate = this.translate + delta;-->

<!--                if (-newTranslate > lineWidth - containerWidth) newTranslate = containerWidth - lineWidth;-->
<!--                if (newTranslate > 0) newTranslate = 0;-->
<!--                this.line.style.transform = `translateX(${newTranslate}px)`;-->
<!--            }-->

<!--            endDrag() {-->
<!--                if (!this.isDragging) return;-->
<!--                this.isDragging = false;-->
<!--                this.translate = Number(this.line.style.transform.match(/-?\d+/)?.[0] || 0);-->
<!--                this.updateNav();-->
<!--            }-->
<!--        }-->

<!--        document.querySelectorAll('.js-h--timeline').forEach(timeline => new HorizontalTimeline(timeline));-->
<!--    });-->
<!--</script>-->

@include('layouts.frontfooter')