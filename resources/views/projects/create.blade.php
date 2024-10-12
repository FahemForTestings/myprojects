@extends('layouts.app')

@section('title', 'انشاء مشروع جديد')

@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-10">
            <h3 class="pb-5 text-center font-weght-bold">
                مشروع جديد
            </h3>

            <form action="/projects" method="post" dir="rtl">
                @csrf
                <div class="form-group">
                    <label for="title">اسم المشروع</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description">وصف المشروع</label>
                    <textarea name="description" id="description" cols="8" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">انشاء</button>
                    <a href="/projects" class="btn btn-light">الغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
