<!-- =========================================================
     CSS DA PÁGINA
========================================================= -->

<link rel="stylesheet" href="assets/css/evento.css">

<!-- Bootstrap Icons -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>


<!-- =========================================================
     PÁGINA DE CADASTRO DE EVENTO
========================================================= -->

<section class="evento-page">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10 col-xl-9">


                <!-- =================================================
                     CARD PRINCIPAL
                ================================================== -->

                <div class="evento-card">


                    <!-- =================================================
                         CABEÇALHO DO CARD
                    ================================================== -->

                    <div class="evento-header">


                        <!-- ÍCONE -->

                        <div class="evento-icon">

                            <i class="bi bi-calendar-event"></i>

                        </div>


                        <!-- TÍTULO -->

                        <div>

                            <h1>
                                Cadastro de Evento
                            </h1>

                            <p>
                                Divulgue seu evento e conecte-se com a cidade.
                            </p>

                        </div>


                        <!-- BOTÃO FECHAR -->

                        <button
                            type="button"
                            class="btn-fechar"
                            onclick="history.back()"
                            aria-label="Fechar"
                        >

                            <i class="bi bi-x-lg"></i>

                        </button>


                    </div>


                    <!-- =================================================
                         CORPO DO FORMULÁRIO
                    ================================================== -->

                    <div class="evento-body">


                        <!-- =================================================
                             FORMULÁRIO
                        ================================================== -->

                        <form
                            id="formEvento"
                            enctype="multipart/form-data"
                        >


                            <!-- =============================================
                                 CAMPOS OCULTOS DO CRUD
                            ============================================== -->

                            <input
                                type="hidden"
                                id="id"
                                name="id"
                            >

                            <input
                                type="hidden"
                                id="acao"
                                name="acao"
                                value="cadastrar"
                            >


                            <!-- =================================================
                                 INFORMAÇÕES DO EVENTO
                            ================================================== -->

                            <div class="section-title">

                                <i class="bi bi-info-circle"></i>

                                <span>
                                    Informações do evento
                                </span>

                            </div>


                            <div class="row">


                                <!-- NOME DO EVENTO -->

                                <div class="col-md-8 mb-3">

                                    <label
                                        for="nomeEvento"
                                        class="form-label"
                                    >

                                        Nome do Evento
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-calendar2-event"></i>

                                        </span>


                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nomeEvento"
                                            name="nomeEvento"
                                            placeholder="Digite o nome do evento"
                                            maxlength="100"
                                        >

                                    </div>

                                </div>


                                <!-- CATEGORIA -->

                                <div class="col-md-4 mb-3">

                                    <label
                                        for="categoria"
                                        class="form-label"
                                    >

                                        Categoria
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-tags"></i>

                                        </span>


                                        <select
                                            class="form-select"
                                            id="categoria"
                                            name="categoria"
                                        >

                                            <option value="">
                                                Selecione
                                            </option>

                                            <option value="Show">
                                                Show
                                            </option>

                                            <option value="Festival">
                                                Festival
                                            </option>

                                            <option value="Esportivo">
                                                Esportivo
                                            </option>

                                            <option value="Cultural">
                                                Cultural
                                            </option>

                                            <option value="Feira">
                                                Feira
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>


                            <!-- =================================================
                                 DATA E HORÁRIO
                            ================================================== -->

                            <div class="row">


                                <!-- DATA -->

                                <div class="col-md-6 mb-3">

                                    <label
                                        for="dataEvento"
                                        class="form-label"
                                    >

                                        Data
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-calendar3"></i>

                                        </span>


                                        <input
                                            type="date"
                                            class="form-control"
                                            id="dataEvento"
                                            name="dataEvento"
                                        >

                                    </div>

                                </div>


                                <!-- HORÁRIO -->

                                <div class="col-md-6 mb-3">

                                    <label
                                        for="horaEvento"
                                        class="form-label"
                                    >

                                        Horário
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-clock"></i>

                                        </span>


                                        <input
                                            type="time"
                                            class="form-control"
                                            id="horaEvento"
                                            name="horaEvento"
                                        >

                                    </div>

                                </div>

                            </div>


                            <!-- =================================================
                                 LOCAL
                            ================================================== -->

                            <div class="mb-3">

                                <label
                                    for="localEvento"
                                    class="form-label"
                                >

                                    Local
                                    <span>*</span>

                                </label>


                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-geo-alt"></i>

                                    </span>


                                    <input
                                        type="text"
                                        class="form-control"
                                        id="localEvento"
                                        name="localEvento"
                                        placeholder="Ex.: Praça da Glória"
                                        maxlength="150"
                                    >

                                </div>

                            </div>


                            <!-- =================================================
                                 DESCRIÇÃO
                            ================================================== -->

                            <div class="mb-4">

                                <label
                                    for="descricaoEvento"
                                    class="form-label"
                                >

                                    Descrição
                                    <span>*</span>

                                </label>


                                <textarea
                                    class="form-control"
                                    rows="5"
                                    id="descricaoEvento"
                                    name="descricaoEvento"
                                    placeholder="Descreva o evento, atrações, informações importantes..."
                                    maxlength="500"
                                ></textarea>


                                <div class="descricao-info">

                                    Máximo de 500 caracteres.

                                </div>

                            </div>


                            <!-- =================================================
                                 DADOS DO ORGANIZADOR
                            ================================================== -->

                            <div class="section-title">

                                <i class="bi bi-person-badge"></i>

                                <span>
                                    Dados do organizador
                                </span>

                            </div>


                            <div class="row">


                                <!-- ORGANIZADOR -->

                                <div class="col-md-6 mb-3">

                                    <label
                                        for="organizador"
                                        class="form-label"
                                    >

                                        Organizador
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-person"></i>

                                        </span>


                                        <input
                                            type="text"
                                            class="form-control"
                                            id="organizador"
                                            name="organizador"
                                            placeholder="Nome do organizador"
                                            maxlength="100"
                                        >

                                    </div>

                                </div>


                                <!-- CONTATO -->

                                <div class="col-md-6 mb-3">

                                    <label
                                        for="contato"
                                        class="form-label"
                                    >

                                        Contato
                                        <span>*</span>

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">

                                            <i class="bi bi-telephone"></i>

                                        </span>


                                        <input
                                            type="tel"
                                            class="form-control"
                                            id="contato"
                                            name="contato"
                                            placeholder="(31) 99999-9999"
                                        >

                                    </div>

                                </div>

                            </div>


                            <!-- =================================================
                                 IMAGEM
                            ================================================== -->

                            <div class="section-title">

                                <i class="bi bi-image"></i>

                                <span>
                                    Imagem do evento
                                </span>

                            </div>


                            <div class="upload-area mb-4">

                                <i class="bi bi-cloud-arrow-up upload-icon"></i>

                                <h3>
                                    Adicione o banner do evento
                                </h3>

                                <p>
                                    Escolha uma imagem para representar seu evento.
                                </p>


                                <input
                                    type="file"
                                    class="form-control"
                                    id="imagemEvento"
                                    name="imagemEvento"
                                    accept="image/*"
                                >


                                <small>

                                    Formatos aceitos:
                                    JPG, JPEG, PNG ou WEBP.

                                </small>

                            </div>


                            <!-- =================================================
                                 MENSAGEM
                            ================================================== -->

                            <div
                                id="mensagem"
                                class="alert d-none"
                                role="alert"
                            >
                            </div>


                            <!-- =================================================
                                 BOTÕES
                            ================================================== -->

                            <div class="form-actions">


                                <button
                                    type="submit"
                                    class="btn btn-evento"
                                >

                                    <i class="bi bi-check-circle me-2"></i>

                                    Cadastrar Evento

                                </button>


                                <button
                                    type="reset"
                                    class="btn btn-limpar"
                                >

                                    <i class="bi bi-arrow-counterclockwise me-2"></i>

                                    Limpar

                                </button>


                            </div>


                        </form>

                    </div>

                </div>


                <!-- =================================================
                     TABELA DE EVENTOS
                ================================================== -->

                <div class="evento-card mt-4">


                    <!-- CABEÇALHO -->

                    <div class="evento-header">

                        <div class="evento-icon">

                            <i class="bi bi-list-ul"></i>

                        </div>


                        <div>

                            <h2>
                                Eventos cadastrados
                            </h2>

                            <p>
                                Consulte, edite ou exclua os eventos cadastrados.
                            </p>

                        </div>

                    </div>


                    <!-- CORPO -->

                    <div class="evento-body">


                        <div class="table-responsive">


                            <table
                                class="table table-hover align-middle"
                                id="tabelaEventos"
                            >


                                <thead>

                                    <tr>

                                        <th>
                                            ID
                                        </th>

                                        <th>
                                            Evento
                                        </th>

                                        <th>
                                            Categoria
                                        </th>

                                        <th>
                                            Data
                                        </th>

                                        <th>
                                            Horário
                                        </th>

                                        <th>
                                            Local
                                        </th>

                                        <th class="text-center">
                                            Ações
                                        </th>

                                    </tr>

                                </thead>


                                <!-- =========================================
                                     O JAVASCRIPT MONTA AS LINHAS
                                ========================================== -->

                                <tbody>

                                </tbody>


                            </table>


                        </div>


                    </div>


                </div>


                <!-- =================================================
                     VOLTAR
                ================================================== -->

                <div class="text-center mt-4">

                    <a
                        href="index.php"
                        class="back-link"
                    >

                        <i class="bi bi-arrow-left me-1"></i>

                        Voltar para página inicial

                    </a>

                </div>


            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->


<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</script>


<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js">
</script>


<!-- jQuery Validation -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
</script>


<!-- jQuery Validation - métodos adicionais -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js">
</script>


<!-- jQuery Mask -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js">
</script>


<!-- Script da página -->

<script src="assets/js/eventos.js"></script>