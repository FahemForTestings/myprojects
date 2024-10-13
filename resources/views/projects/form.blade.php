@csrf
<div class="form-group">
    <label for="title">اسم المشروع</label>
    <input type="text" name="title" class="form-control" value="{{$project->title ?? ''}}">
</div>
<div class="form-group">
    <label for="description">وصف المشروع</label>
    <textarea name="description" id="description" cols="8" rows="8" class="form-control">{{$project->description ?? ''}}</textarea>
</div>
