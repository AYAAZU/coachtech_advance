<p>{{$reservation->shop->name}} へ</p>
<form action="{{route('stripe.charge')}}" method="POST">
  @csrf
  <input type="text" name="amount" id=""><span>円</span>
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-amount="" data-name="お支払い画面" data-label="支払う" data-description="現在はデモ画面です" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
  </script>


</form>