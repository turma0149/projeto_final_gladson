// PROJETO USANDO JQUERY

$(document).ready(function () {
  // Aplica as máscaras nos campos
  aplicarMascaras();

  // Configura a validação e o envio
  validarFormulario();
});

function aplicarMascaras() {
  // CPF no formato: 000.000.000-00
  $("#cpf").mask("000.000.000-00");

  // Telefone no formato: (31) 99999-9999
  $("#telefone").mask("(00) 00000-0000");
}

function validarFormulario() {
  // Seleciona a div responsável pelas mensagens
  const mensagem = document.getElementById("mensagem");

  // Impede o formulário de recarregar a página
  $("#formCliente").on("submit", function (evento) {
    evento.preventDefault();
  });

  // Configura o jQuery Validation
  $("#formCliente").validate({
    // Regras de validação
    rules: {
      nome: {
        required: true,
        minlength: 3,
        maxlength: 100,
      },
      cpf: {
        required: true,
        minlength: 14,
        maxlength: 14,
      },
      email: {
        required: true,
        email: true,
      },
      telefone: {
        required: true,
        minlength: 15,
        maxlength: 15,
      },
    },

    // Mensagens em português
    messages: {
      nome: {
        required: "Informe o nome do cliente.",
        minlength: "O nome deve ter pelo menos 3 caracteres.",
        maxlength: "O nome deve ter no máximo 100 caracteres.",
      },

      cpf: {
        required: "Informe o CPF do cliente.",
        minlength: "Informe um CPF válido.",
        maxlength: "Informe um CPF válido.",
      },

      email: {
        required: "Informe o e-mail do cliente.",
        email: "Informe um e-mail válido.",
      },

      telefone: {
        required: "Informe o telefone do cliente.",
        minlength: "Informe um telefone válido.",
        maxlength: "Informe um telefone válido.",
      },
    },

    // Mensagens de erro
    errorPlacement: function (error, element) {
      element.closest(".mb-3").find(".invalid-feedback").text(error.text());
    },

    // Executado quando o campo está inválido
    highlight: function (element) {
      $(element).removeClass("is-valid").addClass("is-invalid");
    },

    // Executado quando o campo está válido
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    },

    // Executado somente quando todos os campos forem válidos
    submitHandler: async function (formulario) {
      // Captura os dados do formulário
      const dados = new FormData(formulario);

      /*
       * Remove a máscara do CPF:
       * Formato exibido: 000.000.000-00
       * Formato enviado: 00000000000
       */
      const cpf = $("#cpf").val().replace(/\D/g, "");

      /*
       * Remove a máscara do telefone:
       * Formato exibido: (31) 99999-9999
       * Formato enviado: 31999999999
       */
      const telefone = $("#telefone").val().replace(/\D/g, "");

      // Substitui os valores mascarados pelos valores sem máscara
      dados.set("cpf", cpf);
      dados.set("telefone", telefone);

      // Mostra os dados no console
      console.table(Object.fromEntries(dados.entries()));

      // Exibe mensagem enquanto envia
      mensagem.className = "alert alert-info mt-3";
      mensagem.textContent = "Enviando dados...";

      try {
        // Envia os dados para o Controller
        const resposta = await fetch("controllers/ClienteController.php", {
          method: "POST",
          body: dados,
        });

        // Converte a resposta JSON
        const resultado = await resposta.json();

        // console.log(resultado);

        // Verifica se ocorreu erro HTTP
        if (!resposta.ok) {
          mensagem.className = "alert alert-danger mt-3";

          let conteudo = `<strong>${resultado.mensagem}</strong>`;

          if (resultado.erros) {
            conteudo += "<ul class='mb-0 mt-2'>";

            Object.entries(resultado.erros).forEach(function ([campo, erros]) {
              erros.forEach(function (erro) {
                conteudo += `<li>${erro}</li>`;
              });
            });

            conteudo += "</ul>";
          }

          mensagem.innerHTML = conteudo;

          return;
        }

        // Exibe mensagem de sucesso
        mensagem.className = "alert alert-success mt-3";
        mensagem.textContent = resultado.mensagem;

        // Limpa os campos
        formulario.reset();
      } catch (erro) {
        mensagem.className = "alert alert-danger mt-3";

        mensagem.textContent =
          "Erro ao enviar os dados para o controller de cliente.";

        console.error(erro);
      }
    },
  });

  // Quando o formulário for limpo
  $("#formCliente").on("reset", function () {
    // Remove as classes de validação
    $(this).find(".form-control").removeClass("is-valid is-invalid");
  });
}
