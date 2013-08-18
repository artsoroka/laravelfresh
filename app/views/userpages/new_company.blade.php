@extends('userpages.template')

@section('content')

<form action="/home/company/new" method="POST" enctype="multipart/form-data">
  <input type="file" name="file" value="Seect the file" class="btn btn-primary"/>
  <input type="text" name="filename" /> 
  <input type="submit" value="fire">
</form>

@endsection