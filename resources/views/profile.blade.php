@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    <img src="{{asset('/storage/' . auth()->user()->image)}}" width="82px">

                    <h3>{{auth()->user()->name}}</h3>
                </div>
                <div class="card-body">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
                        </div>

                        <div class="form-group">
                            <label for="name">الإيميل</label>
                            <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                        </div>

                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">تغيير الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input">
                                <label for="image" class="custom-file-image text-start" data-browse="استعرض"></label>
                            </div>
                        </div>

                        <div class="form-group d-flex mt-5 flex-row-reverse">
                            <button type="submit" class="btn btn-primary ms-5">حفظ التعديلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                    </form>

                    <form action="/logout" method="POST">@csrf</form>
                </div>
            </div>
        </div>

    </div>
@endsection