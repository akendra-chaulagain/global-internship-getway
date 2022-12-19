@php
$job_breed = App\Models\Navigation::find($job_category->parent_page_id);
@endphp



@extends('layouts.master')

@push('title')
   {{ $job_category->caption }}
@endpush
@section('content')


    <section id="pageCover" class="row aboutUs">
        <div class="row pageTitle">{{ $job_category->caption }}</div>
        <div class="row pageBreadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="#">{{ $job_breed->caption }}</a></li>
                <li class="active">{{ $job_category->caption }}</li>
            </ol>
        </div>
    </section>

    <section id="projectsRow">
        <div class="container">
            <div class="row">
                @foreach ($jobs as $job_category_item)
                    <div class="col-md-6">
                        <div class="project">
                            @if ($job_category_item->banner_image)
                                 <img src="{{ $job_category_item->banner_image }}" alt="Project 1" class="projectImg">
                            @else
                                 <img src="/website/images/default/project1.jpg" alt="Project 1" class="projectImg">
                            @endif
                           
                            <div class="projectDetails row m0">
                                <div class="fleft nameType">
                                    <div class="row m0 projectName">{{ $job_category_item->caption }}</div>
                                    <div class="row m0 projectType">{!! $job_category_item->short_content ?? ' ' !!}</div>
                                </div>
                                <div class="fright projectIcons btn-group" role="group">
                                    <a href="{{route('single_job',$job_category_item->nav_name)}}" class="btn btn-default"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--Projects-->
@endsection
