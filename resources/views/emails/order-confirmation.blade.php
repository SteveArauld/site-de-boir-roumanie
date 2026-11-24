<x-mail::message>
# {{ __('Grazie per il tuo ordine, :name!', ['name' => $order->first_name ?: $order->name]) }}

{{ __('Il tuo ordine **#:reference** è stato registrato con successo e verrà ora elaborato.', ['reference' => $order->reference]) }}

@if($order->isBankTransfer())
**{{ __('Bonifico anticipato') }}**

{{ \App\Support\SiteTexts::plain('bank.message_html') }}

@if(\App\Support\SiteTexts::hasBankDetails())
**{{ __('Nome:') }}** {{ \App\Support\SiteTexts::text('bank.holder') }}  
**IBAN:** {{ \App\Support\SiteTexts::text('bank.iban') }}  
**BIC:** {{ \App\Support\SiteTexts::text('bank.bic') }}  
**{{ __('Tipo di trasferimento:') }}** {{ \App\Support\SiteTexts::text('bank.transfer_type') }}
@endif
@endif

## {{ __('Riepilogo ordine') }}

<x-mail::table>
| {{ __('Prodotto') }} | {{ __('Quantità') }} | {{ __('Prezzo') }} |
| :------ | :---: | ----: |
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | {{ number_format((float) $item->unit_price, 2, ',', '.') }} € |
@endforeach
| **{{ __('Totale') }}** |  | **{{ number_format((float) $order->total, 2, ',', '.') }} €** |
</x-mail::table>

<x-mail::panel>
**{{ __('Indirizzo di consegna') }}**<br>
{{ $order->name }}<br>
{{ $order->address }}@if($order->address_2), {{ $order->address_2 }}@endif<br>
{{ $order->postal_code }} {{ $order->city }}@if($order->provinceName()), {{ $order->provinceName() }}@endif<br>
{{ $order->countryName() }}<br>
@if($order->phone)
{{ __('Tel.:') }} {{ $order->phone }}
@endif
</x-mail::panel>

<x-mail::button :url="route('tracking-order', ['order_id' => $order->reference, 'email' => $order->email])" color="primary">
{{ __('Traccia ordine') }}
</x-mail::button>

{{ __('Per domande sul tuo ordine scrivici in qualsiasi momento a :email.', ['email' => config('mail.admin_address')]) }}

{{ __('Cordiali saluti,') }}<br>
{{ __('Il team Rizzo Christian') }}
</x-mail::message>