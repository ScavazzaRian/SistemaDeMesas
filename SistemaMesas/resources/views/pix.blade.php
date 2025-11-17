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
    fetch("/assinatura/status")
        .then(r => r.json())
        .then(data => {
            if (data.status === "approved") {
                window.location.href = "/home";
            }
        })
        .catch(err => console.error("Erro:", err));
}, 4000);
</script>
@endsection