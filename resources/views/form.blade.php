{{ html()->form('POST', route('checkout.doPay', $order))->id('pay')->open() }}
    {{ html()->hidden('paymentMethodId')->id('paymentMethodId') }}
    {{ html()->hidden('cardToken')->id('cardToken') }}

    <div class="row">
        <div class="form-group col-md-8">
            {{ html()->label('Número de Tarjeta', 'cardNumber') }}
            <input class="form-control" type="text" id="cardNumber" data-checkout="cardNumber" placeholder="1111 2222 3333 4444" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
        </div>

        <div class="form-group col-md-2">
            {{ html()->label('Mes de Expiración', 'cardExpirationMonth') }}
            <input class="form-control" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="MM" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
        </div>
        <div class="form-group col-md-2">
            {{ html()->label('Año de Expiración', 'cardExpirationYear') }}
            <input class="form-control" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="AAAA" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {{ html()->label('Nombre en la tarjeta', 'cardholderName') }}
            <input class="form-control" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="Juan Perez" />
        </div>
        <div class="form-group col-md-2">
            {{ html()->label('Tipo de Documento', 'docType') }}
            <select class="form-control" id="docType" data-checkout="docType">
                <option>Cargando...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            {{ html()->label('Número de Documento', 'docNumber') }}
            <input class="form-control" type="text" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
        </div>
        <div class="form-group col-sm-2">
            {{ html()->label('CVV', 'securityCode') }}
            <input class="form-control" type="text" id="securityCode" data-checkout="securityCode" placeholder="123" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
        </div>
    </div>

    <input class=" btn btn-primary btn-block btn-lg" type="submit" value="Pagar" />
{{ html()->form()->close() }}
