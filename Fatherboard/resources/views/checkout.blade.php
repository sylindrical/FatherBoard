<x-layout>
    <x-slot:title>
        Checkout
    </x-slot:title>
    <x-slot:sheet>
        products
    </x-slot:sheet>
    <h2>Checkout</h2>

<br>
    <div>
        <h3>Items in basket</h3>
        @foreach ($basket as $item)
            <div>
                <p>{{ $item['name'] }} ({{ $item['quantity'] }})</p>
            </div>
        @endforeach
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="total_amount" value="{{ $total }}"> --}}
            <button type="submit">Proceed</button>
        </form>
    </div>
</x-layout>