// const datainicio = document.getElementById('datareserva');
// const datadevolucao = document.getElementById('datadevolucao');
// let resultado;

// function enviar() {
//     const inicio = new Date(datainicio.value);
//     const devolucao = new Date(datadevolucao.value);
    
//     resultado = devolucao - inicio;

//     const diferencaEmDias = resultado / (1000 * 60 * 60 * 24);
   
// }

function enviar() {
    const dataReserva = document.querySelector('input[name="datareserva"]').value;
    const dataDevolucao = document.querySelector('input[name="datadevolucao"]').value;
    
    if (dataReserva && dataDevolucao) {
        $.ajax({
            url: 'salvar-aluguel.php',  
            method: 'POST',
            data: {
                datareserva: dataReserva,
                datadevolucao: dataDevolucao,
                acao: 'calcular-dias' 
            },
            success: function(resposta) {
               
                $("#calcular").val(resposta)
               
            }
          
        });
    } 
}
    
    $("#nomeVeiculo").change(function (e) { 
        e.preventDefault();
        console.log(this.value)
        $.ajax({
            
            url : 'salvar-categoria.php',
            method : 'post',
            data : {
                idVeiculo: this.value
                //idVeiculo nome qlqr
            },
            success: function(resposta){
                categoria = JSON.parse(resposta)

                const beleza = $("#calcular").val()
                const total = parseInt(beleza) * parseInt(categoria.valor_diaria)
                $(".valor").val(total)
                $(".valor").html("R$ <b>" + total + "</b>").css({"font-size": "20px"})
            }
    
        })
        
    });

    // const valor = categoria.valor_diaria
    // const calculo = resposta
    // const result = valor * calculo

    // document.getElementById("#calculo").innerHTML


