@extends('layout')
@section('header')
<div class="page-header">
        <h1>Users / Show #{{$user->id}}</h1>
        @role('admin')
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>
        @endrole
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$user->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">NAME</label>
                     <p class="form-control-static">{{$user->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="body">EMAIL</label>
                     <p class="form-control-static">{{$user->email}}</p>
                </div>
                @role('admin')
                <div class="form-group">
                    <label for="body">PASSWORD</label>
                    <p class="form-control-static">{{$user->password}}</p>
               </div>
               @endrole
               <div class="form-group">
                   <label for="body">ROLE</label>
                   <p class="form-control-static">{{$user->getRoleNames()[0]}}</p>
              </div>
            </form>

            <a class="btn btn-link" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
