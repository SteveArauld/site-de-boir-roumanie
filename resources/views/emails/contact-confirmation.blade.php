<x-mail::message>
# {{ __('Grazie, :name!', ['name' => $contact['name']]) }}

{{ __('abbiamo ricevuto il tuo messaggio e ti risponderemo il prima possibile.') }}

<x-mail::panel>
**{{ __('I tuoi dati') }}**  
**{{ __('E-mail:') }}** {{ $contact['email'] }}  
**{{ __('Oggetto:') }}** {{ filled($contact['subject'] ?? null) ? $contact['subject'] : '—' }}
</x-mail::panel>

## {{ __('Il tuo messaggio') }}

{{ $contact['message'] }}

{{ __('Per questioni urgenti puoi scriverci a :email.', ['email' => config('mail.admin_address')]) }}

<x-mail::button :url="route('shop')" color="primary">
{{ __('Vai al negozio') }}
</x-mail::button>

{{ __('Cordiali saluti,') }}<br>
{{ __('Il team Rizzo Christian') }}
</x-mail::message>