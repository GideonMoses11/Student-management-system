@extends('layouts.app')
@section('title', 'Departments')
@section('content')
<h1><a href="{{ route('create')}}">Add new department</a></h1> 
<div class="card">
    <div class="card-body">
        Department List
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
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($department as $departments)
        <tr>
            <th scope="row">{{$departments->id}}</th>
            <td>{{$departments->title}}</td>
            <td>

            <a href="{{route('edit', $departments->id)}}">Edit</a>
            || <form id ="delete-form-{{$departments->id}} " action="{{ route('delete', $departments->id) }}" method="post">
                    @csrf
                    @method('DELETE')
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

</div> --}}
@endsection

{{-- <a href="" onclick="
        if(confirm('Are you sure, you want to delete this?')){
            event.preventDefault();
        document.getElementById('delete-form-{{$departments->id}}').submit();
        } else {
            event.preventDefault();
        }">Delete</a> --}}

