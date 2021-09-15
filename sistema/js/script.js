/*-------------------------- Carregar ------------------*/
carSemestre()
limpar()

var msg = document.querySelector('.msg')
var msgAlterar = document.querySelector('.msg-alterar')
var msgSemestre = `<p class="msg-atencao">Campo semestre vazio.</p>`
var msgDtInicio = `<p class="msg-atencao">Campo data início vazio.</p>`
var msgDtTermino = `<p class="msg-atencao">Campo data termino vazio.</p>`
var msgCodigo = `<p class="msg-fracasso">Não foi possivel identificar o semestre.</p>`


function limpar() {
    document.getElementById("txt-codigoSemestre").value = ""
    document.getElementById("txt-semestreAlterar").value = ""
    document.getElementById("txt-dtInicioAlterar").value = ""
    document.getElementById("txt-dtTerminoAlterar").value = ""
    document.getElementById("form-alterar").value = ""
    document.getElementById("txt-semestre").value = ""
    document.getElementById("txt-dtInicio").value = ""
    document.getElementById("txt-dtTermino").value = ""
    document.getElementById("form").value = ""
}

/*-------------------------- Modal ------------------*/
function modalCadastrar() {
    let modal = document.getElementById("modal-cadastrar")
    let fechar = document.getElementById("fechar-cadastro")

    modal.style.display = "block"
    //evento fechar modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none"
            msg.innerHTML = ""
            limpar()

        }
    }

    fechar.onclick = function () {
        modal.style.display = "none"
        msg.innerHTML = ""
        limpar()

    }
}

function modalAlterar() {
    let modal = document.getElementById("modal-alterar")
    let fechar = document.getElementById("fechar-alterar")

    modal.style.display = "block"

    //evento fechar modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            msgAlterar.innerHTML = ""
            limpar()
        }
    }

    fechar.onclick = function () {
        modal.style.display = "none";
        msgAlterar.innerHTML = ""
        limpar()
    }
}

/*-------------------------- Semestre ------------------*/
function carSemestre() {
    let url = "php/carSemestre.php"

    fetch(url).then((res) => res.json())

            .then(response => {
                let output = ''
                for (let i in response) {
                    //converter datas
                    let dtInicio = response[i].dataInicio_semestre.toString()
                    let dtTermino = response[i].dataTermino_semestre

                    output += `<div class="box-registro msg-del">
            <p class="texto">Código: ${response[i].codigo_semestre}</p>
            <p class="texto">Nome: ${response[i].nome_semestre}</p>
            <p class="texto">Data Início: ${dtInicio}</p>
            <p class="texto">Data Termino: ${dtTermino}</p>
            <button class="btn btn-link" onClick="carCampoSemestre(${response[i].codigo_semestre})"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-link" onClick="deleteSemestre(${response[i].codigo_semestre})"><i class="fa fa-trash"></i></button>
</div>`;
                }
                document.getElementById("row-semestre").innerHTML = output


            }).catch(error => console.log(error))
}


function carCampoSemestre(id) {
    let url = "php/carCampoSemestre.php?id="

    fetch(url + id).then((response) => response.json())
            .then(response => {
                for (let i in response) {
                    document.getElementById("txt-codigoSemestre").value = response[i].codigo_semestre
                    document.getElementById("txt-semestreAlterar").value = response[i].nome_semestre
                    document.getElementById("txt-dtInicioAlterar").value = response[i].dataInicio_semestre
                    document.getElementById("txt-dtTerminoAlterar").value = response[i].dataTermino_semestre

                }
            }).catch(error => console.log(error))

    modalAlterar()
}

function altSemestre() {
    let txtCodigo = document.getElementById("txt-codigoSemestre").value
    let txtSemestre = document.getElementById("txt-semestreAlterar").value
    let txtDtInicio = document.getElementById("txt-dtInicioAlterar").value
    let txtDtTermino = document.getElementById("txt-dtTerminoAlterar").value
    let form = document.getElementById("form-alterar")

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        const data = new URLSearchParams()
        for (const p of new FormData(form)) {
            data.append(p[0], p[1])
        }
        if (txtCodigo == "") {
            msgAlterar.innerHTML = msgCodigo
            return
        } else if (txtSemestre == "") {
            msgAlterar.innerHTML = msgSemestre
            return
        } else if (txtDtInicio == "") {
            msgAlterar.innerHTML = msgDtInicio
            return
        } else if (txtDtTermino == "") {
            msgAlterar.innerHTML = msgDtTermino
            return
        } else {
            let url = 'php/altSemestre.php'

            fetch(url, {
                method: 'POST',
                body: data
            })
                    .then(response => response.text()).then(response => {

                console.log(response)
                document.querySelector('.msg-alterar').innerHTML = response
                carSemestre()


            }).catch(error => console.log(error))
        }
    })

}

function cadSemestre() {
    let txtSemestre = document.getElementById("txt-semestre").value
    let txtDtInicio = document.getElementById("txt-dtInicio").value
    let txtDtTermino = document.getElementById("txt-dtTermino").value
    let form = document.getElementById("form")

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        const data = new URLSearchParams()

        for (const p of new FormData(form)) {
            data.append(p[0], p[1])
        }

        if (txtSemestre == "") {
            msg.innerHTML = msgSemestre
            return
        } else if (txtDtInicio == "") {
            msg.innerHTML = msgDtInicio
            return
        } else if (txtDtTermino == "") {
            msg.innerHTML = msgDtTermino
            return
        } else {
            let url = 'php/cadSemestre.php'

            fetch(url, {
                method: 'POST',
                body: data
            })
                    .then(response => response.text()).then(response => {
                document.querySelector('.msg').innerHTML = response
                limpar()
                carSemestre()

            }).catch(error => console.log(error))
        }
    })
}


function deleteSemestre(id) {

    let url = "php/delSemestre.php?id="

    let confirmar = confirm("Você deseja excluir esse item?")

    if (confirmar == true) {
        fetch(url + id, {
            method: 'DELETE'
        })
                .then(response => response.text())
                .then(response => {
                    console.log(response)
                    carSemestre()
                })
                .catch(error => console.log(error))
    }
}
/*-------------------------- Disciplina ------------------*/
function cadDisciplina() {
    let txtDisciplina = document.getElementById("txt-disciplina").value
    let sclSemestre = domcument.getElementById("slc-semestre").value
    let txaDisciplina = document.getElementById("txa-disciplina").value
    
    let url = "php/cadDisciplina.php"
    
    fetch(url,{
        
    })
}

