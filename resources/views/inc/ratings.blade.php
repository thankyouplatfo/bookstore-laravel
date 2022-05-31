<span class="score w3-border-top w3-border-bottom w3-section w3-padding-16 w3-center">
    <div class="score-wrap">
        <span class="stars-active" style="width: {{ $book->rate() * 20 }}%">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </span>

        <span class="stars-inactive">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </span>
    </div>
    <span class="d-block">عدد المقيمين {{ $book->ratings()->count() }} مستخدم</span>
</span>
