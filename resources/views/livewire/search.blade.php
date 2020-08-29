<div class="container align-content-center">
    <div class="row">
        <div class="col-md-12">

            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />

            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                    <th>Name</th>
                    <th>categories</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr>

                        <td>
                            {{ $product['product_name_en'] ?? ''}}
                        </td>
                        <td>
                            {{ $product['categories'] }}
                        </td>
                        <td>
                            <a wire:click="updateDB({{ $product['_id'] }},'{{ $product['image_url'] ?? '' }}','{{ $product['product_name_en'] ??''}}','{{ $product['categories'] }}')" class="btn btn-info" >updateDB</a>
                        </td>
                    </tr>
                @endforeach
            </table>
{{--
            {{ $products->links() }}
--}}
        </div>
    </div>
</div>
