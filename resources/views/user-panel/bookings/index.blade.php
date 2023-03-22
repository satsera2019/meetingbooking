@extends('user-panel.layouts.app')
@section('content')


    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bookingList.css') }}">

    <div class="container py-7">
        <h2 class="text-uppercase text-letter-spacing-xs my-0 text-primary font-weight-bold">
            Schedule
        </h2>
        <p class="text-sm text-dark mt-0 mb-5">There's time and place for everything.</p>
        <!-- Days -->
        <div class="row">
            <div class="col-lg-4 mb-3" id="Friday, Nov 13th">
                <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                    Friday, Nov 13th
                </h4>
                <ul class="list-timeline list-timeline-primary">
                    <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">09:00 -
                                10:00</span> - Registration</p>
                    </li>
                    <li class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                        data-target="#day-1-item-2">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span
                                class="text-primary font-weight-bold op-8 infinite animated flash" data-animate="flash"
                                data-animate-infinite="1" data-animate-duration="3.5"
                                style="animation-duration: 3.5s;">Now</span> - Vitaly Friedmann</p>
                        <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8 show" id="day-1-item-2"> Talk:
                            Wireframing / <span class="text-primary">Room 19</span> </p>
                    </li>
                    <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">12:00 -
                                13:00</span> - Lunch Break</p>
                    </li>
                    <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                        data-target="#day-1-item-4">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">13:00 -
                                15:00</span> - Anthony Jonas</p>
                        <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-4"> Talk:
                            OpenData / <span class="text-primary">Room 31</span> </p>
                    </li>
                    <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">15:00 -
                                16:00</span> - Coffee Break</p>
                    </li>
                    <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                        data-target="#day-1-item-6">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">16:00 -
                                18:00</span> - Jesscia Lawrence</p>
                        <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-6"> Talk:
                            Ninja coding / <span class="text-primary">Room 31</span> </p>
                    </li>
                    <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">18:00 -
                                23:00</span> - After conference</p>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Room Name</th>
                <th scope="col">Room Location</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->room_name }}</td>
                    <td>{{ $booking->room->location }}</td>
                    <td>{{ $booking->start_time }}</td>
                    <td>{{ $booking->end_time }}</td>
                    <td>
                        <div class="row">
                            <a href="" class="col">
                                <button type="button" class="btn btn-outline-primary btn-sm w-100"><i
                                        class="fa-solid fa-edit"></i> edit</button>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm col" data-bs-toggle="modal"
                                data-bs-target="#destroy-booking-modal-{{ $booking->id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete
                            </button>
                        </div>
                    </td>
                </tr>


                <div class="modal fade" id="destroy-booking-modal-{{ $booking->id }}" tabindex="-1"
                    aria-labelledby="destroy-booking-modal-{{ $booking->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="destroy-booking-modal-{{ $booking->id }}">Delete
                                    Booking</h1>
                            </div>
                            <div class="modal-body d-flex flex-column align-items-center">
                                {{ $booking->id }}
                            </div>
                            <form action="{{ route('user-panel.bookings.destroy', ['booking' => $booking]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-success float-right">
                                        Yes
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        No
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </tbody>
    </table>
@endsection
