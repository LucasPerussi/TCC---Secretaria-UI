<?php
use API\Controller\Config;

function select_card($current_selection) {
    $base_url = Config::BASE_URL;

    $selected_style = 'border: 1px solid #00cfe8 !important;';
    $selected_styles = [
        "alunos" => '',
        "servidores" => '',
        "chamados" => '',
        "processos" => '',
    ];
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $is_selected_styles[$page] = $selected_style;
    } else $is_selected_styles['alunos'] = $selected_style;

    echo <<<HTML
    <div class="col-12 col-md-4">
        <div class="m-1 cards-container h-auto">
            <a href="{$base_url}entity-list?page=alunos">
                <div class="card" style="{$is_selected_styles['alunos']}padding:20px; padding-bottom:10px;margin-bottom:10px;">
                    <h5>
                        <i class="bi bi-diagram-3" style="margin-right: 10px;"></i>
                        Alunos
                        <span style="text-align:end;right:20px;position:absolute;font-size:15px;">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </h5>
                </div>
            </a>
            <a href="{$base_url}entity-list?page=servidores">
                <div class="card" style="{$is_selected_styles['servidores']}padding:20px; padding-bottom:10px;margin-bottom:10px;">
                    <h5>
                        <i class="bi bi-diagram-3" style="margin-right: 10px;"></i>
                        Servidores 
                        <span style="text-align:end;right:20px;position:absolute;font-size:15px;">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </h5>
                </div>
            </a>
            <a href="{$base_url}entity-list?page=chamados">
                <div class="card" style="{$is_selected_styles['chamados']}padding:20px; padding-bottom:10px;margin-bottom:10px;">
                    <h5>
                        <i class="bi bi-diagram-3" style="margin-right: 10px;"></i>
                        Chamados
                        <span style="text-align:end;right:20px;position:absolute;font-size:15px;">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </h5>
                </div>
            </a>
            <a href="{$base_url}entity-list?page=processos">
                <div class="card" style="{$is_selected_styles['processos']}padding:20px; padding-bottom:10px;margin-bottom:10px;">
                    <h5>
                        <i class="bi bi-diagram-3" style="margin-right: 10px;"></i>
                        Processos
                        <span style="text-align:end;right:20px;position:absolute;font-size:15px;">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </h5>
                </div>
            </a>
        </div>
    </div>
HTML;
}
?>
