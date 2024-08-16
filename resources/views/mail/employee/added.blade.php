<x-mail::message>
# New Employee Successfully Added

    Employee Name: {{ $name }}

    Employee Email: {{ $email }}

    Company Name: {{ $company }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
