<?php

use API\Controller\Config;
use const Siler\Config\CONFIG; ?>
<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>
  <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/masterDark.css">

<?php else : ?>
  <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/masterLight.css">
<?php endif; ?>
</style>
<script src="<?= Config::BASE_URL ?>/src/js/theme-controller.js"></script>

<script>
  function criarCookie(nome, valor, expiracaoDias) {
    const dataExpiracao = new Date();
    dataExpiracao.setDate(dataExpiracao.getDate() + expiracaoDias);

    const cookie = `${encodeURIComponent(nome)}=${encodeURIComponent(valor)}; expires=${dataExpiracao.toUTCString()}; path=/`;
    document.cookie = cookie;
  }

  function obterCookie(nome) {
    const cookies = document.cookie.split('; ');

    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].split('=');
      const cookieNome = decodeURIComponent(cookie[0]);
      const cookieValor = decodeURIComponent(cookie[1]);

      if (cookieNome === nome) {
        return cookieValor;
      }
    }

    return null; // Retorna null se o cookie não for encontrado.
  }

  document.addEventListener('DOMContentLoaded', function() {

    // Verifica se existe uma preferência no LocalStorage
    const temaAtual = obterCookie('theme');
    if (temaAtual === "Dark") {
      document.querySelector("body").style.backgroundColor = "#202124 !important";
      changeDark();
    } else {
      document.querySelector("body").style.backgroundColor = "#f2f2f2 !important";
      changeLight();
    }
  });
</script>
