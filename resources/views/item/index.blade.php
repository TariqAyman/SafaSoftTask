@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <div class="container items">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-group">
            {{ csrf_field() }}
            <input type="text" name="item_name" id="item_name" class="form-control input-lg" placeholder="Enter Item Name" autocomplete="off"/>
            <div id="countryList">
            </div>
        </div>
        <div id="list">
            @include('item.list',$items)
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#item_name').keyup(function () {
                $('#list').html("<div class=\"loader\"></div>");
                var query = $(this).val();
                console.log(query)
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('items.search') }}",
                    method: "POST",
                    data: {query: query, _token: _token},
                    success: function (data) {
                        $('#list').html("");
                        $('#list').html(data);
                    }
                });
            });
        });
    </script>
@endsection
