*** Settings ***

Documentation    Resources dos testes da Secretaria Online

Library  SeleniumLibrary



*** Variables ***

#Comentario faz assim

${EMAIL}                GRR11111111

${SENHA}                123

${TEXTO_PAG_LOGIN}      //span[contains(.,'Entrar com Email')]

${LINK_LOGIN}           //a[@class='btn btn-info w-100 waves-effect waves-float waves-light'][contains(.,'Entrar com Email')]

${LABEL_LOGIN}         //span[contains(.,'Login')]



*** Keywords ***

Abrir browser

    Open Browser     browser=chrome

    Maximize Browser Window



Fechar browser

    Capture Page Screenshot

    Close Browser



Acessar Tela "${URL}"

    Go To                             ${URL}

    Wait Until Element Is Visible     ${TEXTO_PAG_LOGIN}  



Acessar página de login

    Click Element    locator=${LINK_LOGIN}



Verificar se contato é exibido

    Element Should Be Visible    locator=${LABEL_LOGIN}    



Preencher email

    Input Text    locator=//input[contains(@type,'text')]    text=perussilucas@hotmail.com



Preencher senha

    Input Password    locator=//input[contains(@type,'password')]    password=Josi@nep1979



logar

    Click Button    locator=//button[@class='btn btn-primary w-100 waves-effect waves-float waves-light'][contains(.,'Entrar')]



Verificar se logou

    Wait Until Element Is Visible  locator=//h1[contains(.,'Encontre tudo que você precisa saber para ter reuniões de sucesso!')]





