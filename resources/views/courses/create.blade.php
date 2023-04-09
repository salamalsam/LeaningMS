@php
$user = Auth::user();
@endphp


@include('includes.header')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Course</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @php
                    if($user->role_id == 1 || $user->role_id == 2){
                        echo '<a href="#" class="btn btn-sm btn-outline-secondary">Add Course</a>';
                    }
                @endphp
              </div>
            </div>
          </div>
          <form method="POST" action="{{ route('courses.store') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="col-md-6">
        <label for="duration" class="form-label">Duration</label>
        <select name="duration" id="duration" class="form-select" required>
            <option value="3">3 months</option>
            <option value="6">6 months</option>
            <option value="12">1 year</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="instructor" class="form-label">Instructor</label>
        <select name="teacher_id" id="instructor" class="form-select" required>
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>


          </div>
        </main>
        
@include('includes.footer')