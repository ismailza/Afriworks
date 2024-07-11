<x-mail::message>
# Confirmation de réception de votre demande de service

Bonjour {{ $serviceRequest->name }},

Nous avons bien reçu votre demande de service pour {{ $service->name }} et nous vous remercions de nous avoir contactés.
Voici un récapitulatif de votre demande :

- **Nom :** {{ $serviceRequest->name }}
- **Email :** {{ $serviceRequest->email }}
- **Service demandé :** [{{ $service->name }}]({{ route('services.show', $service->slug) }})
- **Date souhaitée :** {{ $serviceRequest->date }}
- **Description :**

    {{ $serviceRequest->description }}

Notre équipe va examiner votre demande et vous répondra dans les plus brefs délais.

Merci encore de nous avoir contactés.

Cordialement,

### {{ setting('site.title') }}
w: {{ config('app.url') }} <br>
e: {{ setting('contact.email') }} <br>
p: {{ setting('contact.phone') }}
</x-mail::message>
