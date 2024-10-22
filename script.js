const inputinicio = document.getElementById('datareserva')
const inputfim = document.getElementById('datadevolucao')
let datainicio 
let datafim

inputinicio.addEventListener("blur", function(){
    datainicio = this.value 
    console.log(inputinicio)
})


inputfim.addEventListener("blur", function(){
    datafim = this.value
})

