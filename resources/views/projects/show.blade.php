@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع / {{ $project->title }}</a>
        </div>
        <div>
            <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
        </div>
    </header>

    <div class="row text-right" dir="rtl">
        <div class="col-lg-4">
            {{-- Project details --}}
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
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>
                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>
                        @include('projects.footer')
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>قيد الإنجاز</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>ملغى</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            {{-- Tasks --}}
            @foreach ($project->tasks as $task)
                <div class="card d-flex flex-row">
                    <div class="{{ $task->done ? 'checked' : '' }}">
                        {{ $task->body }}
                    </div>
                    <div class="me-auto">
                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="done" class="ms-2" {{ $task->done ? 'checked' : '' }}
                                onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-delete" value="">
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="card">
                <div class="card-body">
                    <form action="/projects/{{ $project->id }}/tasks" class="d-flex" method="POST">
                        @csrf
                        <label for="title">اسم المهمة</label>
                        <input type="text" name="body" class="form-control" placeholder="اكتب اسم المهمة">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
