@foreach ($dataPangkalan as $d)
    <option></option>
    <option value="{{ $d->idpangkalan }}"> {{ $d->namapangkalan }}</option>
@endforeach
