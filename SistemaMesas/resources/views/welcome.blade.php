<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem vindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar fixa no topo -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="">Meu Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" aria-controls="navbarNav" 
        aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
          <a href="#" class="btn btn-primary fw-bold">Assinar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Seção com fundo escuro -->
<div class="bg-dark text-white text-center py-5">
    <h2>Comece aqui sua gestão</h2>
    <p>Software para gerenciamento de Mesas</p>
</div>

<!-- Conteúdo principal: Texto sobre software de gerenciamento de mesas -->
<div class="container my-5">
    <h2 class="mb-4">Software de Gerenciamento de Mesas</h2>
    <p>
        O <strong>software de gerenciamento de mesas</strong> é uma ferramenta tecnológica desenvolvida para otimizar a organização e a operação de estabelecimentos que trabalham com atendimento em mesas, como restaurantes, bares, cafés, casas de eventos e hotéis. Seu objetivo principal é <strong>facilitar a alocação de mesas, monitorar o fluxo de clientes e melhorar a experiência de atendimento</strong>, permitindo que gestores e funcionários tomem decisões rápidas e precisas.
    </p>
    <h4>Funcionalidades Principais</h4>
    <ul>
        <li><strong>Mapeamento do Salão:</strong> Criação de uma representação visual do salão com disposição das mesas, capacidade e zonas especiais.</li>
        <li><strong>Controle de Reservas:</strong> Reservas online, confirmação, remarcação e notificações automáticas para clientes.</li>
        <li><strong>Gestão do Fluxo de Clientes:</strong> Status das mesas em tempo real (ocupadas, livres, reservadas ou aguardando limpeza).</li>
        <li><strong>Integração com Pedidos e Pagamentos:</strong> Registro de pedidos direto pelo sistema, envio à cozinha e processamento de pagamentos ágil.</li>
        <li><strong>Relatórios e Estatísticas:</strong> Informações sobre ocupação, tempo médio de atendimento e faturamento para decisões estratégicas.</li>
        <li><strong>Personalização e Alertas:</strong> Diferenciação de mesas VIP, controle de promoções e alertas automáticos de disponibilidade.</li>
    </ul>
    <h4>Benefícios do Uso</h4>
    <ul>
        <li><strong>Eficiência Operacional:</strong> Reduz erros, melhora o fluxo e otimiza o tempo da equipe.</li>
        <li><strong>Melhoria na Experiência do Cliente:</strong> Diminui o tempo de espera e agiliza pedidos e pagamentos.</li>
        <li><strong>Aumento da Receita:</strong> Otimização do aproveitamento das mesas e do atendimento por turno.</li>
        <li><strong>Decisões Baseadas em Dados:</strong> Relatórios detalhados ajudam a identificar padrões e estratégias.</li>
    </ul>
    <h4>Aplicações</h4>
    <p>
        Pode ser usado em diversos tipos de estabelecimentos:
        restaurantes, bares, cafeterias, hotéis, resorts e casas de eventos, permitindo uma gestão organizada e eficiente do espaço e do atendimento.
    </p>
    <h4>Conclusão</h4>
    <p>
        Em resumo, um software de gerenciamento de mesas é indispensável para qualquer estabelecimento que deseja <strong>elevar a eficiência operacional, melhorar a experiência do cliente e maximizar lucros</strong>. Com recursos que vão desde a alocação visual de mesas até integração com pedidos e relatórios detalhados, ele transforma a gestão tradicional em um processo mais ágil, organizado e moderno.
    </p>
</div>

<!-- Rodapé -->
<footer class="bg-dark text-white text-center mt-auto py-3">
    <p class="mb-0">&copy; <?= date("Y") ?> - Meu Site. Todos os direitos reservados.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
