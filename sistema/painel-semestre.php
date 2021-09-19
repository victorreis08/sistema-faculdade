<?php
require_once("header.php");
?>
<main class="main">

    <h1 class="titulo titulo-1">Semestre</h1>


    <section class="secao-semestre">
        <button class="btn btn-link"  onclick="modalCadastrar()"><i class="fa fa-plus"></i></button>
        <h2 class="titulo titulo-2">Semestres cadastrados</h2>
        <div id="row-semestre" class="row">
        </div>
    </section>

    
    
        <div id="modal-cadastrar" class="modal">
        <div class="form-modal">
            <span id="fechar-cadastro" class="fechar">&times;</span>
            <h2 class="titulo titulo-2">Cadastro de semestre</h2>
            <form id="form" method="POST">
                <div class="linha-campo">
                    <label>Semestre:<br/>
                        <input type="text" name="txt-semestre" id="txt-semestre" class="campo" placeholder="Isira o semestre" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Início do semestre:<br/>
                        <input type="date" name="txt-dtInicio" id="txt-dtInicio" class="campo" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Término do semestre:<br/>
                        <input type="date" name="txt-dtTermino" id="txt-dtTermino" class="campo" >
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
            <h2 class="titulo titulo-2">Alterar Semestre</h2>
            <form id="form-alterar" method="POST">
                <input type="hidden" name="txt-codigoSemestre" id="txt-codigoSemestre">

                <div class="linha-campo">
                    <label>Semestre:<br/>
                        <input type="text" name="txt-semestreAlterar" id="txt-semestreAlterar" class="campo" placeholder="Isira o semestre" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Início do semestre:<br/>
                        <input type="date" name="txt-dtInicioAlterar" id="txt-dtInicioAlterar" class="campo" >
                    </label>
                </div>
                <div class="linha-campo">
                    <label>
                        Término do semestre:<br/>
                        <input type="date" name="txt-dtTerminoAlterar" id="txt-dtTerminoAlterar" class="campo" >
                    </label>
                </div>
                <button class="btn">Alterar</button>

                <div class="msg-alterar"></div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript" src="js/script-semestre.js"></script>
<?php require_once ("footer.php"); ?>

