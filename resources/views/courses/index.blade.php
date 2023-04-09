@php
$user = Auth::user();
@endphp


@include('includes.header')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Course List</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @php
                    if($user->role_id == 1 || $user->role_id == 2){
                        echo '<a href="/courses/create" class="btn btn-sm btn-outline-secondary">Add Course</a>';
                    }
                @endphp
              </div>
            </div>
          </div>
          <table class="table w-100">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Instructor</th>
                        @php
                            if($user->role_id == 1 || $user->role_id == 2){
                                @endphp
                        <th>Actions</th>
                        @php
                            }
                            @endphp
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->duration }} Months</td>
                        <td>{{ $course->name }}</td>
                        @php
                            if($user->role_id == 1 || $user->role_id == 2){
                                @endphp
                        <td style="display:flex;justify-content:start-flex">
                            <a class="btn btn-warning" href="{{ route('courses.edit', $course->id) }}">Edit</a> &nbsp;
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        @php
                            }
                            @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>

          </div>
        </main>
        
@include('includes.footer')