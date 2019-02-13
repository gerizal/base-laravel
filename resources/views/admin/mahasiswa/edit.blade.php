@extends('admin.roles.create')

@section('editId',$role->id)
@section('name',$role->name)
@section('url','/role/update/'.$role->id)
@for($i=0; $i<count($data_permission);$i++)
@section('permission[]',$data_permission[$i])
@endfor
@section('editMethod')
  {{method_field('PUT')}}
@endsection