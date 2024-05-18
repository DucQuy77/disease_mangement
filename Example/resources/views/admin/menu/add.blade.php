@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="menu">Tên Bệnh</label>
                        <input type="text" name="disease_name" class="form-control"  placeholder="Nhập tên bệnh">
                    </div>
                    <div class="form-group">
                        <label for="menu">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Tổng quan</label>
                        <textarea name="overview" cols="30" class="form-control" rows="3" placeholder="Tổng quan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tìm hiểu chung</label>
                        <textarea name="learn_general" cols="30" class="form-control" rows="3" placeholder="Tìm hiều chung"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Triệu chứng</label>
                        <textarea name="symptom" cols="30" class="form-control" rows="3" placeholder="Triệu chứng"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nguyên nhân</label>
                        <textarea name="reason" cols="30" class="form-control" rows="3" placeholder="Nguyên nhân"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nguy cơ</label>
                        <textarea name="risk" cols="30" class="form-control" rows="3" placeholder="Nguy cơ"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Phương Pháp Chẩn Đoán & Điều Trị</label>
                        <textarea name="diagnose" cols="30" class="form-control" rows="3" placeholder="Phương Pháp Chẩn Đoán & Điều Trị"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Phòng Ngừa</label>
                        <textarea name="prevent" cols="30" class="form-control" rows="3" placeholder="Phòng Ngừa"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Theo Mùa</label>
                        <div class="dropdown">
                            <button onclick="toggleDropdown(event, 'options-seasons', 'selected-seasons', 'selectedSeasonsHidden')">Select Options</button>
                            <div id="options-seasons" class="dropdown-content">
                                @foreach($seasons as $season)
                                    <label><input type="checkbox" name="season_id[]" value="{{$season->id}}" data-name="{{$season->season_name}}">{{$season->season_name}}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="selected-seasons"></div>
                        <input type="hidden" name="selectedSeasonsHidden" value="">
                    </div>

                    <div class="form-group">
                        <label>Theo Đối Tượng</label>
                        <div class="dropdown">
                            <button onclick="toggleDropdown(event, 'options-objects', 'selected-objects', 'selectedObjectsHidden')">Select Options</button>
                            <div id="options-objects" class="dropdown-content">
                                @foreach($objects as $object)
                                    <label><input type="checkbox" name="object_id[]" value="{{$object->id}}" data-name="{{$object->object_name}}">{{$object->object_name}}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="selected-objects"></div>
                        <input type="hidden" name="selectedObjectsHidden" value="">
                    </div>
                </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Thêm Bệnh</button>
                    </div>
                @csrf
              </form>
@endsection

@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown(event, optionsId, selectedClassName, hiddenInputName) {
            event.preventDefault();
            document.getElementById(optionsId).classList.toggle("show");
            const selectedItems = document.querySelector(`.${selectedClassName}`);
            const hiddenInput = document.querySelector(`input[name="${hiddenInputName}"]`);

            document.querySelectorAll(`#${optionsId} input[type="checkbox"]`).forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedValues = [];
                    document.querySelectorAll(`#${optionsId} input[type="checkbox"]:checked`).forEach(checkedCheckbox => {
                        selectedValues.push(checkedCheckbox.dataset.name);
                    });
                    selectedItems.innerHTML = selectedValues.join(', ');

                    const selectedIds = Array.from(document.querySelectorAll(`#${optionsId} input[type="checkbox"]:checked`)).map(checkbox => checkbox.value);
                    hiddenInput.value = selectedIds.join(',');
                });
            });
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown button')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
@endsection