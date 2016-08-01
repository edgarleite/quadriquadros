<form action="./" method="post">
    Personalize seu quadro

    <div class="container">
        <label>Nome:
            <input type="text" name="Quadros[customer]"/>
        </label>
        <br />
        <label>Largura (qtd. de quadrados):
            <input type="number" name="Quadros[cols]" id="cols" min="11" max="31" step="2" value="11"/>
        </label>
        <br />
        <label>Cor 1
            <!--<input type="color" name="Quadros[color1]" id="cor-1" value="#000000"/>-->
            <select name="Quadros[color1]" id="color-1">
                <option value="#000000">Preto</option>
                <option value="#ff0000">Vermelho</option>
                <option value="#00ff00">Verde</option>
            </select>
        </label>
        <label>Cor 2
            <!--<input type="color" name="Quadros[color2]" id="cor-2" value="#ffffff"/>-->
            <select name="Quadros[color2]" id="color-2">
                <option value="#ffffff">Branco</option>
                <option value="#ffff00">Amarelo</option>
                <option value="#ff00ff">Rosa</option>
            </select>
        </label>
        <br />
        <button type="button" onclick="visualizar()">Visualizar</button>
        <button type="submit">Finalizar</button>
    </div>
</form>

<div id="preview">
    Preview

    <div class="container">
        <canvas id="quadro-preview"></canvas>
    </div>
</div>

<script type="text/javascript" src="/assets/js/Quadro.js"></script>
<script type="text/javascript">
    window.onload = function () {
        visualizar();
    };

    function visualizar() {
        var quadro = new Quadro('quadro-preview');
        quadro.color1 = document.getElementById('color-1').value;
        quadro.color2 = document.getElementById('color-2').value;
        quadro.cols = document.getElementById('cols').value;
        quadro.draw();
    }
</script>