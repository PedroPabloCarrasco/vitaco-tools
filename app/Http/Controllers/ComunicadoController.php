<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class ComunicadoController extends Controller
{
    public function index()
    {
        return view('tools.comunicado', [
            'data' => null
        ]);
    }

    public function preview(Request $request)
    {
        $data = $this->getData($request);

        return view('tools.comunicado', compact('data'));
    }

    /**
     * EXPORTAR PDF (PRO - ESTABLE)
     */
    public function pdf(Request $request)
    {
        $data = $this->getData($request);

        $html = view('pdf.comunicado', compact('data'))->render();

        $pdf = Browsershot::html($html)
            ->setChromePath(env('BROWSERSHOT_CHROME_PATH', '/usr/bin/chromium-browser'))
            ->noSandbox()
            ->addChromiumArguments([
                'no-sandbox',
                'disable-setuid-sandbox',
                'disable-dev-shm-usage',
                'disable-gpu',
                'no-zygote',
            ])
            ->format('A4')
            ->showBackground()
            ->waitUntilNetworkIdle()
            ->timeout(120)
            ->pdf();

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=comunicado.pdf');
    }

    /**
     * EXPORTAR IMAGEN PNG (PRO MAX ESTABLE)
     */
    public function image(Request $request)
    {
        $data = $this->getData($request);

        $html = view('pdf.comunicado', compact('data'))->render();

        $image = Browsershot::html($html)
            ->setChromePath(env('BROWSERSHOT_CHROME_PATH', '/usr/bin/chromium-browser'))
            ->noSandbox()
            ->addChromiumArguments([
                'no-sandbox',
                'disable-setuid-sandbox',
                'disable-dev-shm-usage',
                'disable-gpu',
                'no-zygote',
            ])
            ->windowSize(1200, 800)
            ->showBackground()
            ->waitUntilNetworkIdle()
            ->timeout(120)
            ->screenshot();

        return response($image, 200)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename=comunicado.png');
    }

    private function getData(Request $request): array
    {
        return [
            'tipo' => $request->input('tipo'),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'titulo' => $request->input('titulo'),
            'mensaje' => $request->input('mensaje'),
            'comunidad' => $request->input('comunidad', 'Comunidad'),
        ];
    }
}
