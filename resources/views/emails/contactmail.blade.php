<x-mail::message>
# Confirmation de réception de votre message

Bonjour {{ $contact->name }},

Nous avons bien reçu votre message et nous vous remercions de nous avoir contactés.
Voici un récapitulatif de votre demande :

- **Sujet :** {{ $contact->subject }}
- **Message :**

    {{ $contact->message }}


Notre équipe va examiner votre demande et vous répondra dans les plus brefs délais.

Merci encore de nous avoir contactés.

Cordialement,

### {{ setting('site.title') }}
w: {{ config('app.url') }} <br>
e: {{ setting('contact.email') }} <br>
p: {{ setting('contact.phone') }}
</x-mail::message>
