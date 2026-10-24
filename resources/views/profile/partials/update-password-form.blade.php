<section>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-lg-5">

            {{-- Header --}}
            <div class="mb-4">

                <div class="d-flex align-items-center gap-3 mb-2">

                    <div class="fs-2">
                        🔐
                    </div>

                    <div>
                        <h4 class="fw-bold mb-1">
                            Update Password
                        </h4>

                        <p class="text-muted mb-0">
                            Changez votre mot de passe pour sécuriser votre compte.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form method="post"
                  action="{{ route('password.update') }}">

                @csrf
                @method('put')


                {{-- Current Password --}}
                <div class="mb-4">

                    <label for="update_password_current_password"
                           class="form-label fw-semibold">

                        Current Password

                    </label>

                    <input
                        id="update_password_current_password"
                        name="current_password"
                        type="password"
                        class="form-control form-control-lg"
                        autocomplete="current-password"
                        placeholder="Votre mot de passe actuel"
                    >

                    @if ($errors->updatePassword->get('current_password'))

                        <div class="text-danger small mt-2">

                            @foreach ($errors->updatePassword->get('current_password') as $message)

                                <div>{{ $message }}</div>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- New Password --}}
                <div class="mb-4">

                    <label for="update_password_password"
                           class="form-label fw-semibold">

                        New Password

                    </label>

                    <input
                        id="update_password_password"
                        name="password"
                        type="password"
                        class="form-control form-control-lg"
                        autocomplete="new-password"
                        placeholder="Votre nouveau mot de passe"
                    >

                    @if ($errors->updatePassword->get('password'))

                        <div class="text-danger small mt-2">

                            @foreach ($errors->updatePassword->get('password') as $message)

                                <div>{{ $message }}</div>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- Confirm Password --}}
                <div class="mb-4">

                    <label for="update_password_password_confirmation"
                           class="form-label fw-semibold">

                        Confirm Password

                    </label>

                    <input
                        id="update_password_password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="form-control form-control-lg"
                        autocomplete="new-password"
                        placeholder="Confirmez votre nouveau mot de passe"
                    >

                    @if ($errors->updatePassword->get('password_confirmation'))

                        <div class="text-danger small mt-2">

                            @foreach ($errors->updatePassword->get('password_confirmation') as $message)

                                <div>{{ $message }}</div>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- Button --}}
                <div class="d-flex align-items-center gap-3">

                    <button type="submit"
                            class="btn btn-primary px-4">

                        💾 Enregistrer

                    </button>


                    @if (session('status') === 'password-updated')

                        <span class="text-success fw-semibold">

                            ✓ Mot de passe mis à jour

                        </span>

                    @endif

                </div>

            </form>

        </div>

    </div>

</section>