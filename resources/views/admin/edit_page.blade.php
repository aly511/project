
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<table class="table table-responsive">
    <tr><th>id</th><th>name</th><th>image</th><th>price</th><th>quantity</th><th>edit</th> </tr>

        <form method="post" action="{{route('edit_prod',$prod->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>{{$prod->id}}</td>
                <td><input name="name" value="{{$prod->name}}" ></td>
                <td><img src="{{asset('images/'.$prod->image)}}" style="width:100px;height: 100px;border-radius: 12px;" /></td>
                <td><input name="price" value="{{$prod->price}}" ></td>
                <td><input name="quantity" value="{{ $prod->quantity}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>

                <input type="hidden" name="id" value="{{$prod->id}}" />
            </tr>
        </form>


</table>
