@component('mail::message')
# Welcome to TriniGram

thanks for registering with us we will get in touch with you soon,Stay safe.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponen --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
