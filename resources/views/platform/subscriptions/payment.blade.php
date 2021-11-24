<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.stripe.com/v3/"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Checkout page') }}</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form id="payment-form" action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                            </div>
                            <div class="form-group">
                                <label for="">Card details</label>
                                <div id="card-element"></div>
                            </div><br><br>

                            <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <script>
        const stripe = Stripe('{{ config('cashier.key') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if(error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')

                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();
            }
        })
    </script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>






