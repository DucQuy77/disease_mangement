@extends('user.main')

@section('content')
    <div id="success-message" class="d-none">{{ session('success') }}</div>
    <div id="error-message" class="d-none">{{ session('error') }}</div>
    <!-- Blog Section -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-post">
                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image"><img src="{{url('storage/images/' .$postDiseases->images)}}" alt="" ></div>
                                <div class="lower-content">
                                    <ul class="post-info">
                                        <li><span class="far fa-user"></span>{{ $postDiseases->author->name}} </li>
                                        <li><span class="far fa-calendar"></span> {{ $postDiseases->created_at }}</li>
                                    </ul>
                                    <h3>{{ $postDiseases->disease_name }}</h3>
                                    <blockquote>{{ $postDiseases->overview }}</blockquote>
                                    <h5>Tìm hiểu chung</h5>
                                    <p>{{ $postDiseases->learn_general}}</p>
                                    <h5>Triệu chứng</h5>
                                    <p>{{ $postDiseases->symptom }}</p>
                                    <div class="two-column row">
                                        <div class="image-column col-lg-6 col-md-6 col-sm-12">
                                            <figure class="image wow fadeIn"><img src="/template/user/images/resource/blog-1.jpg" alt=""></figure>
                                        </div>
                                        <div class="content-column col-lg-6 col-md-6 col-sm-12">
                                            <h5>Nguyên nhân</h5>
                                            <p>{{ $postDiseases->reason }}</p>
                                        </div>
                                    </div>
                                    <h5>Nguy cơ</h5>
                                    <p>{{ $postDiseases->risk }}</p>
                                    <h5>Phương Pháp Chẩn Đoán & Điều Trị</h5>
                                    <p>{{ $postDiseases->diagnose }}</p>
                                    <h5>Chế Độ Sinh Hoạt & Phòng Ngừa</h5>
                                    <p>{{ $postDiseases->prevent }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <div class="inner-box clearfix">
                            <div class="thumb"><img src="images/resource/author-thumb.jpg" alt=""></div>
                            <span class="title">Tác giả</span>
                            <h4 class="name">{{$postDiseases->author->name}}</h4>
                            <div class="text"></div>
                            <ul class="social-icon-one">
                                <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-whatsapp"></span></a></li>
                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Comments Area -->
                    <div class="comments-area">
                        <div class="group-title">
                            <h3>Có {{$commentCount}} bình luận</h3>
                        </div>
                        @foreach($comments as $comment )
                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb"><img src="images/resource/avatar-1.jpg" alt=""></div>
                                <div class="comment-info">
                                    <div class="name">{{ $comment->user->name}}</div>
                                    <div class="date">{{ $comment->created_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                                <div class="text">{{$comment->content}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Comments -->

                    <div class="comment-form">
                        <div class="group-title">
                            <h3>Để lại bình luận của bạn</h3>
                        </div>
                        <form method="post" action="{{ route('comments') }}" id="commentForm">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="hidden" name="user_id" value="{{ session('user')->id }}">
                                    <input type="hidden" name="disease_id" value="{{ $postDiseases->id }}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="content" placeholder="Bình luận của bạn" required></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Bình luận</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <!--search box-->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="blog.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Tìm kiếm....." required="">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar-widget category-list">
                            <div class="sidebar-title"><h3>Danh mục (Theo mùa)</h3></div>
                            <ul class="cat-list">
                                @foreach($seasons as $season)
                                    <li class="active"><a href="{{route('categorySeason', ['id' => $season->id])}}">{{$season->season_name}} <span></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Blog Section -->
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Biến để kiểm tra trạng thái đăng nhập
        var isLoggedIn = @json(Auth::check() ? 'true' : 'false');

        document.addEventListener('DOMContentLoaded', function () {
            var commentForm = document.getElementById('commentForm');

            if (commentForm) {
                commentForm.addEventListener('submit', function (event) {
                    commentForm.appendChild(hiddenInput);
                    if (!isLoggedIn) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Bạn chưa đăng nhập',
                            text: 'Vui lòng đăng nhập để bình luận.',
                            confirmButtonText: 'Đăng nhập ngay!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('login') }}"; // Chuyển hướng đến trang đăng nhập
                            }
                        });
                    }
                });
            }
        });
    </script>
@endsection
