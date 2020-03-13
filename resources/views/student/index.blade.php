@extends('layouts.app')
@section('title', 'Students List')
@section('content')

{{-- <h1><a href="{{ route('create')}}">Add new department</a></h1> --}}
<div class="card">
    <div class="card-body">
        Students List ||<a href="{{ url('student/create')}}">Add new student</a>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            {{--
            <th scope="col">S/N</th> --}}
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone number</th>
            <th scope="col">Department</th>
            <th scope="col">Class</th>
            <th scope="col">Roll</th>
            <th scope="col">Reg ID</th>
            <th scope="col">Fathers name</th>
            <th scope="col">Mothers name</th>
            <th scope="col">Present address</th>
            <th scope="col">Permanent address</th>
            <th scope="col">Home number</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td><img src="{{url('uploads/students', $data->image)}}" style="height: 50px; width: 50px;"></td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone_number}}</td>
            <td>{{$data->department->title}}</td>
            <td>{{$data->classes->title}}</td>
            <td>{{$data->roll}}</td>
            <td>{{$data->reg_id}}</td>
            <td>{{$data->father_name}}</td>
            <td>{{$data->mother_name}}</td>
            <td>{{$data->present_address}}</td>
            <td>{{$data->permanent_address}}</td>
            <td>{{$data->home_number}}</td>
            <td>

                <a href="{{route('student.edit', $data->id)}}">Edit</a> ||
                <form id="delete-form-{{$data->id}} " action="{{ route('student.delete', $data->id) }}" method="post">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

            </td>
            {{--
            <td></td> --}}
        </tr>
        @endforeach

    </tbody>
</table>
{{--
<div class="text-center m-auto container">
    <div class="man">
        {{$department->links()}}
    </div>

</div> --}} @endsection {{-- <a href="" onclick="
        if(confirm('Are you sure, you want to delete this?')){
            event.preventDefault();
        document.getElementById('delete-form-{{$departments->id}}').submit();
        } else {
            event.preventDefault();
        }">Delete</a> --}}
