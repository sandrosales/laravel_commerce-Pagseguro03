Caro Sr(a) {{ $user->name }}
<br>
<br>

Recebemos o seu pedido número {{ $order->id }} e aguardamos a confirmação do pagamento.
<br>
Você receberá novos comunicados, por e-mail, sobre o andamento do pedido.

<br>
<br>
<br>
Informação do seu pedido
<ul>
    @foreach($order->items as $item)
    <li>Nome do Produto: {{ $item->product->name }}</li>
    @endforeach

    <li>Valor: R$ {{ $order->total }}</li>
</ul>
<br>
<br>
PRAZO DE ENTREGA: começa a contar após a confirmação do pagamento pela administradora do cartão de crédito. Assim que isso ocorrer, enviaremos outro e-mail.
<br>
<br>
<br>
Lembramos que, a partir deste momento, não será possível:
<br>
<ul>
    <li>alterar a forma de pagamento;</li>
    <li>alterar o endereço de entrega.</li>
</ul>

<h4>Não executamos:</h4>
<ul>
    <li>montagem e desmontagem de produto e/ou portas e janelas para o transporte;</li>
    <li>transporte pela escada ou içamento pelo lado de fora do prédio.</li>
</ul>
<br>
<br>

Obrigado pela preferencia!
<br>
Atenciosamente:
<br>
Code Commerce
