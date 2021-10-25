carTarefaPendente();
carSlcDisciplina();
cadTarefa();
altTarefa();
/*-------------------------- Modal ------------------*/
function modalCadastrar() {
    let modal = document.getElementById("modal-cadastrar");
    let fechar = document.getElementById("fechar-cadastro");
    modal.style.display = "block";
    //evento fechar modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            msg.innerHTML = "";
            limpar();
        }
    }

    fechar.onclick = function () {
        modal.style.display = "none";
        msg.innerHTML = "";
        limpar();
    }
}

function modalAlterar() {
    let modal = document.getElementById("modal-alterar");
    let fechar = document.getElementById("fechar-alterar");
    modal.style.display = "block";
    //evento fechar modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            msgAlterar.innerHTML = "";
            limpar();

        }
    }

    fechar.onclick = function () {
        modal.style.display = "none";
        msgAlterar.innerHTML = "";
        limpar();
    }
}

/*-------------------------- Tarefas ------------------*/

function limpar() {
    document.getElementById("txt-tarefa").value = "";
    document.getElementById("txt-data").value = "";
    document.getElementById("txa-descricao").value = "";
    document.getElementById("txt-tarefaAlterar").value = "";
    document.getElementById("txt-dataAlterar").value = "";
    document.getElementById("txa-descricaoAlterar").value = "";
    document.getElementById("slc-disciplina").value = "";
}

var msg = document.querySelector('.msg');
var msgAlterar = document.querySelector('.msg-alterar');
var msgTarefa = `<p class="msg-atencao">Campo Tarefa vazio</p>`;
var msgData = `<p class="msg-atencao">Campo Data vazio</p>`;
var msgDescricao = `<p class="msg-atencao">Campo descrição vazio</p>`;
var msgCodigoDisciplina = `<p class="msg-fracasso">Não foi possível identificar a tarefa</p>`;
function cadTarefa() {
    let form = document.getElementById("form");
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let txtTarefa = document.getElementById("txt-tarefa").value;
        let txtData = document.getElementById("txt-data").value
        let txtDescricao = document.getElementById("txa-descricao").value;
        if (txtTarefa == "") {
            msg.innerHTML = msgTarefa;
            return;
        } else if (txtData == "") {
            msg.innerHTML = msgData;
        } else if (txtDescricao == "") {
            msg.innerHTML = msgDescricao;
            return;

        } else {
            const data = new URLSearchParams();
            for (const p of new FormData(form)) {
                data.append(p[0], p[1]);
            }

            let url = "php/cadTarefa.php";
            fetch(url, {
                method: 'POST',
                body: data
            })
                    .then(response => response.text())
                    .then(response => {
                        document.querySelector('.msg').innerHTML = response;
                        carTarefaPendente();
                    }).catch(error => document.querySelector('.msg').innerHTML = error);
        }


    });
}
function adicionaZero(numero) {
    if (numero <= 9)
        return "0" + numero;
    else
        return numero;
}
function carTarefaPendente() {
    let url = "php/carTarefaPendente.php";
    let tarCompleta = document.getElementById("row-tarefaCompleta");
    let secPendente = document.getElementById("tarefa-pendente");
    let secCompleta = document.getElementById("tarefa-completa");
    tarCompleta.innerHTML = "";
    secCompleta.style.display = "none";
    secPendente.style.display = "block";
    fetch(url).then((res) => res.json())
            .then(response => {
                let output = "";
                for (let i in response) {

                    let dtEntrega = response[i].dataEntrega_tarefa;
                    let dtEntregaNew = new Date(dtEntrega);
                    let dtEntregaFormat = (adicionaZero(dtEntregaNew.getUTCDate()) + "/" + (adicionaZero(dtEntregaNew.getUTCMonth() + 1)) + "/" + dtEntregaNew.getUTCFullYear());
                    
                    output += `<div class="box-registro">
                     <p class="texto">Código: ${response[i].codigo_tarefa}</p>
                     <p class="texto">Nome: ${response[i].nome_tarefa}</p>
                     <p class="texto">Tipo: ${response[i].tipo_tarefa}</p>
                     <p class="texto">Data: ${dtEntregaFormat}</p>
                     <p class="texto">Disciplina: ${response[i].nome_disciplina}</p>
                     <p class="texto">Descrição: ${response[i].descricao_tarefa}</p>
            <button class="btn btn-link" onClick="detalheTarefa(${response[i].codigo_tarefa})"><i class="fa fa-expand"></i></button>
            <button class="btn btn-link" onClick="carCampoTarefa(${response[i].codigo_tarefa})"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-link" onClick="delTarefaPendente(${response[i].codigo_tarefa})"><i class="fa fa-trash"></i></button>
            
                    </div>`;
                }
                document.getElementById("row-tarefaPendente").innerHTML = output;
            }).catch(error => console.log(response));
}

function carTarefaCompleta() {
    let url = "php/carTarefaCompleta.php";
    let tarPendente = document.getElementById("row-tarefaPendente");
    let secPendente = document.getElementById("tarefa-pendente");
    let secCompleta = document.getElementById("tarefa-completa");
    tarPendente.innerHTML = "";
    secPendente.style.display = "none";
    secCompleta.style.display = "block";
    fetch(url).then((res) => res.json())
            .then(response => {
                let output = "";
                for (let i in response) {

                    let dtEntrega = response[i].dataEntrega_tarefa;
                    let dtEntregaNew = new Date(dtEntrega);

                    let dtEntregaFormat = (adicionaZero(dtEntregaNew.getUTCDate()) + "/" + (adicionaZero(dtEntregaNew.getUTCMonth() + 1)) + "/" + dtEntregaNew.getUTCFullYear());

                    output += `<div class="box-registro">
                     <p class="texto">Código: ${response[i].codigo_tarefa}</p>
                     <p class="texto">Nome: ${response[i].nome_tarefa}</p>
                     <p class="texto">Tipo: ${response[i].tipo_tarefa}</p>
                     <p class="texto">Data: ${dtEntregaFormat}</p>
                     <p class="texto">Disciplina: ${response[i].nome_disciplina}</p>
                     <p class="texto">Descrição: ${response[i].descricao_tarefa}</p>
            <button class="btn btn-link" onClick="detalheTarefa(${response[i].codigo_tarefa})"><i class="fa fa-expand"></i></button>
            <button class="btn btn-link" onClick="carCampoTarefa(${response[i].codigo_tarefa})"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-link" onClick="delTarefaCompleta(${response[i].codigo_tarefa})"><i class="fa fa-trash"></i></button>
            
                    </div>`;
                }
                document.getElementById("row-tarefaCompleta").innerHTML = output;
            }).catch(error => console.log(response));
}

function carCampoTarefa(id) {

    let url = "php/carCampoTarefa.php?id=";
    fetch(url + id).then((response) => response.json())
            .then(response => {
                let opcaoTipoTarefa = '';
                let opcaoStatus = '';
                let disciplina = '';
                for (const i in response) {

                    let tipoTarefa = response[i].tipo_tarefa;
                    let statusTarefa = response[i].status_tarefa;

                    if (tipoTarefa == 'T') {
                        opcaoTipoTarefa += `<option value="${tipoTarefa}">Trabalho</option>`;
                        opcaoTipoTarefa += `<option value="P">Prova</option>`;
                    } else {
                        opcaoTipoTarefa += `<option value="${tipoTarefa}">Prova</option>`;
                        opcaoTipoTarefa += `<option value="T">Trabalho</option>`;
                    }
                    if (statusTarefa == 'C') {
                        opcaoStatus += `<option value="${statusTarefa}">Completa</option>`;
                        opcaoStatus += `<option value="P">Pendente</option>`;

                    } else {
                        opcaoStatus += `<option value="${statusTarefa}">Pendente</option>`;
                        opcaoStatus += `<option value="C">Completa</option>`;
                    }

                    //disciplina += `<option value="${response[i].codigo_disciplina}">${response[i].nome_disciplina}</option>`

                    document.getElementById("txt-codigoTarefaAlterar").value = response[i].codigo_tarefa;
                    document.getElementById("txt-tarefaAlterar").value = response[i].nome_tarefa;
                    document.getElementById("txt-dataAlterar").value = response[i].dataEntrega_tarefa;
                    document.getElementById("txa-descricaoAlterar").value = response[i].descricao_tarefa;

                }

                document.getElementById("slc-tipoTarefaAlterar").innerHTML = opcaoTipoTarefa;
                document.getElementById("slc-statusTarefaAlterar").innerHTML = opcaoStatus;


            }).catch(error => console.log(error));
    modalAlterar()
}

function altTarefa() {
    let url = "php/altTarefa.php";
    let form = document.getElementById("form-alterar");
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let txtTarefa = document.getElementById("txt-tarefaAlterar").value;
        let txtData = document.getElementById("txt-dataAlterar").value
        let txtDescricao = document.getElementById("txa-descricaoAlterar").value;
        if (txtTarefa == "") {
            msg.innerHTML = msgTarefa;
            return;
        } else if (txtData == "") {
            msg.innerHTML = msgData;
            return;
        } else if (txtDescricao == "") {
            msg.innerHTML = msgDescricao;
            return;
        } else {
            const data = new URLSearchParams();
            for (const p of new FormData(form)) {
                data.append(p[0], p[1]);
            }

            fetch(url, {
                method: 'POST',
                body: data
            })
                    .then(response => response.text())
                    .then(response => {
                        console.log(response);
                        document.querySelector('.msg-alterar').innerHTML = response;
                        carTarefaPendente();
                    }).catch(error => console.log(error));

        }
    });
}

function delTarefaPendente(id) {
    let url = "php/delTarefa.php?id=";
    let confirmar = confirm("Você deseja excluir esse item?");
    if (confirmar == true) {
        fetch(url + id, {
            method: 'DELETE'
        })
                .then(response => response.text())
                .then(response => {
                    alert(response);
                    carTarefaPendente();
                })
                .catch(error => alert(error));
    }

}

function delTarefaCompleta(id) {
    let url = "php/delTarefa.php?id=";
    let confirmar = confirm("Você deseja excluir esse item?");
    if (confirmar == true) {
        fetch(url + id, {
            method: "DELETE"
        })
                .then(response => response.text()).then(response => {
            alert(response);
            carTarefaCompleta();
        })
                .catch(error => alert(error));
    }

}


//carregar select form
function carSlcDisciplina() {
    let url = "php/carDisciplina.php";
    fetch(url).then((res) => res.json())
            .then(response => {
                let saida = '';
                for (const i in response) {
                    let codigoDisciplina = response[i].codigo_disciplina;
                    let nomeDisciplina = response[i].nome_disciplina;
                    saida += `<option value="${codigoDisciplina}">${nomeDisciplina}</option>`;
                }
                document.getElementById("slc-disciplina").innerHTML = saida;
                document.getElementById("slc-disciplinaAlterar").innerHTML = saida;
            }).catch(error => console.log(error));
}

