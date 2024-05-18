@extends('user.main')

@section('content')
<div class="mixitup-gallery">

    <div class="btns-outer">
        <!--Filter-->
        <ul class="filter-tabs filter-btns clearfix">
            <li class="filter active" data-role="button" data-filter="all">Lấy tất cả</li>
            <li class="filter" data-role="button" data-filter=".season">Theo mùa</li>
            <li class="filter" data-role="button" data-filter=".object">Theo từng đối tượng</li>
        </ul>
    </div>

    <div class="filter-list row mid-spacing">
        @foreach($seasons as $season)
            <!-- Portfolio Block -->
            <div class="portfolio-block all mix season col-lg-4 col-md-6 col-sm-12">
                <div class="image-box">
                    <figure class="image"><img src="/storage/images/muahe.jpg" alt=""></figure>
                    <div class="overlay">
                        <a href="/template/user/images/gallery/1-1.jpg" class="icon-box lightbox-image" data-fancybox="gallery"><span class="fa fa-expand"></span></a>
                        <div class="title-box">

                            <div class="cat">
                                <a href="{{route('categorySeason', ['id' => $season->id])}}"><h5>{{$season->season_name}}</h5></a>,
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Portfolio Block -->
            @foreach($objects as $object)
                <!-- Portfolio Block -->
                <div class="portfolio-block all mix object col-lg-4 col-md-6 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="/template/user/images/gallery/1-1.jpg" alt=""></figure>
                        <div class="overlay">
                            <a href="/template/user/images/gallery/1-1.jpg" class="icon-box lightbox-image" data-fancybox="gallery"><span class="fa fa-expand"></span></a>
                            <div class="title-box">

                                <div class="cat">
                                    <a href="{{route('categoryObject', ['id' => $object->id])}}"><h5>{{$object->object_name}}</h5></a>,
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
</div>
@endsection
