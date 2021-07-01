<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\CrudInterface;
use App\Http\Requests\cardRequest;
use App\Http\Resources\productResource;
use App\Models\currency;
use App\Models\Product;
use Illuminate\Http\Request;

class CardRepository implements CrudInterface
{




    public function store(Request $request)
        {

            $currency_symbol='$';

            if(!empty($request->currency_name)){

$request->currency_name=strtoupper($request->currency_name);
                $currency=currency::where('currency_name',$request->currency_name)->select('currency_value','currency_symbol')->get();



                if(count($currency))
                {
                     $value_cuurency = $currency[0]->currency_value;
                    $currency_symbol=$currency[0]->currency_symbol;
                }
                else{
                    return response([
                        "message" => "The given data was invalid.",
                        "errors" => [
                            'currency' => ["currency is invalid."]

                        ],
                    ],201);

                  }


            }else{
                $value_cuurency=1;
            }












            // if(in_array("jacket", $request->product_name)){
            $jack=0;
            $tshirt=0;
            $panets=0;
            $shoes=0;
            $jacket_price=0;
            $tshirt_price=0;
            $panets_price=0;
            $shoes_price=0;
            if(!is_array($request->product_name)){

                echo 'enter products name via array of string '; die;
            }
            foreach ($request->product_name as $v){
 $v=strtolower($v);
               $is_product=  Product::where('product_name',$v)->get();
               if(!count($is_product)){
                echo 'product '.$v.' is not exist in database'; die;

               }
            }
            foreach ($request->product_name as $v){





                if($v=='Jacket'){
                    $jacket_price=Product::where('product_name','jacket')->select('price')->get();
                    $jacket_price=    $jacket_price[0]->price;
                    $jack++;
                }
                if($v=='T-shirt'){
                    $tshirt_price=Product::where('product_name','t-shirt')->select('price')->get();
                    $tshirt_price=    $tshirt_price[0]->price;
                    $tshirt++;
                }
                if($v=='Pants'){
                    $panets_price=Product::where('product_name','panets')->select('price')->get();
                    $panets_price=    $panets_price[0]->price;
                    $panets++;
                }
                if($v=='Shoes'){
                    $shoes_price=Product::where('product_name','shoes')->select('price')->get();
                    $shoes_price=    $shoes_price[0]->price;
                    $shoes++;
                }


            }
            $discount_jacket=0;
            if( $tshirt!=0) {



                $discoutn_j = ($tshirt / 4);

                if ($jack < $discoutn_j) {
                    $discount_jacket = $jacket_price;
                } else {

                    $discount_jacket = $discoutn_j * $jacket_price;
                }
            }
//$price_jacket=($jack-($tshirt/4) )*$jacket_price;
            if($shoes!=0){
                $discount_shoes=($shoes_price*10)/100;
            }


            $subtotal=(($jack*$jacket_price)+($tshirt*$tshirt_price)
                +($panets*$panets_price)+($shoes*$shoes_price));
            $taxas=(14*$subtotal)/100;

            echo 'subtotal ='. $currency_symbol.' '.$subtotal*$value_cuurency;
            echo "\r\n";

            echo 'tax= '. $currency_symbol.' '.round($taxas, 2)*$value_cuurency;

        echo "\r\n";
        $shoes_offer=0;
        if($shoes!=0){
            $shoes_offer=$discount_shoes*$value_cuurency;
            echo ' 10% off shoes  :'.'-'. $currency_symbol.' '.$shoes_offer;
        }
            echo "\r\n";
        $tshirt_offer=0;
            if($jack !=0){
                if($tshirt!=0){
                   $tshirt_offer= $discount_jacket*$value_cuurency;

                    echo '50% off jacket :'.'-'. $currency_symbol.'  '.  $tshirt_offer;


                }

            }

        echo "\r\n";
$total=$subtotal+$taxas-($tshirt_offer+$shoes_offer);
            echo 'total : '.$currency_symbol.' '.$total;



        }


    public function index()
    {
        // TODO: Implement index() method.
    }
}
