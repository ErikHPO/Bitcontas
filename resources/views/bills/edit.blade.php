<!-- EDITA BOLETO -->
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar boleto</div>
                                <div class="card-body">
                    <form method="POST" action="{{ route('bills.update' , $bill->id) }}">
            @method('PATCH') 
            @csrf

                        <div class="form-group row">
                            <label for="barcode" class="col-md-4 col-form-label text-md-right">{{ __('Linha digitável') }}</label>

                            <div class="col-md-6">
                                <input id="barcode" type="text" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}" name="barcode" value="{{ $bill->barcode }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expiredate" class="col-md-4 col-form-label text-md-right">{{ __('Data de vencimento') }}</label>
                            <div class="col-md-4">
                                <input id="expiredate" type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="expiredate" value="{{ $bill->expiredate }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                        </div>
                    </div>


                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Banco Emissor') }}</label>

                            <div class="col-md-4">
                                <input id="bank" type="text" class="form-control" name="bank" value="{{ $bill->bank }}" required>
                            </div>
                        </div>
                             <div class="form-group row">
                            <label for="brlamount" class="col-md-4 col-form-label text-md-right">{{ __('Valor do boleto (R$)') }}</label>

                            <div class="col-md-2">
                                <input id="brlamount" type="text" class="form-control" name="brlamount" value="{{ $bill->brlamount }}" required>
                            </div>
                                <label for="cryptorate" class="col-md-2 col-form-label text-md-right">{{ __('Cotação BTC') }}
                                </label>

                            <div class="col-md-2">
                                <input readonly id="cryptorate" type="readonly" class="form-control" name="cryptorate" value="{{$bill->cryptorate}}">
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
    </div>

@endsection