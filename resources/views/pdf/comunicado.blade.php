<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            background: #f5f7fb;
        }

        /* CONTENEDOR FIJO (IMPORTANTE PARA BROWSERSHOT) */
        .page {
            width: 1100px;
            margin: 0 auto;
            background: #fff;
        }

        .header {
            background: #0d6efd;
            color: white;
            padding: 25px 40px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 12px;
            opacity: 0.9;
        }

        .container {
            padding: 40px;
        }

        .badge {
            background: #e9ecef;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
            font-size: 12px;
        }

        .title {
            font-size: 24px;
            margin: 25px 0;
        }

        .info {
            margin: 15px 0 25px 0;
        }

        .message {
            border-left: 4px solid #0d6efd;
            padding-left: 15px;
            line-height: 1.8;
            background: #f9fafb;
            padding: 15px;
        }

        .footer {
            margin-top: 50px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .small {
            color: #777;
            font-size: 12px;
        }
    </style>

</head>

<body>

    <div class="page">

        <div class="header">
            <div class="logo">VITACO TOOLS</div>
            <div class="subtitle">Plataforma para administración de condominios</div>
        </div>

        <div class="container">

            <span class="badge">
                {{ $data['tipo'] ?? 'Comunicado' }}
            </span>

            <div class="title">
                {{ $data['titulo'] ?? 'Sin título' }}
            </div>

            <div>
                <strong>Comunidad:</strong>
                {{ $data['comunidad'] ?? 'Comunidad' }}
            </div>

            <div class="info">
                <strong>Fecha:</strong> {{ $data['fecha'] ?? '-' }}
                &nbsp;&nbsp;&nbsp;
                <strong>Hora:</strong> {{ $data['hora'] ?? '-' }}
            </div>

            <div class="message">

                <p><strong>Estimados residentes:</strong></p>

                <p>
                    {{ $data['mensaje'] ?? '' }}
                </p>

            </div>

            <div class="footer">
                <strong>Administración</strong>
                <br><br>

                <div class="small">
                    Documento generado automáticamente mediante Vitaco Tools.
                </div>
            </div>

        </div>

    </div>

</body>

</html>
