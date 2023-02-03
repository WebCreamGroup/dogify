<main class="space-y-20">
    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-5 pt-5">
                <h2 class="card-title">Your profile data</h2>
                <p>First, last name and email, you can change at this section</p>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <form wire:submit.prevent="submit">
                    <div class="card-body space-y-5">
                        {{ $this->form }}

                        <div class="card-actions justify-end items-center gap-5">
                            @if(session()->has('success'))
                                <span x-init="setTimeout(() => $el.remove(), 6000)" class="text-success-500">Saved</span>
                            @endif

                            <button type="submit" class="btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-5 pt-5">
                <h2 class="card-title">Change your password</h2>
                <p>First, last name and email, you can change at this section</p>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <form wire:submit.prevent="submit">
                    <div class="card-body space-y-5">
                        {{ $this->form }}

                        <div class="card-actions justify-end items-center gap-5">
                            @if(session()->has('success'))
                                <span x-init="setTimeout(() => $el.remove(), 6000)" class="text-success-500">Saved</span>
                            @endif

                            <button type="submit" class="btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
