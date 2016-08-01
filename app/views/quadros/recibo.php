<h1>Recibo</h1>
<table>
    <tr>
        <th>Código</th>
        <td>{{code}}</td>
    </tr>
    <tr>
        <th>Nome</th>
        <td>{{customer}}</td>
    </tr>
    <tr>
        <th>Largura</th>
        <td>{{cols}}</td>
    </tr>
    <tr>
        <th>Cor 1</th>
        <td>{{color1}}</td>
    </tr>
    <tr>
        <th>Cor 2</th>
        <td>{{color2}}</td>
    </tr>
    <tr>
        <th>Imagem</th>
        <td><canvas id="quadro-preview"></canvas></td>
    </tr>
</table>

<script type="text/javascript" src="/assets/js/Quadro.js"></script>
<script type="text/javascript">
    window.onload = function () {
        visualizar();
    };

    function visualizar() {
        var quadro = new Quadro('quadro-preview');
        quadro.color1 = '{{color1}}';
        quadro.color2 = '{{color2}}';
        quadro.cols = {{cols}};
        quadro.draw();
    }
</script>