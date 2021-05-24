<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/carrinho.css')}}">
    <script src="{{ asset('js/pagamento.js') }}"></script>
</head>
<body>



    <!-- MultiStep Form -->
    <div class="container-fluid " id="grad1">
        <div class="row justify-content-center mt-0 vah-100 align-items-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Siga o passo a passo para finalizar a compra</strong></h2>
                    <p>Preencha as informações a baixo</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account">
                                        <strong>Conta</strong>
                                    </li>
                                    <li id="personal">
                                        <strong>Localização</strong>
                                    </li>
                                    <li id="payment">
                                        <strong>Pagamento</strong>
                                    </li>
                                    <li id="confirm">
                                        <strong>Finalizado</strong>
                                    </li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações da Conta</h2>
                                        <input type="text" name="login" placeholder="Login" />
                                        <input type="password" name="senha" placeholder="senha" />
                                        <input type="password" name="senha2" placeholder="confirmação da senha" />
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações de Localização</h2>
                                        <input type="text" name="fname" placeholder="First Name" />
                                        <input type="text" name="lname" placeholder="Last Name" />
                                        <input type="text" name="phno" placeholder="Contact No." />
                                        <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações de Pagamento</h2>
                                        <div class="radio-group">
                                            <div class='radio' data-value="credit"><img src="https://via.placeholder.com/400" width="200px" height="100px"></div>
                                            <div class='radio' data-value="paypal"><img src="https://via.placeholder.com/400" width="200px" height="100px"></div> <br>
                                        </div>
                                        <label class="pay">Card Holder Name*</label>
                                        <input type="text" name="holdername" placeholder="" />
                                        <div class="row">
                                            <div class="col-9"> <label class="pay">Card Number*</label>
                                                <input type="text" name="cardno" placeholder="" />
                                            </div>
                                            <div class="col-3"> <label class="pay">CVC*</label>
                                                <input type="password" name="cvcpwd" placeholder="***" />
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                            </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
