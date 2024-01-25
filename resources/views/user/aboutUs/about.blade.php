@extends('user.layouts.master')

@section('title','About Us - AY Japan Bikes Shop')

@section('content')
    <!-- about page start  -->
    <section id="about-us" class="mx-auto my-4">
        <div class="d-block mx-auto text-center mb-4">
            <h3>About Us</h3>
        </div>
        <div class="container-lg">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('image/about.webp') }}" class="w-100 d-block">
                </div>
                <div class="col-lg-6 col-md-6 mt-4">
                    <h4 class="pb-2">We Have Everything You Need.</h4>
                    <p class="text-bg-light px-2 rounded">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                    <label class="d-block">Sample Unordered List</label>
                    <ul>
                        <li>Lorem ipsum, or lipsum as it is sometimes known</li>
                        <li>Dummy text used in laying out print, graphic or web designs</li>
                        <li>The passage is attributed to.</li>
                        <li>Proin molestie egestas orci ac suscipit risus posuere loremou.</li>
                        <li>Dummy text used in laying out print, graphic or web designs</li>
                    </ul>
                    <button class="btn btn-outline-primary py-2 px-3">
                        <a href="{{ route('user#contactPage') }}" class="text-white text-decoration-none">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- about page end  -->

    <!-- service start  -->
    <section id="about-service">
        <div class="text-center">
            <p><span></span>The Products</p>
            <h2>Our Services</h2>
        </div>
        <div class="container-lg mt-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center mb-4">
                    <div id="about-service-content">
                        <div>
                            <i class="fa-brands fa-osi"></i>
                        </div>
                        <h4>FREE RESOURCES</h4>
                        <p>Bring to table win-win survival strategies to ensure proactive domination.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-4">
                   <div id="about-service-content">
                        <div>
                            <i class="fa-brands fa-waze"></i>
                        </div>
                        <h4>MULTI PURPOSE</h4>
                        <p>Bring to table win-win survival strategies to ensure proactive domination.</p>
                   </div>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <div id="about-service-content">
                        <div>
                            <i class="fa-regular fa-lightbulb"></i>
                        </div>
                        <h4>FULLY RESPONSIVE</h4>
                        <p>Bring to table win-win survival strategies to ensure proactive domination.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service end  -->

    <!-- about2 page start  -->
        <section id="about-us" class="mx-auto mb-5">
            <div class="container-lg">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-6 mt-4">
                        <h4 class="pb-2">We Have Everything You Need.</h4>
                        <p class="text-bg-light px-2 rounded">Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                        <label class="d-block">Sample Unordered List</label>
                        <ul>
                            <li>Lorem ipsum, or lipsum as it is sometimes known</li>
                            <li>Dummy text used in laying out print, graphic or web designs</li>
                            <li>The passage is attributed to.</li>
                            <li>Proin molestie egestas orci ac suscipit risus posuere loremou.</li>
                            <li>Dummy text used in laying out print, graphic or web designs</li>
                        </ul>
                        <button class="btn btn-outline-primary py-2 px-3">
                            <a href="{{ route('user#contactPage') }}" class="text-white text-decoration-none">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('image/about2.webp') }}" class="w-100 d-block">
                    </div>
                </div>
            </div>
        </section>
    <!-- about2 page end  -->
@endsection
