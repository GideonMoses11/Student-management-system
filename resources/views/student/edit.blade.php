@extends('layouts.app')
@section('title', 'Update Student Info')
@section('content')

<div class="container">
    {{--
    <div class="row justify-content-center"> --}} {{--
        <div class="col-md-9"> --}}
            <div class="card">
                <div class="card-header">Update Student Info {{$data->id}} </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{route('student.update', $data->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="email" autofocus> @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone number') is-invalid @enderror" name="phone_number" value="{{ $data->phone_number }}" required autocomplete="email" autofocus> @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email" autofocus> @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roll" class="col-md-4 col-form-label text-md-right">Roll</label>

                            <div class="col-md-6">
                                <input id="roll" type="text" class="form-control @error('roll') is-invalid @enderror" name="roll" value="{{ $data->roll }}" required autocomplete="email" autofocus> @error('roll')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reg_id" class="col-md-4 col-form-label text-md-right">Reg ID</label>

                            <div class="col-md-6">
                                <input id="reg_id" type="text" readonly class="form-control @error('reg_id') is-invalid @enderror" name="reg_id" value="{{ $data->reg_id }}" required autocomplete="email" autofocus> @error('reg_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-md-4 col-form-label text-md-right">Present address</label>

                            <div class="col-md-6">
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" value="{{ $data->present_address }}" required autocomplete="email" autofocus> @error('present_address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Permanent address</label>

                            <div class="col-md-6">
                                <input id="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" value="{{ $data->permanent_address }}" required autocomplete="email" autofocus> @error('permanent_address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="home_number" class="col-md-4 col-form-label text-md-right">Home number</label>

                            <div class="col-md-6">
                                <input id="home_number" type="text" class="form-control @error('home_number') is-invalid @enderror" name="home_number" value="{{ $data->home_number }}" required autocomplete="email" autofocus> @error('home_number')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="classes_id" class="col-md-4 col-form-label text-md-right">Class</label>

                            <div class="col-md-6">
                                <select name="classes_id" id="classes_id" class="form-control">
                                    <option value="">Select one</option>
                                    @foreach($classes as $class)
                                   <option value="{{$class->id}}"{{$data->classes_id == $class->id? 'selected':' ' }}>{{$class->title}}</option>
                                    @endforeach
                                   </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>

                            <div class="col-md-6">
                               <select name="department_id" id="department_id" class="form-control">
                                <option value="">Select one</option>
                                @foreach($department as $departments)
                               <option value="{{$departments->id}}"{{$data->department_id == $departments->id ? 'selected' : ' ' }}>{{$departments->title}}</option>
                                @endforeach
                               </select>
                                {{-- <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror --}}
                            </div>
                        </div>
                        {{-- <select name="department_id" id="">
                            @foreach ($department as $departments)
                            <option value="{{$departments->id}}">{{$departments->title}}</option>
                            @endforeach
                        </select> --}}
                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">Fathers name</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $data->father_name }}" required autocomplete="email" autofocus> @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mothers name</label>

                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $data->mother_name}}" required autocomplete="email" autofocus> @error('mother_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        Update Class
                                    </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- </div>
</div> --}}
@endsection
