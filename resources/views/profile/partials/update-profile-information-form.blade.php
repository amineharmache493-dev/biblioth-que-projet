<section>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-lg-5">

            {{-- Header --}}
            <div class="mb-4">

                <div class="d-flex align-items-center gap-3 mb-2">

                    <div class="fs-2">
                        👤
                    </div>

                    <div>

                        <h4 class="fw-bold mb-1">
                            Profile Information
                        </h4>

                        <p class="text-muted mb-0">
                            Modifiez les informations de votre compte.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Verification form --}}
            <form id="send-verification"
                  method="post"
                  action="{{ route('verification.send') }}">

                @csrf

            </form>


            {{-- Profile form --}}
            <form method="post"
                  action="{{ route('profile.update') }}">

                @csrf
                @method('patch')


                {{-- Name --}}
                <div class="mb-4">

                    <label for="name"
                           class="form-label fw-semibold">

                        Nom

                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control form-control-lg"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Votre nom"
                    >

                    @if ($errors->get('name'))

                        <div class="text-danger small mt-2">

                            @foreach ($errors->get('name') as $message)

                                <div>{{ $message }}</div>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- Email --}}
                <div class="mb-4">

                    <label for="email"
                           class="form-label fw-semibold">

                        Email

                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-control form-control-lg"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="username"
                        placeholder="Votre adresse email"
                    >

                    @if ($errors->get('email'))

                        <div class="text-danger small mt-2">

                            @foreach ($errors->get('email') as $message)

                                <div>{{ $message }}</div>

                            @endforeach

                        </div>

                    @endif


                    {{-- Email verification --}}
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                        <div class="alert alert-warning mt-3">

                            <div class="mb-2">

                                ⚠️ Votre adresse email n'est pas encore vérifiée.

                            </div>

                            <button
                                form="send-verification"
                                type="submit"
                                class="btn btn-sm btn-outline-warning">

                                Renvoyer l'email de vérification

                            </button>

                        </div>


                        @if (session('status') === 'verification-link-sent')

                            <div class="alert alert-success">

                                ✓ Un nouveau lien de vérification a été envoyé à votre adresse email.

                            </div>

                        @endif

                    @endif

                </div>


                {{-- Save --}}
                <div class="d-flex align-items-center gap-3">

                    <button type="submit"
                            class="btn btn-primary px-4">

                        💾 Enregistrer

                    </button>


                    @if (session('status') === 'profile-updated')

                        <span class="text-success fw-semibold">

                            ✓ Profil mis à jour

                        </span>

                    @endif

                </div>

            </form>

        </div>

    </div>

</section>