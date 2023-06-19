<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat</title>
    <style>
        * {
            font-family: "Times New Roman", Times, serif;
            color: #222;
        }

        hr {
            margin: 0;
            padding: 0;
            width: 700px;
        }

        hr.garis1 {
            border: .5px solid #000;
            margin-top: 10px;
            margin-bottom: 1px;
        }

        hr.garis2 {
            border: 1.5px solid #000;
        }

        table {
            border-spacing: 0;

        }
    </style>

</head>

<body>
    <table cellspacing="0" cellpadding="0">
        <tr style="padding-bottom: 20px;background-color: {{ $surat->background }};border-width: 0;">
            <td style="width: 110px;">
                <img style="width:100px;" src="{{ public_path('storage/') . $surat->logo }}">
            </td>
            <td style="width: 480px;text-align:center;">
                <div style="font-size: 1.8rem; text-transform: uppercase;font-weight: bold;">{{ $surat->head }}</div>
                <div style="font-size: 1rem;margin-top: 15px;">Alamat : {{ $surat->alamat }}</div>
            </td>
            <td style="width: 115px;"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="padding-bottom: 20px;background-color: {{ $surat->background }};">
                <hr class="garis1">
                <hr class="garis2">
            </td>
        </tr>
        <tr>
            <td style="text-align: center;padding: 20px;">
                <div style="text-decoration: underline;text-transform: capitalize;font-weight: bold; margin-bottom: 5px;">{{ $surat->nama_surat }}</div>
                <div>{{ $surat->no_surat }}</div>
            </td>
        </tr>
        <tr>
            <td style="text-align: justify;padding: 30px 0px;line-height: 25px;">
                <div>{!! $surat->konten !!}</div>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 200px;">
                <div>Tembusan :</div>
                <ol>
                    @foreach ($tembusan as $t)
                        <li>{{ $t->keterangan }}</li>
                    @endforeach
                </ol>
            </td>
            <td style="width: 280px;"></td>
            <td style="width: 220px; text-align: center;">
                <div>{{ $surat->tempat }}, {{ date("d F Y", strtotime($surat['tgl_surat'])) }}</div>
                <img src="{{ public_path('storage/') . $surat->ttd }}" width="120">
                <div style="font-weight: bold;"> {{$surat['penanggung_jawab'] }}</div>
                <div><small>NIP : {{ $surat['nip'] }}</small></div>
            </td>
        </tr>
    </table>
</body>

</html>