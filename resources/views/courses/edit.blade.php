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
                        echo '<a href="#" class="btn btn-sm btn-outline-secondary">Edit Course</a>';
                    }
                @endphp
              </div>
            </div>
          </div>
          <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $course->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>

                            <div class="col-md-6">
                                <select id="duration" class="form-control @error('duration') is-invalid @enderror" name="duration" required autocomplete="duration">
                                    <option value="3" {{ $course->duration == 3 ? 'selected' : '' }}>3 months</option>
                                    <option value="6" {{ $course->duration == 6 ? 'selected' : '' }}>6 months</option>
                                    <option value="12" {{ $course->duration == 12 ? 'selected' : '' }}>1 year</option>
                                </select>

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instructor" class="col-md-4 col-form-label text-md-right">{{ __('Instructor') }}</label>

                            <div class="col-md-6">
                                <select id="instructor" class="form-control @error('instructor') is-invalid @enderror" name="teacher_id" required autocomplete="instructor">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>

                                @error('instructor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('courses.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
          </div>
        </main>
        
@include('includes.footer')