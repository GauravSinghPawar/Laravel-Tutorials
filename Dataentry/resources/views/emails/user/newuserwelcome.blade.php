@component('mail::message')
# Welcome to the DataEntry App

Thanks for supporting us. **We really appriciate.** *Let us know what we can do* more to _please you_.

@component('mail::button', ['url' => 'http://localhost:8000/home'])
View my Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
