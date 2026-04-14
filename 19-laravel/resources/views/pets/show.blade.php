@extends('layouts.app')

@section('title', 'Larapets: Show Pet')

@section('content')
    @include('partials.navbar')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
        </svg>
        Show Pet
    </h1>
    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li>
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('pets') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M200,96a32,32,0,1,0-32-32A32,32,0,0,0,200,96ZM56,96a32,32,0,1,0-32-32A32,32,0,0,0,56,96Zm144,0a32,32,0,1,0,32,32A32,32,0,0,0,200,96ZM56,96a32,32,0,1,0,32,32A32,32,0,0,0,56,96Zm113.39,42.1C160.76,127.13,147.26,120,128,120s-32.76,7.13-41.39,18.1A48,48,0,0,0,80,160c0,26.51,21.49,48,48,48s48-21.49,48-48A48,48,0,0,0,169.39,138.1Z"></path>
                    </svg>
                    Pet Module
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                    Show Pet
                </span>
            </li>
        </ul>
    </div>
    {{-- Card --}}
    <div class="bg-[#0009] p-10 rounded-sm">
        {{-- Image --}}
        <div class="avatar flex flex-col gap-1 items-center justify-center cursor-pointer hover:scale-105 transition ease-in">
            <div class="mask mask-squircle w-60">
                <img src="{{ asset('images/'.$pet->image) }}" />
            </div>
        </div>
        {{-- Data --}}
        <div class="flex gap-2 flex-col md:flex-row flex-wrap">
            <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-64">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Name:</span>
                    <span>{{ $pet->name }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Kind:</span>
                    <span>{{ $pet->kind }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Breed:</span>
                    <span>{{ $pet->breed }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Age:</span>
                    <span>{{ $pet->age }} years old</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Weight:</span>
                    <span>{{ $pet->weight }} kg</span>
                </li>
            </ul>
            <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-64">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Location:</span>
                    <span>{{ $pet->location }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Active:</span>
                    <span>
                        @if ($pet->active == 1)
                            <div class="badge badge-outline badge-success">Active</div>
                        @else
                            <div class="badge badge-outline badge-error">Inactive</div>
                        @endif
                    </span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Status:</span>
                    <span>
                        @if ($pet->status == 1)
                            <div class="badge badge-outline badge-warning">Adopted</div>
                        @else
                            <div class="badge badge-outline badge-info">Available</div>
                        @endif
                    </span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Created At:</span>
                    <span>{{ $pet->created_at->diffForHumans() }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Updated At:</span>
                    <span>{{ $pet->updated_at->diffForHumans() }}</span>
                </li>
            </ul>
            @if($pet->description)
            <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-64">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Description:</span>
                    <p class="mt-1 text-sm">{{ $pet->description }}</p>
                </li>
            </ul>
            @endif
        </div>
    </div>
@endsection
