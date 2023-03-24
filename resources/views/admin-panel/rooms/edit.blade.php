@extends('admin-panel.layouts.app')

@section('page_title')
    Room - Edit
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-header">
            <h3 class="card-title">{{ $room['room_name'] ?? 'Room Name' }}</h3>

        </div>

        <form class="check-disable" action="{{ route('admin-panel.rooms.update', $room->id ?? 0) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_number" class="required">Room Number</label>
                            <input type="number" class="form-control" name="room_number"
                                value="{{ $room['room_number'] ?? '' }}" placeholder="Enter Room Number" min="0">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_name" class="required">Room Name</label>
                            <input type="text" class="form-control" name="room_name" value="{{ $room['room_name'] }}"
                                placeholder="Enter Room Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="location" class="required">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $room['location'] }}"
                                placeholder="Enter Room Location">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="capacity" class="required">Room Capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ $room['capacity'] }}"
                                placeholder="Enter Room Capacity">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="equipment" class="required">Equipment</label>
                            <input type="text" class="form-control" name="equipment" value="{{ $room['equipment'] }}"
                                placeholder="Enter Room Equipment">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                @foreach ($room_statuses as $status)
                                    <option @if ($room['status'] == $status) selected @endif value="{{ $status }}">
                                        {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label>Choose Images</label>
                        <input id="images" type="file" class="form-control" name="images[]" placeholder="address"
                            multiple>
                    </div>

                    <div class="col-12 mt-2 mb-2">
                        <div class="images-preview-div"> </div>
                    </div>

                    <div class="col-12">
                        @if (count($room->bookingSlots) > 0)
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Active Days</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-12">
                                                <div class="form-group clearfix">
                                                    @foreach ($day_of_weeks as $key => $day)
                                                        <div class="row">
                                                            <div class="form-group col-xl-2 col-md-2 col-sm-6 col-12">
                                                                <input type="hidden"
                                                                    name="day_of_week[{{ $key }}][day_of_week]"
                                                                    value="{{ $key }}">
                                                                <input type="checkbox" id="{{ $day }}"
                                                                    name="day_of_week[{{ $key }}][is_active]"
                                                                    value="1"
                                                                    @if ($room->bookingSlots[$key]['is_active']) checked @endif>
                                                                <label
                                                                    for="{{ $day }}">{{ $day }}</label>
                                                            </div>
                                                            <div class="form-group col-xl-2 col-md-2 col-sm-6 col-12">
                                                                <label for="location">start time</label>
                                                                <input type="time" class="form-control"
                                                                    name="day_of_week[{{ $key }}][start_time]"
                                                                    value="{{ $room->bookingSlots[$key]['start_time'] }}">
                                                            </div>
                                                            <div class="form-group col-xl-2 col-md-2 col-sm-6 col-12">
                                                                <label for="location">end time</label>
                                                                <input type="time" class="form-control"
                                                                    name="day_of_week[{{ $key }}][end_time]"
                                                                    value="{{ $room->bookingSlots[$key]['end_time'] }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right btn-check-disable">
                    <i class="fa-solid fa-edit"></i> Edit
                    <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </button>
            </div>

        </form>


    </div>

    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Room Images</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                            <div class="form-group clearfix">
                                <div class="row">
                                    @foreach ($room->images as $image)
                                        <div class="col-md-6 col-12">
                                            <img class="w-100"
                                                src="{{ asset('images/room_image/' . $image->image_url) }}"
                                                class="card-img-top">
                                            <button type="button" class="btn btn-outline-danger btn-sm col"
                                                data-bs-toggle="modal"
                                                data-bs-target="#destroy-image-modal-{{ $image->id }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                            </button>
                                        </div>

                                        <div class="modal fade" id="destroy-image-modal-{{ $image->id }}"
                                            tabindex="-1" aria-labelledby="destroy-image-modal-{{ $image->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="destroy-image-modal-{{ $image->id }}">
                                                            Delete Image</h1>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin-panel.rooms.destroyImage', ['image' => $image]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit"
                                                                class="btn btn-success float-right">Yes</button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">No</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
