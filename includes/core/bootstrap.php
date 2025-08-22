<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('BASE_PATH', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR);

// Função genérica para carregar páginas do sistema
function page($name) {
    $map = [
        // -- COMPONENTS -- //
        'sidebar'  => 'includes/components/sidebar.php',
        'header'  => 'includes/components/header.php',
        'footer'  => 'includes/components/footer.php',
        'modals'  => 'includes/components/modals.php',

        // -- PRIVATE -- //
        'analytics'   => 'private/analytics.php',
        'historico'   => 'private/historico.php',
        'home'   => 'private/home.php',
        'perfil'   => 'private/perfil.php',
        'simulacao' => 'private/simulacao.php',
    ];

    if (isset($map[$name])) {
        return BASE_PATH . $map[$name];
    }

    throw new Exception("Página/rota '{$name}' não mapeada!");
}

// Atalho para incluir direto
function view($name) {
    return include page($name);
}


?>