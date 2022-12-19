

@extends('layouts.master')

@push('title')
    {{ $client->caption }}
@endpush


@section('content')
    <section id="pageCover" class="row aboutUs">
        <div class="row pageTitle">{{ $client->caption }}</div>
        <div class="row pageBreadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $client->caption }}</li>
            </ol>
        </div>
    </section>

    <section class="partner">
        <div class="container">
            <div class="row">
                @foreach ($client_breed as $client_breed_item)
                    <div class="col-md-3 col-sm-4">
                        <div class="item"><img src="{{ $client_breed_item->banner_image ?? ' ' }}" alt=""></div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
