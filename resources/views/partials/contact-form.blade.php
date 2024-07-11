<form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nom" required>
                <div class="invalid-feedback">
                    Veuillez saisir votre nom.
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="input-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                <div class="invalid-feedback">
                    Veuillez saisir une adresse email valide.
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="input-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
                <div class="invalid-feedback">
                    Veuillez saisir un sujet.
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="input-group">
                <textarea rows="4" class="form-control" name="message" id="message" placeholder="Message..." required></textarea>
                <div class="invalid-feedback">
                    Veuillez saisir un message.
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="submit-btn uppercase">Envoyer Message</button>
        </div>
    </div>
</form>
