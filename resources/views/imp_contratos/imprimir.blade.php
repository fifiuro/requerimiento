<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMPRESION DE CONTRATO</title>
    <style>
        @page {
            margin: 50px 50px;
        }
        /* #header { position: fixed; left: 0px; top: -60px; right: 0px; height: 40px; background-color: orange; text-align: center; } */
        /* #footer { position: fixed; left: 0px; bottom: -40px; right: 0px; height: 40px; background-color: lightblue; } */
        #footer { position: fixed; left: 0px; bottom: -40px; right: 0px; height: 40px; }
        #footer .page:after { content: counter(page, upper-roman); }

        body {
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
            font-size: 13px;
        }

        .tabla {
            width: 700px;
        }

        .col1 {
            width: 100px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }

        .col1 img {
            width: 100%;
        }

        .col2 {
            font-weight: bold;
            text-align: center;
            vertical-align: top;
            font-size: 15px;
        }

        .col2 span {
            font-size: 30px;
        }

        .contrato {
            text-align: justify;
        }

        .tabla-firma {
            width: 715px;
            text-align: center;
        }

        .col-firma {
            height: 120px;
            vertical-align: bottom;
        }
    </style>
</head>
<body>
    {{-- <div id="header">
        RENE
    </div> --}}
    <div id="footer">
        <p></p>
    </div>
    <div id="content">
        <table class="tabla">
            <tr>
                <td class="col1">
                    <img src="{{ asset('images/img/CNS_Logo.png') }}" alt="logo">
                    REGIONAL LA PAZ
                </td>
                <td class="col2">
                    <span>CAJA NACIONAL DE SALUD</span><br><br>
                    ADMINISTRACION REGIONAL LA PAZ<br>
                    CONTRATO DE PRESTACION DE SERVICIOS<br>
                    (TRABAJADOR EVENTUAL)
                </td>
            </tr>
        </table>
        <hr>
        <span class="contrato">
            {{--  <?php echo $find[0]->contrato ?>  --}}
            {!! $find[0]->contrato !!}
        </span>
        <table class="tabla-firma">
            <tr>
                <td class="col-firma">
                    FIRMA TRABAJADOR
                </td>
                <td class="col-firma">
                    {{ $find[0]->firma1 }}
                    <br>
                    <strong>{{ $find[0]->cargo1 }}</strong>
                </td>
            </tr>
            <tr>
                <td class="col-firma">
                    {{ $find[0]->firma2}}
                    <br>
                    <strong>{{ $find[0]->cargo2 }}</strong>
                </td>
                <td class="col-firma">
                    {{ $find[0]->firma3 }}
                    <br>
                    <strong>{{ $find[0]->cargo3 }}</strong>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>