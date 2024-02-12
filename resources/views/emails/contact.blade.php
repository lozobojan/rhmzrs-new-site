@component('mail::message')
    # Kontakt Forma Poruka

    Imate novu poruku sa kontakt forme.

    **Ime:** {{ $data['name'] }}

    **Email:** {{ $data['email'] }}

    **Poruka:**

    {{ $data['message'] }}

@endcomponent
