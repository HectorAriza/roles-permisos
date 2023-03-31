@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ _("Agregar nuevo Post") }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ utf8_encode("Atenci�n!") }}</strong> {{ __("Algo ha salido mal") }}.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>{{ utf8_encode(__("T�tulo")) }}:</strong>
		            <input type="text" name="titulo" class="form-control" placeholder="{{ utf8_encode("Digite el t�tulo del post") }}" value="">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>{{ utf8_encode(__("Descripci�n")) }}</strong>
		            <textarea class="form-control" style="height:150px; resize: none;" name="descripcion" placeholder="{{ __("Digite la descripci�n del post") }}"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">{{ __("Editar") }}</button>
		    </div>
		</div>

    </form>
@endsection