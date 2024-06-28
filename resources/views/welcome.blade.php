@extends('layouts.main')

@section('title', 'Uas Pemweb 2')

@section('content')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div
            class=" bg-gradient-to-tr from-slate-800 to-slate-700 w-1/2 p-16 text-center dark:text-white rounded-lg uppercase">
            <div class="mb-5 font-bold tracking-wider text-4xl">uas pemrograman web ii</div>
            <a class="uppercase bg-slate-500 hover:bg-slate-600 rounded-full py-2 px-4 text-lg font-semibold"
                href="{{ url('register') }}">start</a>
        </div>
    </div>
@endsection