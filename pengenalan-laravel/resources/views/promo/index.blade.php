<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <a href="{{ route('promo.create') }}">Tambah</a>

    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>keterangan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPromo as $key => $item)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('promo.show', $item) }}">Tampilan</a>
                        <a href="{{ route('promo.edit', $item) }}">Edit</a>
                        <form action="{{ route('promo.destroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
