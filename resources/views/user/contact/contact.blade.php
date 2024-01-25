@extends('user.layouts.master')

@section('title','Contact Us - AY Japan Bikes Shop')

@section('content')

    @if (session('sendSuccess'))
        <div class="col-6 offset-1 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sendSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- contact start  -->
    <section id="contact" class="mx-auto my-4">
        <div id="contact-heading">
            <h3>Contact Us</h3>
            <p>Got a question? We had love to hear from you. Send us a message and we will respond as soon as possible.</p>
        </div>

        <div class="container-lg mx-auto pt-5 px-4 border">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-5">
                    <h4>Drop us message</h4>
                    <form action="{{ route('user#contactMessage') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="userId" >
                            <label for="" class="col-form-label fs-6">Name</label>
                            <input type="name" name="contactName" value="{{ old('contactName') }}" class="form-control @error('contactName') is-invalid @enderror" placeholder="Enter your name">
                            @error('contactName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label fs-6">Email</label>
                            <input type="email" name="contactEmail" value="{{ old('contactEmail') }}" class="form-control @error('contactEmail') is-invalid @enderror" placeholder="Enter your email">
                            @error('contactEmail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label fs-6">Message</label>
                            <textarea name="contactMessage" id="" cols="80" rows="5" class="form-control @error('contactMessage') is-invalid @enderror" placeholder="Your message here" style="resize: none;">{{ old('contactMessage') }}</textarea>
                            @error('contactMessage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-success px-4 py-2" type="submit">
                            <a href="" class="text-white text-decoration-none">Submit <i class="fa-solid fa-arrow-right"></i></a>
                        </button>
                    </form>
                </div>
                <div class="col-lg-6 px-4 col-md-6 mb-5">
                    <h4>Get in Touch</h4>
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>
                    <div>
                        <div id="touch">
                            <div id="touch-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div id="touch-address">
                                <h5>Address</h5>
                                <label for="">255 Parker St. Englishtown, NJ 07726</label>
                            </div>
                        </div>
                        <div id="touch">
                            <div id="touch-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div id="touch-address">
                                <h5>Phone</h5>
                                <label for="">+1234568999</label>
                            </div>
                        </div>
                        <div id="touch">
                            <div id="touch-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div id="touch-address">
                                <h5>Email</h5>
                                <label for="">yoursite@demo.com</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-lg w-100 mt-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6357.886214863929!2d-7.961625!3d37.177823!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1ab161c81fb0ff%3A0x867380c80c46b1d!2sAmendoeira%20Organics!5e0!3m2!1sen!2spt!4v1692451187335!5m2!1sen!2spt" width="100%" height="300" style="border:0; display: block; margin: auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- contact end  -->
@endsection
