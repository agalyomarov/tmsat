@auth
    <div class="form_profile mob">
        <p class="name_profile">{{ auth()->user()->login }}</p>
        <p class="balance_profile">Ваш баланс<span class="sum">{{ auth()->user()->balance }}</span></p>
    </div>
@endauth
