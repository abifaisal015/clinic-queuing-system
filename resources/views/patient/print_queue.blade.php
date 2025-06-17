<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
</head>
<style>
    td {
        font-size: 20px;
    }
</style>

<body>
    <center>
        <table>
            @if ($data != null)
            <h1>Nomor Antrian</h1>
            <tr>
                <td style="text-align: center;">{{ $data->name }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">{{ $data->poli_code }}{{ $data->queue_number }}</td>
            </tr>
            @else
            <h1>Nomor Antrian Tidak Ada</h1>
            @endif
        </table>
    </center>
</body>

</html>