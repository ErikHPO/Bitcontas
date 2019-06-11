@extends('layouts.layout')
@extends('layouts.navbar')


@section('content')

	<div class="container-fluid row justify-content-center">
	<div class="col-md-8">
	<div class="card">
		<div class="card-header">Editar Perfil</div>
	<div class="card-body">
	<form method="POST" action="{{route('users.update', $user)}}">
    @csrf
    @method('PATCH')
    
  	<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
     </div>
 	  <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-2">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ $user->cpf }}" required autofocus>

                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <label for="birthdate" class="col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>

                            <div class="col-md-2">
                                <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ $user->birthdate }}" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
               
    </div>
    <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Anexar Documento') }}</label>

                            <div class="col-md-4">
                                <input id="document" type="file" class="form-control-file" name="document" value="" required autofocus>
                            <p class="help-block">
                        Enviar documento com foto e totalmente legível.
                            </p>

                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif

                    

                            </div>
               
    </div>
           
   

      <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-success">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
</form>		
	</div>
	
	</div>	
	</div>	
	</div>
	
	
	
@endsection