

<?php 
// Recebe os dados do Formulario;
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT)
?>
 <!-- Incio Fomulario -->
 <form id="form" class="form-row" method="POST" action="">
                <div class="form-row">
                    <?php
                    $data_inicio_atual =  date('Y-m-d');
                    if (isset($dados['data_inicio'])) {
                        $data_inicio_atual = $dados['data_inicio'];
                    } ?>

                    <div class="col">
                        <!-- <label class="input-group-text" title="Data Inicio"><strong>Data Incio</strong></label> -->
                        <input type="date" name="data_inicio" value="<?php echo $data_inicio_atual ?>" class="form-control form-control-sm" required="required">
                        <!-- <div class="col"> -->
                    </div>
                    <br>

                    <!-- </div> -->
                    <!-- <div class="col"> -->
                    <?php
                    //$data_atual =  date('Y-m-d');
                    if (isset($dados['data_fim'])) {
                        $data_atual = $dados['data_fim'];
                        if ($data_atual > date('Y-m-d') OR $data_atual < $data_inicio_atual) { ?>
                            <script>
                                alert('Operação invalida !!');
                            </script>
                    <?php
                            header("Refresh:0");
                            die();
                        }
                    }
                    ?>
                    <div class="col">
                        <!-- <label class="input-group-text" title="Data Final"><strong>Data Final</strong></label>     -->
                        <input type="date" name="data_fim" value="<?php echo $data_atual ?>" class="form-control form-control-sm" required="required">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-sm" onclick="bootstrapAlert()" type="submit" value="Pesquisar" name="PesqEntreData">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            Pesquisar</button>
                    </div>
            </form>
            <!-- Final Fomulario-->