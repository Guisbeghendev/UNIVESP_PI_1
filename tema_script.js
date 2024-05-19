// script de alternância de tema
function toggleTheme() {
    var lightTheme = document.getElementById("light-theme");
    var darkTheme = document.getElementById("dark-theme");

    if (lightTheme.disabled) {
        lightTheme.disabled = false;
        darkTheme.disabled = true;
        updateCustomProperties(true); // Aplica as propriedades para o tema claro
    } else {
        lightTheme.disabled = true;
        darkTheme.disabled = false;
        updateCustomProperties(false); // Aplica as propriedades para o tema escuro
    }
}

// função para atualizar as propriedades CSS personalizadas
function updateCustomProperties(isLightTheme) {
    var root = document.documentElement;

    if (isLightTheme) {
        // Aplica as propriedades para o tema claro
        root.style.setProperty('--background-color', '#ffffff');
        root.style.setProperty('--text-color', '#000000');
        // Adicione outras variáveis conforme necessário
    } else {
        // Aplica as propriedades para o tema escuro
        root.style.setProperty('--background-color', '#000000');
        root.style.setProperty('--text-color', '#ffffff');
        // Adicione outras variáveis conforme necessário
    }
}

