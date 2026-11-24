<x-mail::message>
# {{ __('Nuovo ordine #:reference', ['reference' => $order->reference]) }}

{{ __('Un nuovo ordine è stato appena effettuato su Rizzo Christian.') }}

<x-mail::panel>
**{{ __('Cliente:') }}** {{ $order->name }} ([{{ $order->email }}](mailto:{{ $order->email }}))  
**{{ __('Telefono:') }}** {{ $order->phone ?: '—' }}  
**{{ __('Pagamento:') }}** {{ $order->paymentLabel() }}  
**{{ __('Stato:') }}** {{ $order->statusLabel() }}  
**{{ __('Indirizzo di consegna:') }}** {{ $order->address }}@if($order->address_2), {{ $order->address_2 }}@endif, {{ $order->postal_code }} {{ $order->city }}@if($order->provinceName()), {{ $order->provinceName() }}@endif, {{ $order->countryName() }}
@if($order->notes)

**{{ __('Note:') }}** {{ $order->notes }}
@endif
</x-mail::panel>

## {{ __('Articoli') }}

<x-mail::table>
| {{ __('Prodotto') }} | {{ __('Quantità') }} | {{ __('Prezzo') }} |
| :------ | :---: | ----: |
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | {{ number_format((float) $item->unit_price, 2, ',', '.') }} € |
@endforeach
| **{{ __('Totale') }}** |  | **{{ number_format((float) $order->total, 2, ',', '.') }} €** |
</x-mail::table>

<x-mail::button :url="'mailto:'.$order->email" color="primary">
{{ __('Contatta il cliente') }}
</x-mail::button>

{{ __('Cordiali saluti,') }}<br>
{{ __('Sistema Rizzo Christian') }}
</x-mail::message>