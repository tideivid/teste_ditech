    <?php require_once '../../config/config.php';?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php
                        if($_SESSION['login']['tipo'] == '1'){
                    ?>

                    <li>
                        <a href="<?php echo URL;?>usuario/">Usuarios</a>
                        <ul class="sub">
                            <li><a href="<?php echo URL;?>usuario/cadastrar" >Cadastrar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo URL;?>sala/">Salas</a>
                        <ul class="sub">
                            <li><a href="<?php echo URL;?>sala/cadastrar" >Cadastrar</a></li>
                        </ul>
                    </li>
                    <?php }?>
                    <li>
                        <a href="<?php echo URL;?>agendamento/">Agendamento</a>
                        <ul class="sub">
                            <li><a href="<?php echo URL;?>agendamento/cadastrar" >Cadastrar</a></li>
                            <li><a href="<?php echo URL;?>agendamento/salas" >Salas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo URL;?>sair">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>