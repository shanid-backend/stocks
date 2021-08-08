<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;

class StockController extends Controller
{
    public function home(Request $request)
    {
        return view('stocks');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        
        if($request->ajax() && isset($search))
        {
            $stocks = Stocks::where('Name', 'LIKE', '%%'.$search.'%%')
                                    ->limit(6)
                                    ->get();
            $output = '';
            
            if(!$stocks->isEmpty())
            {   
                foreach($stocks as $row)
                {
                    $output .= '<a href="#" data-id='.$row->id.'  <li class="list-group-item link-class">'.$row->Name.'</li></a>
                    ';
                }
            }
            else
            {
                $output .= '';
            }

            echo $output;
        }
    }

    public function items(Request $request)
    {
        $item_id = $request->item;
        
        if($request->ajax())
        {
            $item = Stocks::where('id', $item_id)->first();
            
            if($item !=null)
            {   
                $output='<div class="container px-4 py-5" id="featured-3">
                <h2 class="pb-2 border-bottom">'.$item->Name.'<h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Market Cap</h5>
                    </div>
                    <h4> ₹ '.$item->Market_Cap.'<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Dividend Yield</h5>
                    </div>
                    <h4>'.$item->Dividend_Yield.'%<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Debt to Equity</h5>
                    </div>
                    <h4>'.$item->Debt_to_Equity.'%<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Current Market Price</h5>
                    </div>
                    <h4> ₹ '.$item->Current_Market_Price.'<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>ROCE</h5>
                    </div>
                    <h4>'.$item->ROCE_.'%<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Eps</h5>
                    </div>
                    <h4> ₹ '.$item->EPS.'<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Stock PE</h5>
                    </div>
                    <h4>'.$item->Stock_PE.'%<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>ROE Previous Annum</h5>
                    </div>
                    <h4>'.$item->ROE_Previous_Annum.'%<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Reserves</h5>
                    </div>
                    <h4> ₹ '.$item->Reserves.'<h4>
                  </div>
                  <div class="feature col">
                    <div class="feature-icon bg-gradient">
                      <h5>Debt</h5>
                    </div>
                    <h4> ₹ '.$item->Debt.'<h4>
                  </div>
                </div>
              </div>';
            }
            else
            {
                $output .= '';
            }

            echo $output;
        }
    }
}
