<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit</title>
</head>

<body>
    <form action="{{ route('promo.update', $promo) }}" method="POST">
        {{-- GET, POST --}}
        {{-- expired --}}
        @csrf
        @method('PUT')

        <input type="text" name="nama" value="{{ old('nama') ?? $promo->nama }}" placeholder="Nama">
        <textarea name="keterangan" id="keterangan" cols="30" rows="10">{{ old('keterangan') ?? $promo->keterangan }}</textarea>

        <button>Simpan</button>
    </form>
</body>

</html>
