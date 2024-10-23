
*** Settings ***

Documentation     Demonstrção do RobotFramework

Test Setup        Abrir browser

Test Teardown     Fechar Browser

Resource          resources.robot



*** Test Cases ***



CT01: Verificar contatos da secretaria online

    [Documentation]  Verifica se os constatos estão sendo corretamente mostrados

    [Tags]    contatos

    Acessar Tela "https://wetalksupport.online/login"

    Acessar página de login

    Verificar se contato é exibido

    Preencher email

    Preencher senha

    logar

    Verificar se logou