<!-- Created using command php artisan make:mail --markdown=emails.post -->
<x-mail::message>
# Thank you for the post {{ $data['name'] }}

Your post title is {{ $data['title'] }}

Thanks, Laravel Test
</x-mail::message>
