@extends('userpages.template')

@section('page_name')
Мои компании
@endsection 


@section('content')

@if( count($companies) > 0 )
<table class="table table-bordered">
  <thead>
  	<tr>
  		<th class="span1"> </th>
  		<th class="span1">ID</th>
  		<th>Title</th>
  		<th class="span4">Управление</th>
  	</tr>
  </thead>
  <tbody>
	@foreach($companies as $company)
	
    <tr>
    	<td><input type="checkbox" name="{{ $company->id }}" /></td>
    	<td>{{ $company->id }}</td>
    	<td>{{ $company->title }}</td>
    	<td><a class="btn btn-small btn-success" href="/home/company/{{ $company->id }}/edit"><i class="icon-pencil"></i> Редактировать </a>
    	 <a class="btn btn-small btn-danger remove_item" href="/home/company/{{ $company->id }}/delete"><i class="icon-trash"></i> Удалить</a> </td>
	</tr>

	@endforeach 


  </tbody>
</table>
@else
  <p>You have no companies. Would you like to <a href="/home/company/new">create one</a>?</p>
@endif 

@endsection