@component('mail::message')
# Kontakt Forma Poruka

Imate novu poruku sa контакт форме.

**Ime:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Poruka:**

{{ $data['message'] }}

@endcomponent
