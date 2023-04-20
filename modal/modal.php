


<!-- Modal coluna 02-->
<div class="modal fade bd-example-modal-lg<?php echo $totem["id_totem"]; ?>" tabindex="-1" role="dialog" aria-labelledby="carTotemModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="bd-example-modal-lg<?php echo $totem["id_totem"]; ?>">Totem Bélem</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-secondary text-left" role="alert">
                                                    <?php
                                                    echo '<strong>IP: </strong>'     . $totem["ip_totem"]    . '<br>';
                                                    echo '<strong>LOCALIDADE: </strong>'   . $totem["totem"] . '<br>';
                                                    ?>
                                                </div>
                                            <div class="modal-body text-dark text-left">

                                               
                                            <ul class="nav nav-tabs" id="myTab<?php echo $totem["id_totem"]; ?>" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home<?php echo $totem["id_totem"]; ?>" role="tab" aria-controls="home" aria-selected="true">Eventos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#perfil<?php echo $totem["id_totem"]; ?>" role="tab" aria-controls="profile" aria-selected="false">Preventivas</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tab-content" id="myTab<?php echo $totem["id_totem"]; ?>Content">

                                            <div class="tab-pane fade show active" id="home<?php echo $totem["id_totem"]; ?>" role="tabpanel" aria-labelledby="home-tab">

                                                <div class="row text-center">
                                                    <div class="col-6 ml-auto">
                                                        <div class="alert alert-danger" role="alert"><strong>DATAS FALHA DE PING</strong></div>

                                                        <?php

                                                        $query2 = $conexao->query("SELECT * FROM datadow WHERE id_totem = $id_totem AND dataDow IS NOT NULL ORDER BY dataDow DESC");
                                                        $rest_datadow = $query2->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($rest_datadow as $totens) {
                                                           
                                                            echo "<strong>" . $totens['dataDow'] . "</strong>" . '<br>';
                                                        } ?>

                                                    </div>

                                                    <div class="col-6 ml-auto">
                                                        <div class="alert alert-success" role="alert"><strong>HORA DA RECUPERAÇÃO</strong></div>

                                                        <?php
                                                        //echo '------' . '<br>';

                                                        $query2 = $conexao->query("SELECT * FROM datadow WHERE id_totem = $id_totem AND dataUP IS NOT NULL ORDER BY dataUP DESC");
                                                        $rest_datadow = $query2->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($rest_datadow as $totens) {
                                                            echo '<strong>' . $totens['dataUp'] . '<br> </strong>';
                                                        } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="perfil<?php echo $totem["id_totem"]; ?>" role="tabpanel" aria-labelledby="profile-tab">2...</div>
                                            
                                            </div>

                                            </div>

                                            <div class="modal-footer text-dark text-left">&copy;Criativa 2023 | Suporte e Monitoramento
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="40" height="40" fill="#000">
                                                    <path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!-- FIM Modal coluna 02-->