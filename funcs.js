function validar() {
    var categoria = document.getElementById('categoria').value;
    var data = document.getElementById('data').value;
    var valor = document.getElementById('valor').value;
    var descricao = document.getElementById('descricao').value;
    
    if(categoria.trim() === "") {
        alert('Por favor, insira uma categoria. Caso não haja nenhuma categoria, clique em Categorias > P/ Receita "ou" Despesa, e crie uma categoria.');
        return false;
    } else if(data.trim() === "") {
        alert("Por favor insira uma data válida.")
        return false;
    } else if(valor.trim() === "") {
        alert("Por favor insira um valor válido.")
        return false;
    } else if(descricao.trim() === "") {
        alert("Por favor preencha o campo de descrição.")
        return false;
    } else {
        return true;
    }
}

