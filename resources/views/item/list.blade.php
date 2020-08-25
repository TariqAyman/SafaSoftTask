<div class="row">
    @if($items->count())
        @foreach($items as $item)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="https://picsum.photos/seed/picsum/200/300" width="500" height="300">
                    <div class="caption">
                        <h4>{{ $item->name }}</h4>
                        <h6>{{ $item->description }}</h6>
                        <p><strong>Price: </strong> {{ $item->price }} $</p>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-xs-18 col-sm-6 col-md-3">
            <h2>
                Not Product Found
            </h2>
        </div>
    @endif
</div>
<div class="pagination">
    {{ $items->render() }}
</div>
