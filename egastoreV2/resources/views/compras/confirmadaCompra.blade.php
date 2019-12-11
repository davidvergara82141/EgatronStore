@extends('layouts.app')

@section('titulo')
    Datos de Pago
@endsection

@section('content')
    <a href="/home" class="btn btn-danger">Cancelar</a>
    
    <div class="container">
        <div class="row">
            <!-- You can make it whatever width you want. I'm making it full width
        on <= small devices and 4/12 page width on >= medium devices -->
            <div class="col-xs-12 col-md-4">
    
    
                <!-- CREDIT CARD FORM STARTS HERE -->
                <form action="/compra/realizarCompra/{{$producto->id}}" method="POST">
                    @csrf
                
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Detalles De Pago</h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">Número De Tarjeta</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" name="cardNumber"
                                                placeholder="Valid Card Number" autocomplete="cc-number" required
                                                autofocus />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">Fecha De</span><span
                                                class="visible-xs-inline"></span> Vencimiento</label>
                                        <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY"
                                            autocomplete="cc-exp" required />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">Código</label>
                                        <input type="tel" class="form-control" name="cardCVC" placeholder="CVC"
                                            autocomplete="cc-csc" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="couponCode">Nombre En Tarjeta</label>
                                        <input type="text" class="form-control" name="couponCode" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-success" type="submit">Pagar</button>
                                </div>
                            </div>
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
@endsection
