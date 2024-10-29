const datainicio = document.getElementById('datareserva');
const datadevolucao = document.getElementById('datadevolucao');
let resultado;

function enviar() {
    const inicio = new Date(datainicio.value);
    const devolucao = new Date(datadevolucao.value);
    
    resultado = devolucao - inicio;

    const diferencaEmDias = resultado / (1000 * 60 * 60 * 24);
   
    
}

