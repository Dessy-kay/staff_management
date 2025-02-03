@extends('layouts.app')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="mb-5 d-flex justify-content-end">

            <!-- add staff modal trigger button -->
            <a href="{{ route("create")}}" class="btn add-staff">
                Add Staff
            </a>
        </div>

        {{-- staffs div --}}
        <div class="row g-5">

            @forelse ($staffs as $staff)
            <div class="col-lg-4 col-md-6">

                <div class="rounded-3 row g-0 staff-card">
                    <div class="col-10" style="min-height: 200px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('storage/'.$staff->image) }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex flex-column align-items-center justify-content-start bg-light">
                            <a class="btn" href="https://www.linkedin.com/{{$staff->linkedln_username}}" target="blank"><i class="fab fa-linkedin"></i></a>

                            <a class="btn" href="https://www.x.com/{{$staff->twitter_username}}" target="blank"><i class="fab fa-twitter"></i></a>

                            <a class="btn" href="{{route("edit", $staff)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 bg-light">
                            <h4 class="text-uppercase">{{$staff->name}}</h4>
                            <span class="mb-2 d-block"><b>Email: </b>{{$staff->email}}</span>
                            <span class="mb-2 d-block"><b>Position: </b>{{$staff->position}}/span>
                            <span class="d-block"><b>Phone: </b>{{$staff->phone_no}}</span>
                        </div>
                    </div>

                </div>
            </div>

                @empty
                <h1 style=" #ddab44">No staff record</h1>
            @endforelse

        </div>
    </div>
@endsection
