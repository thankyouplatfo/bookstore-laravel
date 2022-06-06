{{-- @auth
    @if (auth()->user()->ratings($book))
        <div class="rating">
            <span class="rating-star {{ auth()->user()->bookRating($book)->value == 5? 'checked': '' }}"
                data-value="5"></span>
            <span class="rating-star {{ auth()->user()->bookRating($book)->value == 4? 'checked': '' }}"
                data-value="4"></span>
            <span class="rating-star {{ auth()->user()->bookRating($book)->value == 3? 'checked': '' }}"
                data-value="3"></span>
            <span class="rating-star {{ auth()->user()->bookRating($book)->value == 2? 'checked': '' }}"
                data-value="2"></span>
            <span class="rating-star {{ auth()->user()->bookRating($book)->value == 1? 'checked': '' }}"
                data-value="1"></span>
        </div>
    @else
        <div class="rating">
            <span class="rating-star" data-value="5"></span>
            <span class="rating-star" data-value="4"></span>
            <span class="rating-star" data-value="3"></span>
            <span class="rating-star" data-value="2"></span>
            <span class="rating-star" data-value="1"></span>
        </div>
    @endif
@endauth --}}
@section('script')
    <script>
        $('.rating-star').click(function() {
            var submitStarts = $(this).attr('data-value');
            //
            $.ajax({
                type: 'post',
                url: {{ $book->id }} + '/rate',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'value': submitStarts
                },
                success: function() {
                    alert({{ __('site.rating_s') }}),
                        location: reload(),
                }
                errorr: function() {
                    alert({{ __('site.rating_e') }}),
                }
            })
        });
    </script>
@endsection
