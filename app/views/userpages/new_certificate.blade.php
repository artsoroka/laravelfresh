@extends('userpages.template')

@section('content')



 
<h2>Добавить новый сертификат </h2>
      
      <form class="form-horizontal" action="/home/certificate/new" method="POST" enctype="multipart/form-data">
    <fieldset>
        <!-- Address form -->

        <!-- full-name input-->
        <div class="control-group">
            <label class="control-label">Ниаменование: </label>
            <div class="controls">
                <input id="full-name" name="certificate_title" type="text" placeholder="Короткое, но ёмкое "
                class="input-xlarge">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Описание: </label>
            <div class="controls">
                <textarea id="address-line1" rows="4" name="certificate_description" type="text" placeholder="Пару строк о вашем уникальном предложении "
                class="input-xlarge"></textarea>
                <p class="help-block">Пара строк о дейтельности компании </p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Компания: </label>
            <div class="controls">
                @if( count ($companies) > 0 )
                    <select name="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->title }}</option>
                        @endforeach
                    </select>
                    @else 
                        You don't have any company yet. Would you like to <a href="/home/company/new">create</a> one?
                    @endif
                <p class="help-block">Выберите компанию, от лица которой будет представлен данный сертификат  </p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Описание: </label>
            <div class="controls">
                <input type="file" name="file" />
                <p class="help-block">Выберите иллюстрацию для сертификата </p>
            </div>
        </div>
    </fieldset>

    <input type="submit" class="btn btn-success" value="Создать">

</form>

@endsection