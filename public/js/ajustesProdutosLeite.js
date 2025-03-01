document.getElementById('whatsappButton').addEventListener('click', () => {
    const nomeProduto = document.getElementById('modalNomeProduto').innerText;
    const mensagem = encodeURIComponent(`Olá! Tenho interesse no produto: ${nomeProduto}`);
    const numeroWhatsApp = '556782110048'; // Número de WhatsApp com o código do país
    const link = `https://wa.me/${numeroWhatsApp}?text=${mensagem}`;
    window.open(link, '_blank');
});
function abrirModalProduto(event, produto, familiaSacaria, percentualProteina) {
    event.preventDefault();
// Preencher dados no modal
    document.getElementById('modalSacaria').src = `/storage/${familiaSacaria}`;
    document.getElementById('modalSacaria').alt = `Sacaria_${produto.nome}`;
    document.getElementById('modalNomeProduto').innerText = produto.nome;
    document.getElementById('modalDescricaoComercial').innerText = produto.descricao_comercial;
    document.querySelector('#modalIndicacoesUso .usage-text').innerHTML = produto.indicacao_uso || 'N/A';
    document.querySelector('#modalModoUso .usage-text').innerHTML = produto.modo_uso || 'N/A';
// Exibir Estágios
    const estagiosContainer = document.getElementById('estagiosContainer');
    const modalIconesEstagios = document.getElementById('modalIconesEstagios');
    modalIconesEstagios.innerHTML = '';
    if (produto.estagios_animais.length > 0) {
        estagiosContainer.classList.remove('d-none');
        produto.estagios_animais.forEach(estagio => {
            const div = document.createElement('div');
            div.classList.add('mx-2');
            div.innerHTML = `
            <img src="/storage/${estagio.icone}" alt="icone_${estagio.nome}" class="icon-image"/>
            <div class="mt-1" style="font-size: 12px;">${estagio.nome}</div>
        `;
            modalIconesEstagios.appendChild(div);
        });
    } else {
        estagiosContainer.classList.add('d-none');
    }

    // Exibir Períodos
    const periodosContainer = document.getElementById('periodosContainer');
    const modalIconesPeriodos = document.getElementById('modalIconesPeriodos');
    modalIconesPeriodos.innerHTML = '';
    if (produto.periodos.length > 0) {
        periodosContainer.classList.remove('d-none');
        produto.periodos.forEach(periodo => {
            const div = document.createElement('div');
            div.classList.add('mx-2');
            div.innerHTML = `
            <img src="/storage/${periodo.icone}" alt="icone_${periodo.nome}" class="icon-image"/>
            <div class="mt-1" style="font-size: 12px;">${periodo.nome}</div>
        `;
            modalIconesPeriodos.appendChild(div);
        });
    } else {
        periodosContainer.classList.add('d-none');
    }

// Exibir Composição
    const composicaoContainer = document.getElementById('composicaoContainer');
    const modalProteinaBruta = document.getElementById('modalProteinaBruta');
    const modalUreia = document.getElementById('modalUreia');
    const modalAditivos = document.getElementById('modalAditivos');
    let temComposicao = false;
    modalProteinaBruta.innerHTML = '';
    if (produto.nutrientes.some(n => n.id === 21)) {
        modalProteinaBruta.innerHTML = `
        <img src="img/proteina.png" alt="icone_Proteína Bruta" class="icon-image"/>
        <div class="mt-1" style="font-size: 12px;">${percentualProteina}% de Proteína Bruta</div>
    `;
        temComposicao = true;
    }

    if (produto.nutrientes.some(n => n.id === 19)) {
        modalUreia.classList.remove('d-none');
        temComposicao = true;
    } else {
        modalUreia.classList.add('d-none');
    }

    if (produto.nutrientes.some(n => n.id === 17) || produto.nutrientes.some(n => n.id === 23)) {
        modalAditivos.classList.remove('d-none');
        temComposicao = true;
    } else {
        modalAditivos.classList.add('d-none');
    }

    if (temComposicao) {
        composicaoContainer.classList.remove('d-none');
    } else {
        composicaoContainer.classList.add('d-none');
    }

// Abrir o modal
    const produtoModal = new bootstrap.Modal(document.getElementById('produtoModal'));
    produtoModal.show();
}

let filtroPronto = true;
let filtroEstagio = null;
let filtroFamilia = null;
let filtroTipoBezerros = null;
let filtroTipoRecria = null;
let filtroTipoLactacao = null;
let filtroTipoMistura = null;
let filtroProteina = null;
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnProntoParaUso').classList.add('btn-primary');
    document.getElementById('filtrosEstagioAnimal').classList.remove('d-none');
    aplicarFiltros();
});
function filtrarPorPronto(pronto) {
    filtroPronto = pronto;
    const filtrosEstagioAnimal = document.getElementById('filtrosEstagioAnimal');
    if (pronto) {
        filtrosEstagioAnimal.classList.remove('d-none');
        document.getElementById('filtrosAdicionaisMistura').classList.add('d-none');
    } else {
        filtroEstagio = null;
        document.getElementById('filtrosAdicionaisMistura').classList.remove('d-none');
        filtrosEstagioAnimal.classList.add('d-none');
        filtroPronto = false;
    }

    resetarFiltrosEspeciais();
    aplicarFiltros();
}

function filtrarPorEstagio(estagio) {
    filtroEstagio = estagio;
    resetarFiltrosEspeciais();

    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    if (estagio === 'recria') {
        document.getElementById('filtrosAdicionaisRecria').classList.remove('d-none');
    } else if (estagio === 'lactação') {
        document.getElementById('filtrosAdicionaisLactacao').classList.remove('d-none');
    }
    aplicarFiltros();
}

function filtrarPorFamilia(familia) {
    resetaActive('.botoesFamilia');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroFamilia = familia;
    aplicarFiltros();
}

function filtrarPorTipoBezerros(tipo) {
    resetaActive('.botoesBezerros');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroTipoBezerros = tipo;
    aplicarFiltros();
}

function filtrarPorTipoRecria(tipo) {
    resetaActive('.botoesRecria');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroTipoRecria = tipo;
    aplicarFiltros();
}

function filtrarPorTipoLactacao(tipo) {
    resetaActive('.botoesLactacao');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroTipoLactacao = tipo;
    filtroProteina = null;
    aplicarFiltros();
}

function filtrarProteina(valor) {
    resetaActive('.botoesProteina');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroProteina = valor;
    aplicarFiltros();
}

function filtrarPorTipoMistura(tipo) {
    resetaActive('.botoesMistura');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroTipoMistura = tipo;
    filtroPronto = false;
    aplicarFiltros();
}

function aplicarFiltros() {
    const produtos = document.querySelectorAll('.produto-item');
    const spinner = document.getElementById("loadingSpinner");
    const listaProdutos = document.getElementById("listaProdutos");
    // Mostra o spinner
    spinner.classList.remove("d-none");
    listaProdutos.style.opacity = 0;
    produtos.forEach(produto => {
        const nomeProduto = produto.getAttribute('data-nome').trim().toLowerCase();
        const isPronto = produto.getAttribute('data-pronto') === '1';
        const estagios = produto.getAttribute('data-estagios').toLowerCase().split(',');
        const familia = produto.getAttribute('data-familia');
        const passaFiltroPronto = filtroPronto === null || filtroPronto === isPronto;
        const passaFiltroEstagio = filtroEstagio === null || estagios.includes(filtroEstagio);
        const passaFiltroFamilia = filtroFamilia === null || familia === filtroFamilia;

        let passaFiltroTipoBezerros = true;
        if (filtroEstagio === 'bezerros') {
            if (filtroTipoBezerros === 'proteinados') {
                passaFiltroTipoBezerros = ['baby beef creep', 'acelera bezerro'].includes(nomeProduto);
            } else if (filtroTipoBezerros === 'racoes') {
                passaFiltroTipoBezerros = ['baby beef performance'].includes(nomeProduto);
            }
        }

        let passaFiltroTipoRecria = true;
        if (filtroEstagio === 'recria') {
            if (filtroTipoRecria === 'linha branca') {
                passaFiltroTipoRecria = familia === 'pasto';
            } else if (filtroTipoRecria === 'minerais adensados') {
                passaFiltroTipoRecria = familia === 'supremo';
            } else if (filtroTipoRecria === 'proteinados') {
                passaFiltroTipoRecria = ['acelera', 'desempenho', 'força'].includes(familia);
            }
        }

        let passaFiltroTipoLactacao = true;
        if (filtroEstagio === 'lactação') {
            if (filtroTipoLactacao === 'semureia') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 24',
                    'fortlac performance 22',
                    'fortlac performance 18',
                    'fortlac excelência 24',
                    'fortlac excelência 22',
                    'fortlac mix 24',
                    'fortlac mix 22'
                ].includes(nomeProduto);
                document.getElementById('filtrosAdicionaisProteinaSem').classList.remove('d-none');
                document.getElementById('filtrosAdicionaisProteinaCom').classList.add('d-none');
            } else if (filtroTipoLactacao === 'comureia') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 24 com ureia',
                    'fortlac performance 22 com ureia',
                    'fortlac excelência 24 com ureia',
                    'fortlac excelência 22 com ureia',
                    'fortlac mix 24 com ureia',
                    'fortlac mix 22 com ureia'
                ].includes(nomeProduto);
                document.getElementById('filtrosAdicionaisProteinaCom').classList.remove('d-none');
                document.getElementById('filtrosAdicionaisProteinaSem').classList.add('d-none');
            } else if (filtroTipoLactacao === 'minerais') {
                passaFiltroTipoLactacao = [
                    'fortlac balde branco',
                    'pasto cria',
                    'supremo vantage',
                    'supremo vantage nitro'
                ].includes(nomeProduto);
                document.getElementById('filtrosAdicionaisProteinaSem').classList.add('d-none');
                document.getElementById('filtrosAdicionaisProteinaCom').classList.add('d-none');
            }
        }

        let passaFiltroProteina = true;
        if (filtroEstagio === 'lactação') {
            if (filtroProteina === '24sem') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 24',
                    'fortlac excelência 24',
                    'fortlac mix 24'
                ].includes(nomeProduto);
            } else if (filtroProteina === '22sem') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 22',
                    'fortlac excelência 22',
                    'fortlac mix 22'
                ].includes(nomeProduto);
            } else if (filtroProteina === '18sem') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 18'
                ].includes(nomeProduto);
            } else if (filtroProteina === '24com') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 24 com ureia',
                    'fortlac excelência 24 com ureia',
                    'fortlac mix 24 com ureia'
                ].includes(nomeProduto);
            } else if (filtroProteina === '22com') {
                passaFiltroTipoLactacao = [
                    'fortlac performance 22 com ureia',
                    'fortlac excelência 22 com ureia',
                    'fortlac mix 22 com ureia'
                ].includes(nomeProduto);
            }
        }

        let passaFiltroTipoMistura = true;
        if (!filtroPronto) {
            if (filtroTipoMistura === 'nucleos') {
                passaFiltroTipoMistura = familia === 'nucleobeef';
            } else if (filtroTipoMistura === 'concentrados') {
                passaFiltroTipoMistura = ['protbeef', 'confbeef'].includes(familia);
            }
        }

        produto.style.display = passaFiltroPronto && passaFiltroEstagio && passaFiltroFamilia && passaFiltroTipoBezerros && passaFiltroTipoRecria && passaFiltroProteina && passaFiltroTipoLactacao && passaFiltroTipoMistura ? 'block' : 'none';
    });
    setTimeout(() => {
        spinner.classList.add("d-none");
        listaProdutos.style.opacity = 1;
    }, 800); // Tempo de simulação de carregamento
}

function resetarFiltrosEspeciais() {
    filtroFamilia = null;
    filtroTipoBezerros = null;
    filtroTipoRecria = null;
    filtroTipoLactacao = null;
    filtroProteina = null;
    document.getElementById('filtrosAdicionaisCria').classList.add('d-none');
    document.getElementById('filtrosAdicionaisBezerros').classList.add('d-none');
    document.getElementById('filtrosAdicionaisRecria').classList.add('d-none');
    document.getElementById('filtrosAdicionaisLactacao').classList.add('d-none');
    document.getElementById('filtrosAdicionaisProteinaSem').classList.add('d-none');
    document.getElementById('filtrosAdicionaisProteinaCom').classList.add('d-none');
    resetaActive('.btn');
}

function resetaActive(classe) {
    const buttons = document.querySelectorAll(classe); // Seleciona todos os elementos com a classe 'btn'
    buttons.forEach(button => {
        button.classList.remove('active'); // Remove a classe 'active' se existir
    });
}