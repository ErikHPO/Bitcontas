@extends('layouts.navbar')

<div class="visible-print text-center">
	{!! QrCode::size(300)->BTC($bill->cryptoaddress, number_format($bill->brlamount/$bill->cryptorate, 8, '.', '')  ); !!}
	<p>Endereço:{{ $bill->cryptoaddress }}</p>
	<p>Valor total: R${{$bill->brlamount}}</p>
	<p>Cotação: R${{ $bill->cryptorate }}</p>
</div>
