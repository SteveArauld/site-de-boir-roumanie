<x-mail::message>
# {{ __('Nuova richiesta di contatto') }}

{{ __('Hai ricevuto un nuovo messaggio tramite il modulo di contatto su Rizzo Christian.') }}

<x-mail::panel>
**{{ __('Nome:') }}** {{ $contact['name'] }}  
**{{ __('E-mail:') }}** [{{ $contact['email'] }}](mailto:{{ $contact['email'] }})  
**{{ __('Oggetto:') }}** {{ filled($contact['subject'] ?? null) ? $contact['subject'] : '—' }}
</x-mail::panel>

## {{ __('Messaggio') }}

{{ $contact['message'] }}

<x-mail::button :url="'mailto:'.$contact['email']" color="primary">
{{ __('Rispondi') }}
</x-mail::button>

{{ __('Cordiali saluti,') }}<br>
{{ __('Sistema Rizzo Christian') }}
</x-mail::message>