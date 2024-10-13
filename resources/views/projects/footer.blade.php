<div class="card-footer" dir="rtl">
    <div class="d-flex">
        
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="project created date">
            <div class="me-2">
                {{$project->created_at->diffForHumans()}}
            </div>
        </div>

        <div class="d-flex align-items-center me-4">
            <img src="/images/list-check.svg" alt="project created date">
            <div class="me-2">
                @switch(count($project->tasks))
                    @case(0)
                            <span class="text-danger">لاتوجد مهام</span>
                        @break
                    @case(1)
                        مهمة واحدة
                        @break
                    @case(2)
                        مهمتين
                        @break
                    @default
                    {{count($project->tasks)}} مهام
                @endswitch
            </div>
        </div>

        <div class="d-flex align-items-center me-auto">
            <form action="/projects/{{$project->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-delete" value="">
            </form>
        </div>

    </div>
</div>