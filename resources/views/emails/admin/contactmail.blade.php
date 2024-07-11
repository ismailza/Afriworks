<x-mail::message>
# Nouveau message reçu depuis le formulaire de contact

Bonjour,

Vous avez reçu un nouveau message depuis le formulaire de contact de votre site web.
Voici les détails du message :

- **Nom :** {{ $contact->name }}
- **Email :** {{ $contact->email }}
- **Sujet :** {{ $contact->subject }}
- **Message :**

    {{ $contact->message }}

Veuillez examiner ce message et y répondre dans les plus brefs délais.

Merci,
### {{ setting('site.title') }}
{{ config('app.url') }}
</x-mail::message>
