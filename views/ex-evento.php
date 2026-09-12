<!doctype html>
<html lang="pt-BR">

<!-- =========================================================
     CSS DA PÁGINA
========================================================= -->

<link rel="stylesheet" href="assets/css/ex-evento.css">


<head>
  <script>
    window["__codeletBootstrap__"] = JSON.parse('{"A":"A","B":"20260904-05-c4a2e96","C":{"Abril Fatface":"YACgEZbkUVE,0","Alfa Slab One":"YACgEYS9sJU,0","Anton":"YACgEcYqQ-A,0","Archivo":"YAHO2-t-jNE,0","Arial":"YAGyDvJ_4Ts,0","Bebas Neue":"YACgESME5ew,0","Bricolage Grotesque":"YAFyMcdwzpc,0","Canva Sans":"YAFLd8sKbwc,2","Caveat":"YALBs2ploWQ,0","Comic Sans MS":"YAHO2VMiyZo,0","Cormorant Garamond":"YAFdJhX-538,0","Courier New":"YAGzXiGs0_8,0","DM Sans":"YAD1aU3sLnI,0","DM Serif Display":"YAD1aYG82rc,0","Forum":"YACgEcnnqB4,0","Fraunces":"YAEul-FRQw4,0","Georgia":"YAGzXkO0pEM,0","Helvetica Neue":"YAFcf6CtJfI,0","Impact":"YAFcfnjI7Vk,0","Inter":"YAFdJvSyp_k,3","Iowan Old Style":"YAGNIFa8j9o,0","Jacques Francois":"YAHO2a5g66Q,0","JetBrains Mono":"YAFdJksXcAk,0","Libre Baskerville":"YACgEUFdPdA,0","Manrope":"YAHO2b2feC4,0","Merriweather":"YACgEXvHxxs,0","Montserrat":"YADLjI9qxTA,0","Nunito":"YACgEX8C5Gg,0","Oleo Script":"YACgEQQ14jI,0","Phantom Sans":"YAHO2E8Pb88,0","Playfair Display":"YACgEYmuCJE,0","Poppins":"YAFdJjbTu24,1","Press Start 2P":"YAFyGr-8pmQ,0","Quicksand":"YADWjpfPmdk,0","Raleway":"YACgEVg3xZg,0","Segoe UI":"YAHNdRD1Klw,0","Source Sans 3":"YAG4lO1Mj10,0","Spectral":"YAHO2rVUHIM,0","Times New Roman":"YAGzXW3gftg,0","Times":"YAGzXW3gftg,0","Ubuntu":"YACgERDU--Q,0","Work Sans":"YAGXhLOKv44,0","Yellowtail":"YACgEYG4kG4,0","ui-monospace":"YADlN8CFZ8Q,0","ui-sans-serif":"YACkoN-xg4g,0"}}');
  </script>
  <script src="/_sdk/9e99ecf74af2a081.telemetry_sdk.js" integrity="sha512-tZ7fmfTx2KpCLjXQnEuL9azQ4A5+7+xumsx6r/WYVD0zCP/8LP8hDeCypMQesmP+WyAew4g7l5Ah23Bjd6yoVg=="></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navegação de Eventos</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.577.0/dist/umd/lucide.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <style>
    :root {
      --ink: #172554;
      --blue: #1d4ed8;
      --sky: #dbeafe;
      --paper: #f8fafc;
      --line: #cbd5e1;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      width: 100%;
      min-height: 100%;
      font-family: "Work Sans", sans-serif;
      color: var(--ink);
    }

    .event-shell {
      width: 100%;
      min-height: calc(100 * min(var(--vh, 1vh), 1vh));
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    .event-shell::before,
    .event-shell::after {
      content: "";
      position: absolute;
      border-radius: 999px;
      pointer-events: none;
      opacity: 0.55;
    }

    .event-shell::before {
      width: 19rem;
      height: 19rem;
      background: #bfdbfe;
      top: -8rem;
      right: -5rem;
    }

    .event-shell::after {
      width: 13rem;
      height: 13rem;
      background: #fde68a;
      bottom: -6rem;
      left: -5rem;
    }

    .event-board {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 1040px;
      margin: 0 auto;
    }

    .event-panel {
      animation: rise-in 420ms ease both;
    }

    .event-panel[hidden] {
      display: none;
    }

    .nav-button {
      border: 1px solid transparent;
      transition: transform 180ms ease, background 180ms ease, color 180ms ease, box-shadow 180ms ease;
    }

    .nav-button:hover {
      transform: translateY(-2px);
    }

    .nav-button.is-active {
      background: #1d4ed8;
      color: #ffffff;
      box-shadow: 0 10px 20px rgba(29, 78, 216, 0.2);
    }

    .nav-button:focus-visible,
    .event-card:focus-visible {
      outline: 3px solid #f59e0b;
      outline-offset: 3px;
    }

    .event-card {
      border-left: 5px solid #1d4ed8;
      transition: transform 180ms ease, box-shadow 180ms ease;
    }

    .event-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 30px rgba(23, 37, 84, 0.11);
    }

    @keyframes rise-in {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 640px) {
      .event-shell {
        padding: 1.1rem;
      }
    }
  </style>
  <script src="/_sdk/fbe2ebfd64647c54.data_sdk.js" type="text/javascript" integrity="sha512-vkTX6CfvpHc3WbjK+tFJCaDuw4ERA4aEV/e5/7+MMJPMTF4RJYCI6CAwJBT/gtDW+dba4uLSsPUgDjVDHWtgUQ=="></script>
  <script src="/_sdk/fcb6dc01f91829ac.resizing_sdk.js" type="text/javascript" integrity="sha512-YK8JfnN705qaEaVhiL7pcVB2Rs/BbdX5yxV55Az8zT/1JanyEWTw9HqCF915m9iV1YEaoil8qsjJz03l1Kb0Ug=="></script>
</head>






<body data-template-id="__page-root" style="background: linear-gradient(135deg, rgb(239, 246, 255), rgb(248, 250, 252) 52%, rgb(254, 252, 232));">
  <div class="event-shell">
    <header data-template-id="header-section" class="canva-header rounded-[2rem] px-6 py-8 shadow-sm sm:px-10" style="background: rgb(255, 255, 255);">
      <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
        <div class="max-w-2xl">
          <div class="mb-4 flex items-center gap-2 text-blue-700"><i data-lucide="calendar-days" aria-hidden="true" class="h-5 w-5"></i> <span data-template-id="header-eyebrow" class="canva-text text-sm font-semibold uppercase tracking-[0.18em]" style="color: rgb(29, 78, 216); font-weight: 700; font-style: normal; font-size: 14px; letter-spacing: 0.08rem;">Agenda cultural</span>
          </div>
          <h1 data-template-id="page-title" class="canva-text font-extrabold leading-tight" style="color: rgb(23, 37, 84); font-weight: 800; font-style: normal; font-size: 32px;">Encontre seu próximo encontro</h1>
          <p data-template-id="page-description" class="canva-text mt-3 max-w-xl leading-relaxed" style="color: rgb(71, 85, 105); font-weight: 400; font-style: normal; font-size: 18px;">Explore a programação, descubra os destaques e relembre os momentos que já passaram.</p>
        </div>
        <div data-template-id="header-badge" class="canva-tag inline-flex w-fit items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold" style="background: rgb(219, 234, 254); color: rgb(30, 64, 175);"><i data-lucide="map-pin" aria-hidden="true" class="h-4 w-4"></i> <span data-template-id="header-badge-text" class="canva-text" style="color: rgb(30, 64, 175); font-weight: 600; font-style: normal; font-size: 14px;">Eventos em Contagem</span>
        </div>
      </div>
    </header>
    <main class="mt-7">
      <nav data-template-id="events-navigation" class="canva-menu rounded-2xl p-2 shadow-sm" aria-label="Categorias de eventos" style="background: rgb(255, 255, 255);">
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-3"><button id="upcoming-tab" data-view="upcoming" data-template-id="upcoming-nav-button" class="canva-button nav-button is-active rounded-xl px-4 py-3 text-left font-semibold sm:text-center" type="button" aria-controls="upcoming-panel" aria-current="page" style="background: rgb(29, 78, 216); color: rgb(255, 255, 255); font-weight: 600; font-style: normal; font-size: 16px;">Próximos eventos</button> <button id="featured-tab" data-view="featured" data-template-id="featured-nav-button" class="canva-button nav-button rounded-xl px-4 py-3 text-left font-semibold sm:text-center" type="button" aria-controls="featured-panel" style="background: rgb(239, 246, 255); color: rgb(30, 58, 138); font-weight: 600; font-style: normal; font-size: 16px;">Em destaque</button> <button id="past-tab" data-view="past" data-template-id="past-nav-button" class="canva-button nav-button rounded-xl px-4 py-3 text-left font-semibold sm:text-center" type="button" aria-controls="past-panel" style="background: rgb(239, 246, 255); color: rgb(30, 58, 138); font-weight: 600; font-style: normal; font-size: 16px;">Eventos passados</button>
        </div>
      </nav>
      <section id="upcoming-panel" class="event-panel mt-7" role="tabpanel" aria-labelledby="upcoming-tab">
        <div class="mb-5 flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
          <div>
            <p data-template-id="upcoming-kicker" class="canva-text text-sm font-semibold uppercase tracking-[0.16em]" style="color: rgb(29, 78, 216); font-weight: 700; font-style: normal; font-size: 14px; letter-spacing: 0.08rem;">Para marcar na agenda</p>
            <h2 data-template-id="upcoming-title" class="canva-text mt-1 font-bold" style="color: rgb(23, 37, 84); font-weight: 800; font-style: normal; font-size: 24px;">Próximos eventos</h2>
          </div>
          <p data-template-id="upcoming-helper" class="canva-text text-sm" style="color: rgb(100, 116, 139); font-weight: 400; font-style: normal; font-size: 14px;">Selecione uma programação e participe.</p>
        </div>
        <div class="grid gap-4 lg:grid-cols-2">
          <article data-template-id="upcoming-event-one" class="canva-card event-card rounded-2xl p-6 shadow-sm" style="background: rgb(255, 255, 255);">
            <div class="flex items-start justify-between gap-4">
              <div>
                <p data-template-id="upcoming-event-one-date" class="canva-text text-sm font-semibold" style="color: rgb(29, 78, 216); font-weight: 700; font-style: normal; font-size: 14px;">17 SET • 09H30 às 17h</p>
                <h3 data-template-id="upcoming-event-one-title" class="canva-text mt-2 font-bold" style="color: rgb(23, 37, 84); font-weight: 700; font-style: normal; font-size: 19px;">Contagem Geek</h3>
              </div><i data-lucide="arrow-up-right" aria-hidden="true" class="h-5 w-5 shrink-0 text-blue-700"></i>
            </div>
            <p data-template-id="upcoming-event-one-place" class="canva-text mt-4 flex items-center gap-2 text-sm" style="color: rgb(71, 85, 105); font-weight: 500; font-style: normal; font-size: 14px;">O Parque Cataguás (antigo Fernão Dias), CONTAGEM, MG</p>
            <p data-template-id="upcoming-event-one-description" class="canva-text mt-3 leading-relaxed" style="color: rgb(71, 85, 105); font-weight: 400; font-style: normal; font-size: 16px;">O universo nerd, otaku e gamer já tem data e local para se reunir.</p>
          </article>
          <article data-template-id="upcoming-event-two" class="canva-card event-card rounded-2xl p-6 shadow-sm" style="background: rgb(255, 255, 255);">
            <div class="flex items-start justify-between gap-4">
              <div>
                <p data-template-id="upcoming-event-two-date" class="canva-text text-sm font-semibold" style="color: rgb(29, 78, 216); font-weight: 700; font-style: normal; font-size: 14px;">15 SET • 10H00 ás 18h</p>
                <h3 data-template-id="upcoming-event-two-title" class="canva-text mt-2 font-bold" style="color: rgb(23, 37, 84); font-weight: 700; font-style: normal; font-size: 19px;">Praça do Vinho</h3>
              </div><i data-lucide="arrow-up-right" aria-hidden="true" class="h-5 w-5 shrink-0 text-blue-700"></i>
            </div>
            <p data-template-id="upcoming-event-two-place" class="canva-text mt-4 flex items-center gap-2 text-sm" style="color: rgb(71, 85, 105); font-weight: 500; font-style: normal; font-size: 14px;"> Praça Tancredo Neves, CONTAGEM, MG</p>
            <p data-template-id="upcoming-event-two-description" class="canva-text mt-3 leading-relaxed" style="color: rgb(71, 85, 105); font-weight: 400; font-style: normal; font-size: 16px;">Reunindo vinhos selecionados, restaurantes da Grande BH e uma programação musical com tributo ao U2, reggae, rock e blues.</p>
          </article>
        </div>
      </section>
      <section id="featured-panel" class="event-panel mt-7" role="tabpanel" aria-labelledby="featured-tab" hidden="">
        <div class="mb-5">
          <p data-template-id="featured-kicker" class="canva-text text-sm font-semibold uppercase tracking-[0.16em]" style="color: rgb(180, 83, 9); font-weight: 700; font-style: normal; font-size: 14px; letter-spacing: 0.08rem;">Escolha da semana</p>
          <h2 data-template-id="featured-title" class="canva-text mt-1 font-bold" style="color: rgb(23, 37, 84); font-weight: 800; font-style: normal; font-size: 24px;">Evento em destaque</h2>
        </div>
        <article data-template-id="featured-event-card" class="canva-card overflow-hidden rounded-[2rem] shadow-sm" style="background: rgb(23, 37, 84);">
          <div class="grid md:grid-cols-[0.92fr_1.08fr]"><img data-template-id="featured-event-image" loading="lazy" class="canva-image h-64 w-full object-cover md:h-full" src="https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1280" alt="Público em um show com luzes coloridas">
            <div class="p-7 sm:p-9">
              <p data-template-id="featured-event-date" class="canva-text text-sm font-semibold uppercase tracking-[0.12em]" style="color: rgb(252, 211, 77); font-weight: 700; font-style: normal; font-size: 14px; letter-spacing: 0.08rem;">20 DE SETEMBRO • APARTIR DAS 17H00</p>
              <h3 data-template-id="featured-event-title" class="canva-text mt-3 font-bold leading-tight" style="color: rgb(255, 255, 255); font-weight: 800; font-style: normal; font-size: 19px;">Menos é Mais e Turma do Pagode</h3>
              <p data-template-id="featured-event-description" class="canva-text mt-4 leading-relaxed" style="color: rgb(219, 234, 254); font-weight: 400; font-style: normal; font-size: 17px;">Falta pouco para os grupos “Menos é Mais” e “Turma do Pagode” subirem ao palco Na Praça Da Jaboticabas.</p>
              <div data-template-id="featured-event-location" class="canva-tag mt-6 inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold" style="background: rgb(255, 255, 255); color: rgb(23, 37, 84);"><i data-lucide="map-pin" aria-hidden="true" class="h-4 w-4"></i> <span data-template-id="featured-event-location-text" class="canva-text" style="color: rgb(23, 37, 84); font-weight: 600; font-style: normal; font-size: 14px;">Praça da Jaboticabas — CONTAGEM, MG</span>
              </div>
            </div>
          </div>
        </article>
      </section>
      <section id="past-panel" class="event-panel mt-7" role="tabpanel" aria-labelledby="past-tab" hidden="">
        <div class="mb-5">
          <p data-template-id="past-kicker" class="canva-text text-sm font-semibold uppercase tracking-[0.16em]" style="color: rgb(100, 116, 139); font-weight: 700; font-style: normal; font-size: 14px; letter-spacing: 0.08rem;">Memórias recentes</p>
          <h2 data-template-id="past-title" class="canva-text mt-1 font-bold" style="color: rgb(23, 37, 84); font-weight: 800; font-style: normal; font-size: 24px;">Eventos passados</h2>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
          <article data-template-id="past-event-one" class="canva-card rounded-2xl p-6 shadow-sm" style="background: rgb(255, 255, 255);">
            <p data-template-id="past-event-one-date" class="canva-text text-sm font-semibold" style="color: rgb(100, 116, 139); font-weight: 700; font-style: normal; font-size: 14px;">30 AGOSTO • CONTAGEM, MG</p>
            <h3 data-template-id="past-event-one-title" class="canva-text mt-2 font-bold" style="color: rgb(23, 37, 84); font-weight: 700; font-style: normal; font-size: 19px;">Encontro de narrativas locais</h3>
            <p data-template-id="past-event-one-description" class="canva-text mt-3 leading-relaxed" style="color: rgb(71, 85, 105); font-weight: 400; font-style: normal; font-size: 16px;">Histórias, afetos e vivências se encontraram em uma roda de conversa cheia de inspiração.</p>
          </article>
          <article data-template-id="past-event-two" class="canva-card rounded-2xl p-6 shadow-sm" style="background: rgb(255, 255, 255);">
            <p data-template-id="past-event-two-date" class="canva-text text-sm font-semibold" style="color: rgb(100, 116, 139); font-weight: 700; font-style: normal; font-size: 14px;">16 AGOSTO • CONTAGEM, MG</p>
            <h3 data-template-id="past-event-two-title" class="canva-text mt-2 font-bold" style="color: rgb(23, 37, 84); font-weight: 700; font-style: normal; font-size: 19px;">Mostra Criativa de Inverno</h3>
            <p data-template-id="past-event-two-description" class="canva-text mt-3 leading-relaxed" style="color: rgb(71, 85, 105); font-weight: 400; font-style: normal; font-size: 16px;">Uma seleção de trabalhos autorais que reuniu artistas, estudantes e visitantes durante todo o fim de semana.</p>
          </article>
        </div>
      </section>
    </main>
    <footer class="mt-10 text-center">
      <p data-template-id="footer-text" class="canva-text text-sm" style="color: rgb(100, 116, 139); font-weight: 400; font-style: normal; font-size: 14px;">A programação pode mudar. Consulte os detalhes de cada evento antes de participar.</p>
    </footer>
  </div>
  <script src="/_sdk/5629ea66dc55d54f.editing_sdk.js" integrity="sha512-snPYzGvgiTEMUBOb+HlCBkFeiM0IRX4hcgA78wvalhC0WnJtaX+RCbosPWtNqZsZ7sZ9NwN0oePZYa+IlMwa+w=="></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const buttons = Array.from(document.querySelectorAll("[data-view]"));
      const panels = {
        upcoming: document.getElementById("upcoming-panel"),
        featured: document.getElementById("featured-panel"),
        past: document.getElementById("past-panel")
      };

      function selectView(viewName) {
        buttons.forEach((button) => {
          const active = button.dataset.view === viewName;
          button.classList.toggle("is-active", active);
          if (active) {
            button.setAttribute("aria-current", "page");
          } else {
            button.removeAttribute("aria-current");
          }
        });

        Object.entries(panels).forEach(([name, panel]) => {
          panel.hidden = name !== viewName;
        });
      }

      buttons.forEach((button) => {
        button.addEventListener("click", () => selectView(button.dataset.view));
      });

      lucide.createIcons();
    });
  </script>

</body>

</html>