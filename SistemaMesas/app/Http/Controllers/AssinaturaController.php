<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;

class AssinaturaController extends Controller
{
    public function criarPix(Request $request)
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        $client = new PaymentClient();

        $payment = $client->create([
            "transaction_amount" => 0.01,
            "description" => "Assinatura Premium",
            "payment_method_id" => "pix",
            "external_reference" => Auth::id(), // ★ IMPORTANTE ★
            "payer" => [
                "email" => Auth::user()->email,
                "first_name" => Auth::user()->name,
            ],
        ]);

        return view('pix', [
            'qr_code' => $payment->point_of_interaction->transaction_data->qr_code_base64,
            'qr_code_text' => $payment->point_of_interaction->transaction_data->qr_code
        ]);
    }


    public function webhook(Request $request)
    {
        // ID do pagamento enviado pelo MP
        $paymentId = $request->input('data.id');

        if (!$paymentId) {
            return response()->json(['error' => 'Pagamento não encontrado'], 400);
        }

        // Iniciar SDK
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
        $client = new PaymentClient();

        // Buscar pagamento
        try {
            $payment = $client->get($paymentId);
        } catch (\Exception $e) {
            Log::error("Erro ao consultar pagamento: " . $e->getMessage());
            return response()->json(['error' => 'Erro ao consultar pagamento'], 500);
        }

        // Se estiver aprovado
        if ($payment && $payment->status === 'approved') {

            $userId = $payment->external_reference;

            $user = User::find($userId);

            if ($user) {
                $user->pagamento_ativo = true;
                $user->save();
            }
        }

        return response()->json(['status' => 'ok'], 200);
    }
}
