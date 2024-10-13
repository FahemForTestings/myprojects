@extends('layouts.app')

@section('title', 'تعديل المشروع')

@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-10">
            <h3 class="pb-5 text-center font-weght-bold">
                تعديل المشروع
            </h3>

            <form action="/projects/{{$project->id}}" method="post" dir="rtl">
                @method('PATCH')
                @include('projects.form')
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                    <a href="/projects/{{$project->id}}" class="btn btn-light">الغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
