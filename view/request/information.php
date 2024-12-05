<?php
// Pré-processamento dos arrays para acesso rápido
$fieldtypesById = [];
foreach ($fieldtypesDb as $dbType) {
    $fieldtypesById[$dbType['id']] = $dbType;
}

$inputTypesById = [];
foreach ($inputTypes as $type) {
    $inputTypesById[$type['id']] = $type;
}

$responsesByCampo = [];
foreach ($allResponses as $response) {
    $responsesByCampo[$response['campo']][] = $response;
}

// Iteração única sobre $proccessFields
foreach ($proccessFields as $field) {
    // Obter o tipo de campo correspondente
    $dbType = $fieldtypesById[$field['tipo']] ?? null;
    if (!$dbType) {
        continue; // Pular se não houver tipo correspondente
    }

    // Verificar se o tipo_dado existe em $inputTypes
    if (!isset($inputTypesById[$dbType['tipo_dado']])) {
        continue; // Pular se tipo_dado não for válido
    }

    // Obter todas as respostas associadas ao campo
    $responses = $responsesByCampo[$field['id']] ?? [];
    foreach ($responses as $response) {
        ?>
        <div class="card mb-2 p-2">
            <div class="row">
                <h4 style="font-weight:bold !important;" class="col-12"><?= htmlspecialchars($field["nome_exibicao"]) ?></h4>
                <div class="col-12">
                   <h6> <?= htmlspecialchars($response["resposta"]) ?></h6>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
