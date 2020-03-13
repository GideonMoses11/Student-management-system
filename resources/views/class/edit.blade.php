@extends('layouts.app')
@section('title', 'Update Class Info')
@section('content')

<div class="container">
    {{--
    <div class="row justify-content-center"> --}} {{--
        <div class="col-md-9"> --}}
            <div class="card">
                <div class="card-header">Update Class Info {{$data->id}} </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{route('class.update', $data->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{($data->title) }}" required autocomplete="email" autofocus> @error('title')
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
