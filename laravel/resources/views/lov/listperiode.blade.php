@foreach ($dataPeriode as $d)
    <option></option>
    <option value="{{ $d->periode }}"> {{ $d->periode }}</option>
@endforeach
