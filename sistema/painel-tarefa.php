<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tarefas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php require_once ("header.php"); ?>
        <main class="main">
            <section class="secao-titulo"> 
                <h1 class="titulo">Minhas Tarefas</h1>
            </section>

            <section class="tipo-tarefa">
                <button class="btn btn-tarefa" onclick="carTarefaPendente()">Tarefas pendentes</button> 
                <button class="btn btn-tarefa" onclick="carTarefaCompleta()">Tarefas completas</button> 
            </section>

            <section class="secao pendente" id="tarefa-pendente">
                <button class="btn btn-link"  onclick="modalCadastrar()"><i class="fa fa-plus"></i></button>
                <h2 class="titulo titulo-2">Tarefas Pendentes</h2>
                <div id="row-tarefaPendente" class="row">
               
                </div>
            </section>

            <section class="secao completa" id="tarefa-completa">
                <h2 class="titulo titulo-2">Tarefas Completas</h2>
                <div id="row-tarefaCompleta" class="row">
                   
                </div>
            </section>

            <div id="modal-cadastrar" class="modal">
                <div class="form-modal">
                    <span id="fechar-cadastro" class="fechar">&times;</span>
                    <h2 class="titulo titulo-2">Cadastro de tarefas</h2>
                    <form id="form" method="POST">
                        <div class="coluna">
                            <div class="linha-campo col-6">
                                <label>Nome da tarefa:<br/>
                                    <input type="text" name="txt-tarefa" id="txt-tarefa" class="campo" placeholder="Insira à tarefa" >
                                </label>
                            </div>
                            <div class="linha-campo col-6">
                                <label>
                                    Tipo de tarefa:<br/>
                                    <select name="slc-tipoTarefa" id="slc-tipoTarefa" class="select">
                                        <option value="T">Trabalho</option>
                                        <option value="P">Prova</option>
                                    </select>
                                </label>
                            </div>

                        </div>
                        <div class="coluna">
                            <div class="linha-campo col-4">
                                <label>
                                    Status:<br/>
                                    <select name="slc-status" id="slc-status" class="select">
                                        <option value="P">Pendente</option>
                                        <option value="C">Completa</option>
                                    </select>
                                </label>
                            </div>
                            <div class="linha-campo col-4">
                                <label>
                                    Disciplina:<br/>
                                    <select name="slc-disciplina" id="slc-disciplina" class="select">

                                    </select>
                                </label>
                            </div>
                            <div class="linha-campo col-4">
                                <label>
                                    Data:<br/>
                                    <input type="date" name="txt-data" id="txt-data" class="campo">
                                </label>
                            </div>
                        </div>

                        <div class="linha-campo">
                            <label>
                                Descrição:<br/>
                                <textarea name="txa-descricao" id="txa-descricao" class="campo area"></textarea>
                            </label>
                        </div>
                        <button class="btn">Cadastrar</button>

                        <div class="msg">

                        </div>
                    </form>
                </div>
            </div>

            <div id="modal-alterar" class="modal">
                <div class="form-modal">
                    <span id="fechar-alterar" class="fechar">&times;</span>
                    <h2 class="titulo titulo-2">Alterar Tarefa</h2>
                    <form id="form-alterar" method="POST">
                        <input type="hidden" name="txt-codigoTarefaAlterar" id="txt-codigoTarefaAlterar">
                        <div class="coluna">
                            <div class="linha-campo col-6">
                                <label>Nome da tarefa:<br/>
                                    <input type="text" name="txt-tarefaAlterar" id="txt-tarefaAlterar" class="campo" placeholder="Insira à tarefa" >
                                </label>
                            </div>
                            <div class="linha-campo col-6">
                                <label>
                                    Tipo de tarefa:<br/>
                                    <select name="slc-tipoTarefaAlterar" id="slc-tipoTarefaAlterar" class="select">
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="coluna">
                            <div class="linha-campo col-4">



                                <label>
                                    Status:<br/>
                                    <select name="slc-statusTarefaAlterar" id="slc-statusTarefaAlterar" class="select">

                                    </select>
                                </label>
                            </div>
                            <div class="linha-campo col-4">
                                <label>
                                    Disciplina:<br/>
                                    <select name="slc-disciplinaAlterar" id="slc-disciplinaAlterar" class="select">

                                    </select>
                                </label>
                            </div>
                            <div class="linha-campo col-4">
                                <label>
                                    Data:<br/>
                                    <input type="date" name="txt-dataAlterar" id="txt-dataAlterar" class="campo">
                                </label>
                            </div>
                        </div>

                        <div class="linha-campo">
                            <label>
                                Descrição:<br/>
                                <textarea name="txa-descricaoAlterar" id="txa-descricaoAlterar" class="campo area"></textarea>
                            </label>
                        </div>
                        <button class="btn">Alterar</button>

                        <div class="msg-alterar">

                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="js/script-tarefa.js"></script>
    </body>
</html>