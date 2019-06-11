@extends('layouts.navbar')
@extends('layouts.layout')


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meu Dashboard</div>

                <div class="card-body" style="margin-left: -15px;">
                <table class="table">
  <thead class="thead thead-light">
    <tr class="centralizar">

                <th>#</th>
          <th scope="col">Código de Barras</th>
          <th scope="col">Valor(R$)</th>
          <th scope="col">Status</th>
          <!-- <th scope="col">Data de Pagamento</th> -->
          <th scope="col">Data de vencimento</th>
          
          <th colspan = 2>Actions</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($bill as $bill)
    <tr>
      <th scope="row">{{$bill->id}}</th>
      <td class="barcode"><a href="" data-toggle="modal" data-target="#showBill{{$bill->id}}" title="Mais informações">{{$bill->barcode}}</a>
  <div class="modal fade" id="showBill{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="">Mais informações</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
         <div class="row">
                <div class="col-md-8">
            Código de Barras
        </div>
        <div class="col-md-8">
            {{$bill->barcode}}
        </div>          
      </div>
          <div class="flex-row">
              <div class="col-md-4">
            Data de Vencimento
        </div>
            <div>
                {{ $bill->expiredate }}
            </div>
        <div class="col-md-4">
            Data de Pagamento
        </div>
        <div>
            {{ $bill->paydate}}    
        </div>
          </div>
           <div class=" col-md-12 flex-row">
              <div class="col-md-8">
            Total R$
        </div>
            <div>
                {{ $bill->brlamount }}
            </div>
        <div class="col-md-8">
            Cotação
        </div>
        <div>
            {{ $bill->cryptorate}}    
        </div>
          </div>
            
            <div>
                Banco
                 <div>
              
          </div>
             {{$bill->bank}}   
            </div>
                        <div>
                Status
                 <div>
              
          </div>
             {{$bill->status}}   
            </div>
         

        </div>

         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>
      </td>
      <td class="brlamount"> R${{ money_format('%n', $bill->brlamount ) }}</td>
      <td class="centralizar">
    @if ($bill->status == 0)
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Pendente de pagamento"><i class="fas fa-minus-circle pendente"  ></i></a>
                      
    @elseif ($bill->status == 1)
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Seu pagamento foi recebido e esta sendo processado"><i class="fas fa-money-bill-wave processando"></i></a>
                    
    @elseif ($bill->status == 2)
     <a href="#" data-toggle="tooltip" data-placement="top" title="Seu boleto foi pago"><i class="fas fa-star aprovado"></i></a>
                  
                    
    @else
                    <i class="fas fa-times-circle"></i>
    @endif</td>
      <td class="centralizar">{{$bill->expiredate}}</td>
     
        
            <td>
             <form action="{{ route('bills.destroy', $bill->id)}}" method="post">
                  @csrf
                  @method('DELETE')
        <button class="btn btn-danger " type="action"><i class="far fa-trash-alt"></i></button>
            </form>
        </td>


        <td>
            <form action="{{ route('bills.edit', $bill->id)}}">
                <button class="btn btn-warning " type="action"><i class="far fa-edit"></i></button>
            </form>
            
        </td>

 <!--                <td>
            <form>
                <button class="btn btn-success " type="action"><i class="fab fa-btc"></i></button>
            </form>
            
        </td> -->

      
    </tr>

    @endforeach

  </tbody>
</table>




                  <!--   @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}



                        </div>
                    @endif
 -->
                 
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
