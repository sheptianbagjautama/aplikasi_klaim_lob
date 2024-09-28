<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA SUMMARY KLAIM PER LOB</title>
</head>
<style>
    body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        
    }

    table {
            border-collapse: collapse; /* Ensures that the borders are shared between adjacent cells */
            width: 70%;
            margin: 0 auto !important; 
        }


    th, td {
        border: 1px solid black; /* Apply border to all table headers and cells */
        padding: 8px;
        text-align: left;
    }

    td {
        color: gray;
        font-size: 1rem;
    }

    .header {
        text-align: center;
    }

    .bold {
        font-weight: bold;
    }

    .number {
        text-align: right;
    }

    .margin-y-1{
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .summary { 
        background-color: #16a2b9;
        color: #FFFFFF;
    }

    .link {
       
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-bottom: 1rem;
    }

    span {
        padding: 10px;
    }

</style>
<body>
    <table>
        <tr>
            <td class="bold margin-y-1 header">LOB</td>
            <td class="bold margin-y-1 header">Penyebab Klaim</td>
            <td class="bold margin-y-1 header">Jumlah Nasabah</td>
            <td class="bold margin-y-1 header">Beban Klaim</td>
        </tr>
        <tbody>
            @foreach ($datas as $data)

                @if (str_contains($data->sub_cob, 'Subtotal'))
                    <td class="summary" colspan="2">{{ $data->sub_cob }}</td>
                    <td class="summary" class="number">{{ $data->jumlah_nasabah }}</td>
                    <td class="summary" class="number">{{ number_format($data->beban_claim, 0, ",", ",");  }}</td>
                @else
                    <td class="">{{ $data->sub_cob }}</td>
                    <td class="">{{ $data->penyebab_klaim }}</td>
                    <td class="" class="number">{{ $data->jumlah_nasabah }}</td>
                    <td class="" class="number">{{ number_format($data->beban_claim, 0, ",", ",");  }}</td>
                @endif
               <tr>
               
               </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>