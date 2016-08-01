function Quadro(idElem) {
    this.color1 = '#000000';
    this.color2 = '#ffffff';
    this.cols = 11;
    this.rows = 6;
    this.boxSize = 20;
    this.canvas = document.getElementById(idElem);
    this.context = this.canvas.getContext('2d');

    this.create = function () {
        for (var j = 0; j < this.rows; j++) {
            for (var i = 0; i < this.cols; i++) {
                this.context.fillStyle = this.getColor(i, j);
                this.context.fillRect(i * this.boxSize, j * this.boxSize, this.boxSize, this.boxSize);
                this.context.stroke();
            }
        }
    };

    this.draw = function () {
        this.setRows();
        this.setCanvasDimensions();
        this.create();
    };

    this.getColor = function (colCounter, rowCounter) {
        var color;

        //  Alterna cores dos blocos
        if (colCounter % 2)
            color = (rowCounter % 2 ? this.color1 : this.color2);
        else
            color = (rowCounter % 2 ? this.color2 : this.color1);

        return color;
    };

    this.setCanvasDimensions = function () {
        this.canvas.width = this.canvasWidth;
        this.canvas.height = this.canvasHeight;
    };

    this.setRows = function () {
        var rows = Math.round((this.cols * 0.54));

        if (rows % 2)
            this.rows = rows + 1;
        else
            this.rows = rows;

        this.canvasWidth = this.boxSize * this.cols;
        this.canvasHeight = this.boxSize * this.rows;
    };
}