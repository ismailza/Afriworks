<x-mail::message>
# Nouvelle demande de service reçue

Bonjour,

Vous avez reçu une nouvelle demande de service depuis votre site web. Voici les détails de la demande :

- **Nom :** {{ $serviceRequest->name }}
- **Email :** {{ $serviceRequest->email }}
- **Service demandé :** [{{ $service->name }}]({{ route('services.show', $service->slug) }})
- **Date souhaitée :** {{ $serviceRequest->date }}
- **Description :**

    {{ $serviceRequest->description }}

Veuillez examiner cette demande et y répondre dans les plus brefs délais.

Merci,
### {{ setting('site.title') }}
{{ config('app.url') }}
</x-mail::message>
