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
let filtroTipoEngorda = null;
let filtroTipoMistura = null;
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('filtrosEstagioAnimal').classList.remove('d-none');
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
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe
}

function filtrarPorEstagio(estagio) {
    filtroEstagio = estagio;
    resetarFiltrosEspeciais();

    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe
    if (estagio === 'cria') {
        document.getElementById('filtrosAdicionaisCria').classList.remove('d-none');
    } else if (estagio === 'bezerros') {
        document.getElementById('filtrosAdicionaisBezerros').classList.remove('d-none');
    } else if (estagio === 'recria') {
        document.getElementById('filtrosAdicionaisRecria').classList.remove('d-none');
    } else if (estagio === 'engorda') {
        document.getElementById('filtrosAdicionaisEngorda').classList.remove('d-none');
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

function filtrarPorTipoEngorda(tipo) {
    resetaActive('.botoesEngorda');
    const button = document.activeElement; // Obtém o botão que disparou o evento

    // Manipular classes do botão
    button.classList.add('active'); // Adiciona uma nova classe

    filtroTipoEngorda = tipo;
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

        let passaFiltroTipoEngorda = true;
        if (filtroEstagio === 'engorda') {
            if (filtroTipoEngorda === 'proteinados') {
                passaFiltroTipoEngorda = familia === 'acelera';
            } else if (filtroTipoEngorda === 'racoes') {
                passaFiltroTipoEngorda = familia === 'fortbeef' && !nomeProduto.includes('total');
            } else if (filtroTipoEngorda === 'dieta total') {
                passaFiltroTipoEngorda = familia === 'fortbeef' && nomeProduto.includes('total');
            } else if (filtroTipoEngorda === 'linha branca') {
                passaFiltroTipoEngorda = familia === 'pasto';
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

        produto.style.display = passaFiltroPronto && passaFiltroEstagio && passaFiltroFamilia && passaFiltroTipoBezerros && passaFiltroTipoRecria && passaFiltroTipoEngorda && passaFiltroTipoMistura ? 'block' : 'none';
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
    filtroTipoEngorda = null;
    document.getElementById('filtrosAdicionaisCria').classList.add('d-none');
    document.getElementById('filtrosAdicionaisBezerros').classList.add('d-none');
    document.getElementById('filtrosAdicionaisRecria').classList.add('d-none');
    document.getElementById('filtrosAdicionaisEngorda').classList.add('d-none');
    resetaActive('.btn');
}

function resetaActive(classe) {
    const buttons = document.querySelectorAll(classe); // Seleciona todos os elementos com a classe 'btn'
    buttons.forEach(button => {
        button.classList.remove('active'); // Remove a classe 'active' se existir
    });
}