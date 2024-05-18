@extends('user.main')

@section('content')
    <!-- Sidebar Page Container -->
    <section class="blog-section blog-three-col">
        <div class="auto-container">
            <div class="row">
                <!-- News Block -->
                @if($diseases->isEmpty())
                    <p style="margin: 0 auto;">Không có dữ liệu.</p>
                @else
                    @foreach($diseases as $disease)
                        <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-post-image.html"><img src="/template/user/images/resource/news-1.jpg" alt=""></a></figure>
                                    <a href="#" class="date">{{$disease->created_at->format('d/m/Y H:i:s')}}</a>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{route('detailPostSeason', ['id' => $disease->id])}}">{{$disease->disease_name}}</a></h4>
                                    <div class="text">{{$disease->overview}}</div>
                                    <div class="post-info">
                                        <div class="post-author">By {{ $disease->author->name }}</div>
                                        <ul class="post-option">
                                            <li>
                                                <a href="#" class="like-button" data-disease-id="{{$disease->id}}">
                                                    <span id="like-count-{{$disease->id}}">{{$disease->likes->count()}}</span>
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    {{$disease->comments->count()}}
                                                    <i class="far fa-comments"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $diseases->links() }}
        </div>
    </section>
    <!-- End Sidebar Container -->
@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.like-button').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    var diseaseId = this.getAttribute('data-disease-id');
                    fetch('{{ route('likes') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            disease_id: diseaseId
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi',
                                    text: data.error,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành công',
                                    text: data.success,
                                });

                                // Cập nhật số lượt like
                                var likeCountElement = document.querySelector(`#like-count-${diseaseId}`);
                                var likeCount = parseInt(likeCountElement.textContent) + 1;
                                likeCountElement.textContent = likeCount;
                            }
                        });
                });
            });
        });
    </script>
@endsection
