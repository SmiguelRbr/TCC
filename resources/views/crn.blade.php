    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="{{ route('crn.validar') }}" method="POST">
            @csrf

            <label for="numero">Número do CRN:</label>
            <input
                type="text"
                id="numero"
                name="numero"
                maxlength="10"
                value="{{ old('numero') }}"
                required />
            @error('numero')
            <div style="color:red;">{{ $message }}</div>
            @enderror

            <label for="regiao">Região do CRN:</label>
            <select id="regiao" name="regiao" required>
                <option value="">Selecione</option>
                @foreach(['CRN-1','CRN-2','CRN-3','CRN-4','CRN-5','CRN-6','CRN-7','CRN-8','CRN-9','CRN-10'] as $reg)
                <option value="{{ $reg }}" {{ old('regiao') == $reg ? 'selected' : '' }}>{{ $reg }}</option>
                @endforeach
            </select>
            @error('regiao')
            <div style="color:red;">{{ $message }}</div>
            @enderror

            <button type="submit">Validar CRN</button>
        </form>

        @if(session('valid'))
        <div style="margin-top: 15px; font-weight: bold; color: green;">
            {{ session('message') }}
        </div>
        @endif
    </body>

    </html>