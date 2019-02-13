@extends('admin.users.create')

@section('editId',$user->id)
@section('name',$user->name)
@section('email',$user->email)
@section('password',$user->password)
@section('readonly','readonly="true')
@section('url','/user/update/'.$user->id)


@section('editMethod')
  {{method_field('PUT')}}
@endsection