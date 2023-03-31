@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>POST</h2>
            </div>
            <div class="pull-right">
                @can('post-create')
                <a class="btn btn-success" href="{{ route('posts.create') }}"> {{ __("Crear un nuevo post") }}</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>{{ utf8_encode(__("T�tulo")) }}</th>
            <th>{{ utf8_encode(__("Descripci�n")) }}</th>
            <th width="280px">{{ __("Acciones") }}</th>
        </tr>
	    @foreach ($posts as $post)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $post->title }}</td>
	        <td>{{ $post->description }}</td>
	        <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">{{ ("Ver") }}</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">{{ __("Editar") }}</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('post-delete')
                    <button type="submit" class="btn btn-danger">{{ __("Eliminar") }}</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $posts->links() !!}

@endsection