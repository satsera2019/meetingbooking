@extends('admin-panel.layouts.app')

@section('page_title')
    Room - Create
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-body">add room</div>
    </div>
    <div class="card card-primary col-12">
        <form class="check-disable" onsubmit="generateDates()" action="{{ route('admin-panel.rooms.store') }}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_number" class="required">Room Number</label>
                            <input type="number" class="form-control" name="room_number" value="{{ old('room_number') }}"
                                placeholder="Enter Room Number" min="0">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_name" class="required">Room Name</label>
                            <input type="text" class="form-control" name="room_name" value="{{ old('room_name') }}"
                                placeholder="Enter Room Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="location" class="required">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                placeholder="Enter Room Location">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="capacity" class="required">Room Capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ old('capacity') }}"
                                placeholder="Enter Room Capacity">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="equipment" class="required">Equipment</label>
                            <input type="text" class="form-control" name="equipment" value="{{ old('equipment') }}"
                                placeholder="Enter Room Equipment">
                        </div>
                    </div>

                    {{-- <div class="col-12">
                        <div class="form-group clearfix">
                            @foreach ($day_of_weeks as $key => $day)
                                <div class="row">
                                    <div class="form-group col-1">
                                        <input type="hidden" name="day_of_week[{{ $key }}][day_of_week]"
                                            value="{{ $key }}">
                                        <input type="checkbox" id="{{ $day }}"
                                            name="day_of_week[{{ $key }}][is_active]" value="1">
                                        <label for="monday">{{ $day }}</label>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="location">start time</label>
                                        <input type="time" class="form-control"
                                            name="day_of_week[{{ $key }}][start_time]"
                                            step="600" min="09:00" max="17:00">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="location">end time</label>
                                        <input type="time" class="form-control"
                                            name="day_of_week[{{ $key }}][end_time]">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                    <div>
                        <label>Choose Images</label>
                        <input id="images" type="file" class="form-control" name="images[]" placeholder="address" multiple>
                    </div>

                    

                </div>

                <div class="images-preview-div"> </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right btn-check-disable">
                    <i class="fa-solid fa-add"></i> Create
                    <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </button>
            </div>
        </form>
    </div>

    <script>
        $(function() {
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    console.log(input.files);
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
@endsection
