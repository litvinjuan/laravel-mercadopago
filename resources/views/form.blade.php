{{ html()->form('POST', route('mppayments.pay', $payable))->id('pay')->open() }}
    @include('mppayments::payment-hidden')

    <div class="row">
        <div class="form-group col-md-8">
            @include('mppayments::card-number')
        </div>

        <div class="form-group col-md-2">
            @include('mppayments::card-expiration-month')
        </div>
        <div class="form-group col-md-2">
            @include('mppayments::card-expiration-year')
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            @include('mppayments::card-name')
        </div>
        <div class="form-group col-md-2">
            @include('mppayments::doc-type')
        </div>
        <div class="form-group col-md-3">
            @include('mppayments::doc-number')
        </div>
        <div class="form-group col-sm-2">
            @include('mppayments::card-cvv')
        </div>
    </div>

    <input id="submit" type="submit" value="Pagar" />
{{ html()->form()->close() }}

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
<script>
    $(document).ready(function () {
        let MP = window.Mercadopago;
        MP.setPublishableKey({{ config('mppayments.public-key') }});

        MP.getIdentificationTypes(function(status, codes) {
            let select = $('#docType');
            select.empty();
            codes.forEach(function (code) {
                let option = document.createElement('option');
                option.value = code['id'];
                option.text = code['name'];
                select.append(option);
            })
        }); // getIdentificationTypes

        $('#cardNumber').change(function () {
            var bin = $(this).val().substring(0,6);

            if (bin.length < 6) {
                return;
            }

            MP.getPaymentMethod({"bin": bin}, function(status, response) {
                if (status !== 200) {
                    $('#cardNumber').addClass('border-danger');
                    return;
                }

                $('#cardNumber').removeClass('border-danger');
                $('#paymentMethodId').val(response[0].id);
            });
        }); // #cardNumber -> change

        $('#pay').submit(function (e) {
            if (!$('#cardToken').val()) {
                e.preventDefault();
                MP.createToken($('#pay'), function (status, response) {
                    if (status !== 200 && status !== 201) {
                        alert("verify card data");
                        return false;
                    }

                    $('#cardToken').val(response.id);
                    $('#pay').submit();
                });
                return false;
            }
        }); // #pay -> submit

    }); // document -> ready
</script>
