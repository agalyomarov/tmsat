@auth
    <div class="form_profile mob" data-diller_balance="{{ auth()->user()->balance }}">
        <p class="name_profile">{{ auth()->user()->login }}</p>
        <p class="balance_profile">Ваш баланс<span class="sum">{{ auth()->user()->balance }}</span></p>
    </div>
@endauth
