@php
    $portfolio = App\Models\Portfolio::all();
@endphp


@foreach ($portfolio as $item)
    
<div class="portfolio__item">
    <div class="portfolio__thumb">
        <img src="{{ $item->portfolio_image }} " alt="">
    </div>
    <div class="portfolio__overlay__content">
        <span> {{ $item->portfolio_name }} </span>
        <h4 class="title"><a href="portfolio-details.html"> {{ $item->portfolio_title }}</a></h4>
        <a href="portfolio-details.html" class="link">Case Study</a>
    </div>
</div>
@endforeach