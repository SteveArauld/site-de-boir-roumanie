@php
	$catalog = app(\App\Support\MerchantCatalog::class);
	$returns = $catalog->returns();
@endphp
<p class="ph-purchase-terms">
	{{ $catalog->purchaseTermsHtml() }}
	<a href="{{ url('/spedizione-e-consegna') }}">{{ __('Spedizione e consegna') }}</a>
	·
	<a href="{{ url('/resi-e-rimborsi') }}">{{ __('Reso entro :days giorni', ['days' => $returns['days']]) }}</a>
	·
	<a href="{{ url('/metodi-di-pagamento') }}">{{ __('Pagamento tramite bonifico anticipato') }}</a>
</p>