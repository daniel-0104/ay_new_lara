@foreach ($comment as $c)
    <div id="comment-container" class="mt-4">
        <div class="row mb-3" id="review-comment">
            <div class="col-lg-1 col-sm-2">
                @if ($c->rating_image == null)
                    @if ($c->rating_gender == 'male')
                        <img src="{{ asset('image/profileMale.avif') }}" alt="" class="d-block">
                    @else
                        <img src="{{ asset('image/profileFemale.avif') }}" alt="" class="d-block">
                    @endif
                @else
                    <img src="{{ asset('storage/'.$c->rating_image) }}" alt="" class="d-block">
                @endif
            </div>
            <div class="col-lg-11 col-sm-10">
                <div class="d-flex text-center align-items-center">
                    <input type="hidden" value="{{ $c->id }}">
                    <h5 class="me-2">{{ $c->user_name }} |</h5>
                    <label for="" class="text-info">{{ $c->created_at->timezone('Asia/Yangon')->format('d-F-Y , g:i A') }}</label>
                </div>
                <span class="text-warning">
                    @for ($i=1; $i<=5; $i++)
                        @if ($i <= $c->rating)
                            <i class="fa-solid fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </span>
                <label for="" class="ms-2">( {{ $c->title }} )</label>
                <p class="mt-2">{{ $c->message }}
            </div>
        </div>
    </div>
@endforeach
