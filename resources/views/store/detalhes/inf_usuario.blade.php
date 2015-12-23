<div class="col-sm-3">
    <div class="left-sidebar">
        <div class="panel-group category-products" id="accordian">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title"><a href="{{ route('account.orders') }}">Meus Pedidos</a></h5>
                    <br>
                    <h4 class="panel-title"><a href="{{ route('account.endereco', ['id' => Auth::user()->id]) }}">Endereço</a></h4>
                </div>
            </div>

        </div>
    </div>
</div>
