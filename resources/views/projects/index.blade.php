@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع</a>
        </div>
        <div>
            <a href="/projects/create" class="btn btn-primary px-4" role="button">أضف مشروعا</a>
        </div>
    </header>

    <section class="row" dir="rtl">
        @forelse ($projects as $project)
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="status">
                            @switch($project->status)
                                @case(1)
                                    <span class="text-success">مكتمل</span>
                                    @break
                                @case(2)
                                <span class="text-danger">ملغى</span>
                                    @break
                                @default
                                <span class="text-warning">قيد الإنجاز</span>
                            @endswitch
                            <h5 class="font-weight-bold card-title">
                                <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                            </h5>
                            <div class="card-text mt-4">
                                {{Str::limit($project->description, 150)}}
                            </div>
                            @include('projects.footer')
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="m-auto align-content-center text-center">
                <p>لوحة العمل خالية من المشاريع</p>
                <div>
                    <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">أضف مشروعا</a>
                </div>
            </div>
        @endforelse
    </section>
@endsection