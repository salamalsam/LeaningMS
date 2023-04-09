@php
$user = Auth::user();
@endphp


@include('includes.header')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
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
            <div class="alert alert-primary">Welcome Back <b>{{$user->name}}</b></div>
          </div>
        </main>
        
@include('includes.footer')