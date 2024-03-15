@extends('layouts.main')

@section('title')
    <title>LPG | Dashboard</title>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.card -->
            {{-- PURCHASE --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Grafik Logbook Agen
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#logbook-agen-chart-line" data-toggle="tab">Line</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#logbook-agen-chart-bar" data-toggle="tab">Bar</a>
                            </li>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-agen" id="cboagen_grafikperagen"
                                    style="width: 100%;">
                                    @foreach ($dataCbo['dataAgen'] as $d)
                                        <option></option>
                                        <option value="{{ $d->kodeagen }}"> {{ $d->kodeagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2bs4" id="cbo_kategorifilterperagen" style="width: 100%;">
                                    <option value="agen_berdasarkan_bulan">Berdasarkan Bulan</option>
                                    <option value="agen_berdasarkan_tanggal">Berdasarkan Tanggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group cbo-filter-kategori-logbook-agen" id="cbo_agen_berdasarkan_bulan">
                                <select class="form-control select2bs4-periode" id="cbo_bulanperagen" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group cbo-filter-kategori-logbook-agen" id="cbo_agen_berdasarkan_tanggal">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="dtp_peragen">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_logbookagenchart">Submit</button>
                        </div>
                    </div>
                    <div class="tab-content p-0">
                        <!-- Morris chart - Purchase -->
                        <div class="chart tab-pane" id="logbook-agen-chart-line" style="position: relative; height: auto;">
                            <canvas id="canvas_agenlogbookchart_line" height="155" style="height: 100%;">Your browser does
                                not
                                support the canvas element.
                            </canvas>
                        </div>
                        <div class="chart tab-pane active" id="logbook-agen-chart-bar"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_agenlogbookchart_bar" height="155" style="height: 100%;">Your browser does
                                not
                                support the canvas element.
                            </canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            {{-- PURCHASE --}}
            <!-- /.card -->

            <!-- /.card -->
            {{-- PROFIT LOSS --}}

            {{-- PROFIT LOSS --}}
            <!-- /.card -->
        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">
            <!-- Map card -->
            <!-- /.card -->
            {{-- SALES --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Grafik Logbook Pangkalan
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#logbook-pangkalan-chart-line" data-toggle="tab">Line</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#logbook-pangkalan-chart-bar" data-toggle="tab">Bar</a>
                            </li>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-agen" id="cboagen_grafikperpangkalan"
                                    style="width: 100%;">
                                    <option></option>
                                    @foreach ($dataCbo['dataAgen'] as $d)
                                        <option value="{{ $d->kodeagen }}"> {{ $d->kodeagen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control select2bs4-placeholder-pangkalan"
                                    id="cbopangkalan_grafikperpangkalan" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_logbookpangkalanchart">Submit</button>
                        </div>
                    </div>
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane" id="logbook-pangkalan-chart-line"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_pangkalanlogbookchart_line" height="155" style="height: 100%;">Your
                                browser does not
                                support the canvas element.</canvas>
                        </div>
                        <div class="chart tab-pane active" id="logbook-pangkalan-chart-bar"
                            style="position: relative; height: auto;">
                            <canvas id="canvas_pangkalanlogbookchart_bar" height="155" style="height: 100%;">Your
                                browser does not
                                support the canvas element.</canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            {{-- SALES --}}
            <!-- /.card -->

            <!-- /.card -->
            {{-- OBAT TERLARIS --}}

            {{-- OBAT TERLARIS --}}
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
@endsection

@section('jsbawah')
    <script type="text/javascript">
        //==========================================================================================
        // $(function() {
        //FUNGSINYA INI SAMA DENGAN DOMContentLoaded
        // });
        //==========================================================================================

        document.addEventListener('DOMContentLoaded', (event) => {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4-placeholder-agen').select2({
                theme: 'bootstrap4',
                placeholder: "AGEN",
                allowClear: false
            });
            $('.select2bs4-placeholder-pangkalan').select2({
                theme: 'bootstrap4',
                placeholder: "PANGKALAN",
                allowClear: false
            });
            $('.select2bs4-periode').select2({
                theme: 'bootstrap4',
                placeholder: "PERIODE",
                allowClear: false
            });
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                allowClear: false
            });

            //Date range picker
            $('#dtp_peragen').daterangepicker();

            //$("div#cbo_agen_berdasarkan_bulan").hide();
            $("div#cbo_agen_berdasarkan_tanggal").hide();
        });
        //==========================================================================================

        // 4 Oktober 2023 untuk memindah combobox langsung ke tahun yang sekarang
        // function selectElement(id, valueToSelect) {
        //     let element = document.getElementById(id);
        //     element.value = valueToSelect;
        // }

        //==========================================================================================
        //FILTER
        const btnLogbookAgenChart = document.querySelector('#btn_logbookagenchart');
        btnLogbookAgenChart.addEventListener('click', refreshLogbookAgenChart);
        const cboKategoriFilterPerAgen = document.getElementById('cbo_kategorifilterperagen');
        $("#cbo_kategorifilterperagen").on("change", function() {
            let kategoriFilterPerAgen = cboKategoriFilterPerAgen.value;
            $("div.cbo-filter-kategori-logbook-agen").hide();
            $("#cbo_" + kategoriFilterPerAgen).show();
        });
        //==========================================================================================

        $("#cboagen_grafikperagen").on("change", function() {
            const cboAgenLogbookPerAgen = document.getElementById('cboagen_grafikperagen');
            getPeriodePerAgen(cboAgenLogbookPerAgen.value);
        });

        function getPeriodePerAgen(kodeagen) {
            // alert(kodeagen);
            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshperiodelogbookagen') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodeagen: kodeagen
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        $("#cbo_bulanperagen").html(response.msg);
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };

        $("#cboagen_grafikperpangkalan").on("change", function() {
            const cboAgenLogbookPerPangkalan = document.getElementById('cboagen_grafikperpangkalan');
            getPangkalan(cboAgenLogbookPerPangkalan.value);
        });

        function getPangkalan(kodeagen) {
            // alert(kodeagen);
            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshpangkalanlogbook') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodeagen: kodeagen
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        $("#cbopangkalan_grafikperpangkalan").html(response.msg);
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };

        //Logbook Agen
        let labelAgenLogbook = 0;
        let dataAgenLogbook = 0;
        const dataAgenLogbookChartBar = {
            labels: labelAgenLogbook,
            datasets: [{
                label: '%',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1,
                data: dataAgenLogbook
            }]
        };
        const configAgenLogbookBar = {
            type: 'bar',
            data: dataAgenLogbookChartBar,
            options: {}
        };
        const myChartAgenLogbookBar = new Chart(
            document.getElementById('canvas_agenlogbookchart_bar'),
            configAgenLogbookBar
        );

        //Logbook Pangkalan
        let labelPangkalanLogbook = 0;
        let dataPangkalanLogbook = 0;
        const dataPangkalanLogbookChartBar = {
            labels: labelPangkalanLogbook,
            datasets: [{
                label: '%',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1,
                data: dataPangkalanLogbook,
                // pointBackgroundColor: 'rgb(255, 99, 132)',
                // pointRadius: 5,
                // pointHoverRadius: 5,
                // pointHoverBackgroundColor: 'rgb(255,255,255)',
                // fill: false,
                // tension: 0.5
            }]
        };
        const configPangkalanLogbookBar = {
            type: 'bar',
            data: dataPangkalanLogbookChartBar,
            options: {}
        };
        const myChartPangkalanLogbookBar = new Chart(
            document.getElementById('canvas_pangkalanlogbookchart_bar'),
            configPangkalanLogbookBar
        );

        function refreshLogbookAgenChart() {
            let kategoriFilterPerAgenValue = cboKategoriFilterPerAgen.value;
            let isiKategoriFilterPerAgenValue;
            let cboKategoriFilterPerAgenValue;
            let myArr = kategoriFilterPerAgenValue.split("_");
            let kodeAgen;

            kodeAgen = document.getElementById('cboagen_grafikperagen');
            if (myArr[2] === "bulan") {
                cboKategoriFilterPerAgenValue = document.getElementById('cbo_bulanperagen');
            } else if (myArr[2] === "tanggal") {
                cboKategoriFilterPerAgenValue = document.getElementById('dtp_peragen');
            }
            isiKategoriFilterPerAgenValue = cboKategoriFilterPerAgenValue.value;

            // alert(myArr[2]);
            // alert(isiKategoriFilterPerAgenValue);

            $.ajax({
                type: 'POST',
                url: '{{ route('home.refreshagenlogbookchart') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    kriteria: myArr[2],
                    isiFilter: isiKategoriFilterPerAgenValue,
                    kodeAgen: kodeAgen.value
                },
                success: function(response) {
                    if (response.status == 'ok') {
                        myChartAgenLogbookBar.data.labels = response.labels.persentase;
                        myChartAgenLogbookBar.data.datasets[0].data = response.data
                            .persentase; // or you can iterate for multiple datasets
                        myChartAgenLogbookBar.update(); // finally update our chart
                        // {{-- ######### dari jhonatan ######## --}}
                        // myChartBestsellerDoughnut.data.labels = response.msg.labels;
                        // myChartBestsellerDoughnut.data.datasets[0].data = response.msg
                        //     .data; // or you can iterate for multiple datasets
                        // myChartBestsellerDoughnut.update(); // finally update our chart
                        // {{-- ######### dari jhonatan ######## --}}
                    }
                },
                error: function(response, textStatus, errorThrown) {
                    console.log(response);
                }
            });
        };
    </script>
@endsection
