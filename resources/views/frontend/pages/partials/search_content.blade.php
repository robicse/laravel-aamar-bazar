@if (count($products) > 0)
<div>
    <ul class="list-group">
        @foreach ($products as $key => $product)
        <li class="list-group-item">
            <a>{{$product->name}}</a>
        </li>
        @endforeach
    </ul>
</div>
@endif
