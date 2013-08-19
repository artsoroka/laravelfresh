@extends('userpages.template')

@section('content')



 
<h2>Редактировать анкету компании </h2>
      
    <form class="form-horizontal" action="/home/company/{{ $company->id }}/edit" method="POST" enctype="multipart/form-data">
    <fieldset>
        <!-- Address form -->

        <!-- full-name input-->
        <div class="control-group">
            <label class="control-label">Название организации:</label>
            <div class="controls">
                <input id="full-name" name="company_title" type="text" placeholder="Название огранизации"
                class="input-xlarge" value="{{ $company->title }}">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Описание: </label>
            <div class="controls">
                <textarea id="address-line1" rows="4" name="company_description" type="text" placeholder="Пару слов о вашей компании "
                class="input-xlarge">{{ $company->description }}</textarea>
                <p class="help-block">Пара строк о дейтельности компании </p>
            </div>
        </div>

    </fieldset>

    <input type="submit" class="btn btn-success" value="Редактировать">

    <a href="/home/company" class="btn btn-danger">Отмена</a>
</form>

@endsection