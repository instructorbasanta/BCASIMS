<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Tag;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use net\authorize\api\controller as AnetController;
use net\authorize\api\contract\v1 as AnetAPI;
class HomeController extends Controller
{
    function index(){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['hot_sale_tag'] = Tag::where('name','Product on Hot Sale')->first();

        return view('frontend.home',compact('data'));
    }

    function hotProduct (){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['hot_sale_tag'] = Tag::where('name','Product on Hot Sale')->first();

        return view('frontend.hot_product',compact('data'));
    }

    function category ($slug){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['category'] = Category::where('slug',$slug)->first();

        return view('frontend.category',compact('data'));
    }

    function product ($slug){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['product'] = Product::where('slug',$slug)->first();

        return view('frontend.product',compact('data'));
    }

    function  customerDashboard(){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();

        return view('frontend.customer.dashboard',compact('data'));
    }

    function  customerProfile(){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['user'] = Auth::guard('customer')->user();

        return view('frontend.customer.profile',compact('data'));
    }

    function  addToCart(Request $request){
        Cart::add(['id' => $request->input('id'), 'name' => $request->input('name'), 'qty' => $request->input('qty'), 'price' => $request->input('price')]);
        $request->session()->flash('success','Item added into cart');
        return redirect()->route('frontend.product',Product::find($request->input('id'))->slug);
    }

    function  listCart(Request $request){
        $data['carts'] = Cart::content();
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();

        return view('frontend.cart',compact('data'));
    }

    function  updateCart(Request $request,$rowId){
        Cart::update($rowId,$request->input('qty'));
        $request->session()->flash('success','Item Update into cart');
        return redirect()->route('frontend.cart.list');
    }

    function  checkout(){
        if (Cart::total() == 0){
            request()->session()->flash('success','Cart is Empty');
            return  redirect()->route('frontend.cart.list');
        }
        $data['carts'] = Cart::content();
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $data['user'] = Auth::guard('customer')->user();

        return view('frontend.checkout',compact('data'));
    }

    function  order(Request $request){

        $response =  $this->processPayment($request->input('card'),$request->input('expire_date'),$request->input('cvv'),Cart::total());
        if (is_array($response)){
            $request->request->add(['payment_key' => $response['key']]);
        }
        $request->request->add(['order_date' => date('Y-m-d H:i:s')]);
        $request->request->add(['delivery_date' => date('Y-m-d H:i:s',strtotime('+3 days'))]);
        $request->request->add(['order_code' => uniqid()]);
        $request->request->add(['amount' => Cart::total()]);

        $order = Order::create($request->all());
        if ($order){
            $detail_data['order_id'] =  $order->id;
            foreach (Cart::content() as $item){
                $detail_data['product_id'] =  $item->id;
                $detail_data['price'] =  $item->price;
                $detail_data['quantity'] =  $item->qty;
                OrderDetail::create($detail_data);
                Cart::remove($item->rowId);
            }
        }
        return redirect()->route('frontend.home');
    }

    public function processPayment($cardNumber,$expirationDate,$cvv,$amount)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('AUTHORIZENET_API_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('AUTHORIZENET_TRANSACTION_KEY'));

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($expirationDate);
        $creditCard->setCardCode($cvv);

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($payment);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId("ref" . time());
        $request->setTransactionRequest($transactionRequestType);

        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        if ($response != null) {
            $tresponse = $response->getTransactionResponse();
            if ($tresponse != null && $tresponse->getResponseCode() == "1") {
                return ['key' => $tresponse->getTransId(),'type' => 'ok'];
            } else {
                return "Payment failed: " . $tresponse->getResponseReasonText();
            }
        } else {
            return "Payment failed: " . $response->getMessages()->getMessage()[0]->getText();
        }
    }

    function recommendProduct (){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        $cust_id = Auth::guard('customer')->user()->id;
        $customers = Customer::all();
        $ratingData = [];
        foreach ($customers as $customer){
           $rdata = [];
            foreach ($customer->ratings as $rating){
                $rdata[$rating->product_id] = $rating->rating;
            }
            if (count($rdata) > 0){
                $ratingData[$customer->id] = $rdata;
            }
        }
        $recommended_items = $this->getRecommendations($ratingData, $cust_id);
        return view('frontend.recommend',compact('recommended_items','data'));
    }

    public function similarityDistance($preferences, $person1, $person2)
    {
        $similar = array();
        $sum = 0;

        foreach($preferences[$person1] as $key=>$value)
        {
            if(array_key_exists($key, $preferences[$person2]))
                $similar[$key] = 1;
        }

        if(count($similar) == 0)
            return 0;

        foreach($preferences[$person1] as $key=>$value)
        {
            if(array_key_exists($key, $preferences[$person2]))
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
        }

        return  1/(1 + sqrt($sum));
    }


    public function matchItems($preferences, $person)
    {
        $score = array();

        foreach($preferences as $otherPerson=>$values)
        {
            if($otherPerson !== $person)
            {
                $sim = $this->similarityDistance($preferences, $person, $otherPerson);

                if($sim > 0)
                    $score[$otherPerson] = $sim;
            }
        }

        array_multisort($score, SORT_DESC);
        return $score;

    }


    public function transformPreferences($preferences)
    {
        $result = array();

        foreach($preferences as $otherPerson => $values)
        {
            foreach($values as $key => $value)
            {
                $result[$key][$otherPerson] = $value;
            }
        }

        return $result;
    }


    public function getRecommendations($preferences, $person)
    {

        $total = array();
        $simSums = array();
        $ranks = array();
        $sim = 0;

        foreach($preferences as $otherPerson=>$values)
        {

            if($otherPerson != $person)
            {
                $sim = $this->similarityDistance($preferences, $person, $otherPerson);
            }

            if($sim > 0)
            {
                foreach($preferences[$otherPerson] as $key=>$value)
                {
                    if(!array_key_exists($key, $preferences[$person]))
                    {

                        if(!array_key_exists($key, $total)) {
                            $total[$key] = 0;
                        }
                        $total[$key] += $preferences[$otherPerson][$key] * $sim;

                        if(!array_key_exists($key, $simSums)) {
                            $simSums[$key] = 0;
                        }
                        $simSums[$key] += $sim;
                    }
                }

            }
        }


        foreach($total as $key=>$value)
        {
            $ranks[$key] = $value / $simSums[$key];
        }
//        array_multisort($ranks, SORT_DESC);
        return $ranks;

    }
}
