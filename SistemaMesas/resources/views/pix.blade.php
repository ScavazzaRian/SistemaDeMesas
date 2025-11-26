@extends('layouts.app')

@section('content')
<div class="assinatura-wrapper">

    <div class="center-box">

        {{-- TÍTULO E TEXTO --}}
        <div class="conteudo">
            <h2>Pagamento via PIX</h2>
            <p>Finalize a assinatura escaneando o QR Code abaixo.</p>
        </div>

        {{-- QR CODE --}}
        <div style="text-align: center; margin: 25px 0;">
            <img
                src="data:image/png;base64,{{ $qr_code }}"
                alt="QR Code PIX"
                class="qrcode-pix">
        </div>

        {{-- CÓDIGO COPIÁVEL --}}
        <p style="color:#444; font-size: 1.1rem; margin-bottom: 10px;">
            Ou copie e cole o código PIX:
        </p>

        <textarea
            id="pixcode"
            readonly
            class="pix-textarea">{{ $qr_code_text }}</textarea>

        {{-- BOTÕES --}}
        <div class="button-group">
            <button class="btn-confirmar" onclick="copiarPix()">
                Copiar Código PIX
            </button>

            <a href="{{ route('login') }}" class="btn-voltar">← Voltar</a>

            <form method="POST" action="{{ route('ativar.assinatura') }}" style="position: absolute; top: 20px; right: 20px;">
                @csrf
                <button type="submit" class="btn-top-right">
                    Ativar e Ir para Pedidos
                </button>
            </form>


        </div>

    </div>

</div>

{{-- SCRIPT PARA CÓPIA --}}
<script>
    function copiarPix() {
        let text = document.getElementById("pixcode").value;
        navigator.clipboard.writeText(text);
        alert("Código PIX copiado!");
    }

    setInterval(() => {
        fetch("/check-pagamento")
            .then(response => response.json())
            .then(data => {
                if (data.pagamento_ativo) {
                    window.location.href = "/home/pedidos"; // ou a página que você quiser
                }
            });
    }, 5000); // verifica a cada 5 segundos
</script>
@endsection