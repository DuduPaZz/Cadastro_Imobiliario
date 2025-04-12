document.addEventListener("DOMContentLoaded", function () {
    const tabelaPessoas = document.getElementById("tabelaPessoas");
    const tabelaImoveis = document.getElementById("tabelaImoveis");

    if (tabelaPessoas) {
        new DataTable(tabelaPessoas, {
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            }
        });
    }

    if (tabelaImoveis) {
        new DataTable(tabelaImoveis, {
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            }
        });
    }
});
