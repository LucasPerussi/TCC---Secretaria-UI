
# TCC - Secretaria UI

Projeto desenvolvido em PHP para a Secretaria, baseado no repositório [TCC---Secretaria-UI](https://github.com/LucasPerussi/TCC---Secretaria-UI.git).

## 📋 Descrição

Este projeto é um clone do repositório [LucasPerussi/TCC---Secretaria-UI](https://github.com/LucasPerussi/TCC---Secretaria-UI.git). Ele fornece uma interface de usuário para a Secretaria, permitindo a gestão eficiente de diversas funcionalidades administrativas.

## 🚀 Tecnologias Utilizadas

- PHP
- Composer
- [Outras tecnologias relevantes, se houver]

## 🛠️ Instalação

Siga os passos abaixo para configurar o projeto localmente:

### 1. Clone o Repositório

```bash
git clone https://github.com/LucasPerussi/TCC---Secretaria-UI.git
```

### 2. Acesse o Diretório do Projeto

```bash
cd TCC---Secretaria-UI
```

### 3. Instale as Dependências com Composer

Certifique-se de ter o [Composer](https://getcomposer.org/) instalado em sua máquina. Em seguida, execute:

```bash
composer install
```

### 4. Configuração do Arquivo `Config.controller.php`

É necessário inserir o arquivo `Config.controller.php` no diretório `controller/`. Crie o arquivo `Config.controller.php` com o seguinte conteúdo:

```php
<?php
namespace API\Controller;

class Config
{
    // O IP local de sua máquina
    const BASE_URL = "http://192.168.0.28/tcc-ui/";
    const DOMINIO = "/wejourney/";

    // Caso esteja usando a API localmente
    // const API_URL = "localhost:3000/";
    // Caso esteja usando a API online
    const API_URL = "https://tcc-secretaria-api-zs8ke.ondigitalocean.app/";

    const LOGIN_PAGE = self::BASE_URL . "login";
    const BASE_ACTION_URL = self::BASE_URL . "action";
    const BASE_CSS = self::BASE_URL . "src/css/";
    const BASE_JS = self::BASE_URL . "src/js/";
    const HOME_URL = self::BASE_URL . "dashboard";
    const BASE_PATH_JS = "src/js/";
    const SERVERNAME = "localhost";
}
```

**Passos para Configuração:**

1. **Crie o Arquivo:**

   Navegue até o diretório `controller/` e crie um novo arquivo chamado `Config.controller.php`.

2. **Adicione o Conteúdo:**

   Copie e cole o código acima no arquivo criado.

3. **Ajuste as Constantes:**

   - **BASE_URL:** Altere para o IP local da sua máquina onde o projeto será executado.
   - **API_URL:** Escolha entre usar a API local ou a online, comentando/descomentando conforme necessário.

## 🔧 Executando o Projeto

Após a configuração, você pode iniciar o servidor localmente. Se estiver usando o PHP embutido, execute:

```bash
php -S localhost:8000
```

Acesse o projeto através do navegador em `http://localhost:8000`.

## 🤝 Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests para melhorar este projeto.

## 📄 Licença

Este projeto está licenciado sob a licença [MIT](LICENSE).

## 📞 Contato

Para mais informações, entre em contato através do [seu-email@example.com](mailto:seu-email@example.com).

---

*Este README foi gerado para auxiliar na configuração e utilização do projeto TCC - Secretaria UI.*
