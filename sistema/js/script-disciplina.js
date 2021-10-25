carDisciplina();
cadDisciplina();
altDisciplina();

/*-------------------------- Modal ------------------*/
function modalCadastrar() {
    let modal = document.getElementById("modal-cadastrar");
    let fechar = document.getElementById("fechar-cadastro");

    carSlcSemestre();

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


/*-------------------------- Disciplina ------------------*/

var msg = document.querySelector('.msg');
var msgAlterar = document.querySelector('.msg-alterar');
var msgDisciplina = `<p class="msg-atencao">Campo Disciplina vazio</p>`;
var msgDescricao = `<p class="msg-atencao">Campo descrição vazio</p>`;
var msgCodigoDisciplina = `<p class="msg-fracasso">Não foi possível identificar a disciplina</p>`;

function  limpar() {
    document.getElementById("txt-disciplina").value = "";
    document.getElementById("txa-descricao").value = "";
    document.getElementById("txa-descricaoAlterar").value = "";
    document.getElementById("txt-disciplinaAlterar").value = "";


}
function cadDisciplina() {
    let form = document.getElementById("form-disciplina");

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        let txtDisciplina = document.getElementById("txt-disciplina").value;
        let slcSemestre = document.getElementById("slc-semestre").value;
        let txaDescricao = document.getElementById("txa-descricao").value;

        if (txtDisciplina == "") {
            msg.innerHTML = msgDisciplina;
            return;
        } else if (txaDescricao == "") {
            msg.innerHTML = msgDescricao;
            return;
        } else {

            const data = new URLSearchParams();

            for (const p of new FormData(form)) {
                data.append(p[0], p[1]);
            }

            let url = "php/cadDisciplina.php";

            fetch(url, {
                method: 'POST',
                body: data
            })

                    .then(response => response.text())
                    .then(response => {
                        document.querySelector(".msg").innerHTML = response;
                        carDisciplina();
                        limpar();
                    }).catch(error => document.querySelector(".msg").innerHTML = error);

        }
    });
}
//carregar select form
function carSlcSemestre() {
    let url = "php/carSemestre.php";

    fetch(url).then((res) => res.json())
            .then(response => {
                let saida = '';
                for (const i in response) {
                    let codigoSemestre = response[i].codigo_semestre;
                    let nomeSemestre = response[i].nome_semestre;
                    saida += `<option value="${codigoSemestre}">${nomeSemestre}</option>`;
                }
                document.getElementById("slc-semestre").innerHTML = saida;
                document.getElementById("slc-semestreAlterar").innerHTML = saida;
            }).catch(error => console.log(error));
}

function carDisciplina() {

    let url = "php/carDisciplina.php";

    fetch(url).then((res) => res.json())

            .then(response => {
                let output = '';
                for (const i in response) {
                    output += `
                    <div class="box-registro">
                    <p class="texto">Código: ${response[i].codigo_disciplina}</p>
                    <p class="texto">Nome: ${response[i].nome_disciplina}</p>
                    <p class="texto">Semestre: ${response[i].nome_semestre}</p>
                    <p class="texto">Descrição: ${response[i].descricao_disciplina}</p>
                    <button class="btn btn-link" onclick="carCampoDisciplina(${response[i].codigo_disciplina})"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-link" onclick="deleteDisciplina(${response[i].codigo_disciplina})"><i class="fa fa-trash"></i></button>
                    </div>`;
                }
                document.getElementById("row-disciplina").innerHTML = output;


            }).catch(error => console.log(error));
}

function carCampoDisciplina(id) {


    let url = "php/carCampoDisciplina.php?id=";

    fetch(url + id).then((response) => response.json())
            .then((response) => {
                for (const i in response) {
                    let codigoSemestre = response[i].codigo_semestre
                    let nomeSemestre = response[i].nome_semestre
                    let saida = `<Option value="${codigoSemestre}">${nomeSemestre}</option>`

                    document.getElementById("txt-codigoDisciplina").value = response[i].codigo_disciplina
                    document.getElementById("txt-disciplinaAlterar").value = response[i].nome_disciplina
                    document.getElementById("slc-semestreAlterar").innerHTML = saida
                    document.getElementById("txa-descricaoAlterar").value = response[i].descricao_disciplina
                }

                carSlcSemestre();
            }).catch(error => console.log(error));


    modalAlterar();

}
function altDisciplina() {
    let form = document.getElementById("form-alterar");

    form.addEventListener("submit", (event) => {
        event.preventDefault()
        let txtDisciplina = document.getElementById("txt-disciplinaAlterar").value;
        let slcSemestre = document.getElementById("slc-semestreAlterar").value;
        let txaDescricao = document.getElementById("txa-descricaoAlterar").value;

        if (txtDisciplina == "") {
            msgAlterar.innerHTML = msgDisciplina;
            return;
        } else if (txaDescricao == "") {
            msgAlterar.innerHTML = msgDescricao;
            return;
        } else {
            let url = "php/altDisciplina.php";
            let data = new URLSearchParams();

            for (const p of new FormData(form)) {
                data.append(p[0], p[1]);
            }

            fetch(url, {
                method: "POST",
                body: data
            })
                    .then(response => response.text())
                    .then(response => {
                        document.querySelector(".msg-alterar").innerHTML = response;
                        carDisciplina();
                        limpar();
                    }).catch(error => document.querySelector(".msg-alterar").innerHTML = error);
        }
    });


}
function deleteDisciplina(id) {
    let url = "php/delDisciplina.php?id=";

    let confirmar = confirm("Você deseja excluir esse item?");

    if (confirmar == true) {
        fetch(url + id, {
            method: 'DELETE'
        })
                .then(response => response.text())
                .then(response => {
                    alert(response);
                    carDisciplina();
                })
                .catch(error => alert(error));
    }
}