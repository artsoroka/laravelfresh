@extends('adminpages.template')

@section('content')


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
  	@foreach ($items as $item)

    <tr>
    	<td><input type="checkbox" name="{{ $item->id }}" /></td>
    	<td>{{ $item->id }}</td>
    	<td>{{ $item->title }}</td>
    	<td><a class="btn btn-small btn-success" href="/admin/item/{{ $item->id }}/edit"><i class="icon-pencil"></i> Редактировать </a>
    	 <a class="btn btn-small btn-danger" href="/admin/item/{{ $item->id }}/delete"><i class="icon-trash"></i> Удалить</a> </td>
	</tr>

	@endforeach
  </tbody>
</table>

@endsection
