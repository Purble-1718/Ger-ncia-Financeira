function openCadastroWindow() {
    var width = 400;
    var height = 300;
    var left = (window.innerWidth - width) / 2
    var top = (window.innerHeight - height) / 2

    var cadastroWindow = window.open('','Cadastrar Categoria', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);

    cadastroWindow.document.write(`
        <html>
        <head>
            <title>Cadrastrar Categoria</title> 
        </head>
        <body>
            oi
        </body>
        </html>
    `);
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("categoria").addEventListener("change", function() {
        var op = this.options[this.selectedIndex].value;
        if (op == "cadastro") {
            openCadastroWindow();
        }
    });
});
