@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Users / Edit #{{$user->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $user->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('email')) has-error @endif">
                           <label for="email-field">Email</label>
                        <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $user->email : old("email") }}"/>
                           @if($errors->has("email"))
                            <span class="help-block">{{ $errors->first("email") }}</span>
                           @endif
                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                               <label for="password-field">Password</label>
                            <input type="text" id="password-field" name="password" class="form-control" value="{{ is_null(old("password")) ? $user->password : old("password") }}"/>
                               @if($errors->has("password"))
                                <span class="help-block">{{ $errors->first("password") }}</span>
                               @endif
                            </div>

                            <div class="form-group @if($errors->has('role')) has-error @endif">
                                <label for="role-field">Role</label>
                                <select id="role-field" name="role" class="form-control custom-select">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{$role->name == $user->getRoleNames()[0] ? 'selected' : ''}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has("role"))
                                    <span class="help-block">{{ $errors->first("role") }}</span>
                                   @endif
                                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
