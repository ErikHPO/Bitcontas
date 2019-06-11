<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\User;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    }

    private function cotacao(){
        $url = 'https://api.bitvalor.com/v1/ticker.json';
        $json = json_decode(file_get_contents($url), true);
        $cotacao = $json['ticker_24h']['total']['last'];
        return $cotacao;

    }
    public function index()
    {

        return view('bills.create',  ['cotacao' => $this->cotacao()]); 
           }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          return view('bills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
            // dd($this->cotacao());
            request()->validate([
                'barcode' => ['required','numeric','min:45'],
                'expiredate' => ['required','date','after_or_equal:today'],
                'brlamount' => ['required']

            ]);
            
            $bill= Bills::create(request(['barcode',
                'expiredate',
                'bank',
                'brlamount'
              
            ]) +['cryptorate' => $this->cotacao() ]+['owner_id' => auth()->id()] );


/*            $bill = new Bills([
            'barcode' => $request->get('barcode'),
            'expiredate' => $request->get('expiredate'),
            'bank' => $request->get('bank'),
             'brlamount' => $request->get('brlamount'),
             'cryptorate' => $request->get('cryptorate'),
             

        ]);   
            
            $bill->save();*/
             //dd($bill);
            return redirect()->action('PaymentsController@index', [$bill]
);
             // return redirect()->route('payments', [$bill]);
          //  return view('payments.index')->with('bill', $bill);
        // return redirect('/home')->with('success', 'Novo boleto registrado!');
          
         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Bills $bill)
    // {
    //    //  $bill = Bills::all();
    //    // // dd($bill);
    //    //  return view('bills.show', compact('bill'));
    //     return redirect('/');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bills $bill)
    {
        abort_unless(auth()->user()->belongsTo($bill, 'owner_id'), 505);
        if ($bill->owner_id !== auth()->id() ){
            abort(403);
        }
                // $bill = Bills::findOrFail($id);
        return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
        public function update(Bills $bill)
    {
         if ($bill->owner_id !== auth()->id() ){
            abort(403);
        }

        $bill->update(request()->validate([
            'barcode' => ['required','numeric','min:45'],
            'expiredate' => ['required','date'],
            'bank',
            'brlamount' => ['required','numeric']
        ]));
   // $bill = Bills::findOrFail($id);
   //      $bill->barcode =  $request->get('barcode');
   //      $bill->expiredate = $request->get('expiredate');
   //      $bill->bank = $request->get('bank');
   //      $bill->brlamount = $request->get('brlamount');
   //      $bill->save();

        return redirect('/home')->with('success', 'Seu boleto foi modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bills $bill)
    {
          // $bill = Bills::findorFail($id);
         if ($bill->owner_id !== auth()->id() ){
            abort(403);
        }
        $bill->delete();

        return redirect('/home')->with('success', 'Seu boleto foi removido.');    }
}
