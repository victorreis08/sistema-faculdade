<?php
require_once("header.php");
?>
<main class="main">

    <h1 class="titulo titulo-1">Disciplina</h1>


    <section class="secao-semestre">
        <button class="btn btn-link"  onclick="modalCadastrar()"><i class="fa fa-plus"></i></button>
        <h2 class="titulo titulo-2">Disciplinas cadastrados</h2>
        <div id="row-disciplina" class="row">
        </div>
    </section>



    <div id="modal-cadastrar" class="modal">
        <div class="form-modal">
            <span id="fechar-cadastro" class="fechar">&times;</span>
            <h2 class="titulo titulo-2">Cadastro de disciplina</h2>
            <form id="form-disciplina">
                <div class="linha-campo">
                    <label>Disciplina:<br/>
                        <input type="text" name="txt-disciplina" id="txt-disciplina" class="campo" placeholder="Isira o nome da disciplina" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Semestre:<br/>
                        <select name="slc-semestre" id="slc-semestre" class="campo select">
                            
                        </select>
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Descrição disciplina:<br/>
                        <textarea name="txa-descricao" id="txa-descricao" class="campo area" placeholder="Descrição da disciplina"></textarea>
                    </label>
                </div>

                <button class="btn">Cadastrar</button>

                <div class="msg"></div>
            </form>
        </div>
    </div>

    <div id="modal-alterar" class="modal">
        <div class="form-modal">
            <span id="fechar-alterar" class="fechar">&times;</span>
            <h2 class="titulo titulo-2">Alterar Disciplina</h2>
            <form id="form-alterar" method="POST">
                <input type="hidden" name="txt-codigoDisciplina" id="txt-codigoDisciplina">

                <div class="linha-campo">
                    <label>Disciplina:<br/>
                        <input type="text" name="txt-disciplinaAlterar" id="txt-disciplinaAlterar" class="campo" placeholder="Isira o semestre" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Semestre:<br/>
                        <select name="slc-semestreAlterar" id="slc-semestreAlterar" class="campo select">

                        </select>
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Descrição da disciplina<br/>
                        <textarea name="txa-descricaoAlterar" id="txa-descricaoAlterar" class="campo area" ></textarea>
                    </label>
                </div>
                <button class="btn">Alterar</button>

                <div class="msg-alterar"></div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript" src="js/script-disciplina.js"></script>
<?php require_once ("footer.php"); ?>


