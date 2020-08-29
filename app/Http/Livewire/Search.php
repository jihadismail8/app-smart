<?php

namespace App\Http\Livewire;

use App\Product;
use App\User;
use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\WithPagination;


class Search extends Component
{
    use WithPagination;
    public $searchTerm;
    public $products;

    public function mount(){
        $this->ShowAllProcuts();
    }

    public function updateDB($id,$image_url,$name,$category){
        $product = Product::firstOrNew(array('id' => $id));
        $product->image_url=$image_url;
        $product->name=$name;
        $product->category=$category;
        $product->save();
    }


    public function ShowAllProcuts(){
        $client = new Client(); //GuzzleHttp\Client
        $request = $client->get('http://world.openfoodfacts.org/cgi/search.pl?action=process&sort_by=unique_scans_n&page_size=20&json=1');
        $get_body = $request->getBody()->getContents();
        $content = json_decode($get_body, true);
        $this->products=$content['products'];
    }


    public function render()
    {
        if (!empty($this->searchTerm)){
            $searchTerm = $this->searchTerm;
            $found=collect($this->products)->where('product_name_en',$searchTerm)->all();
            //dd($found);
            if (!empty($found)){
                //dd('asda');
                $this->products=$found;
            }else{
                $this->ShowAllProcuts();

            }
        }
        return view('livewire.search');
    }
}
