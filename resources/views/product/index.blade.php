<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body class="antialiased">
   <div style="display: flex; gap: 2rem">
       @foreach($products as $product)
           <div class="flex: 1">
               <img src="{{ $product->image }}" style="max-width: 100%">
               <h5>{{ $product->name }}</h5>
               <p>${{ $product->price }}</p>
           </div>
       @endforeach
   </div>
   <form action="{{route('checkout')}}" method="post">
       @csrf
       <button type="submit">Checkout</button>
   </form>
</body>
</html>
