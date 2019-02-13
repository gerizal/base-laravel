@extends('admin.profile.create')

@section('editId',$profile->id)
@section('name',$profile->name)
@section('email',$profile->email)
@section('password',$profile->password)
@section('image',$profile->image)
@section('readonly','readonly="true')
@section('url','/profile/update/'.$profile->id)


@section('editMethod')
  {{method_field('PUT')}}
@endsection