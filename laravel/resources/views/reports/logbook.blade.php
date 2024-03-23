@extends('layouts.reports')
@section('title')
    <title>LPG | Data Performance Agen</title>
@endsection

@section('headertitle')
    <h1>REPORTS PERFORMANCE AGEN</h1>
@endsection

@section('navlist')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('reports.performanceagen') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Performa Agen</p>
            </a>
        </li>
    </ul>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
    <li class="breadcrumb-item">Reports</li>
    <li class="breadcrumb-item active">Data Performance Agen</li>
@endsection

@section('content')
    <!-- /.row -->
    <div class="row">
        <!-- /.col -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Performance Agen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control select2bs4" id="cbo_periodemap" style="width: 100%;">
                                    <option value="hari_ini">Hari Ini</option>
                                    <option value="3_hari">3 Hari - Hari ini</option>
                                    <option value="7_hari">7 Hari - Hari ini</option>
                                    <option value="14_hari">14 Hari - Hari ini</option>
                                    <option value="bulan_berjalan">Bulan ini</option>
                                    <option value="semua">Semua</option>
                                    <option value="berdasarkan_bulan_map">Berdasarkan Bulan Map</option>
                                    <option value="berdasarkan_tanggal_map">Berdasarkan Tanggal Map</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group cbo-filter-periode-map" id="cbo_berdasarkan_tanggal_map">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="dtp_map">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_periodemap">Submit</button>
                        </div>
                    </div>
                    <table id="tbl_map" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kota / Kabupaten</th>
                                <th>Nama Agen</th>
                                <th>SP</th>
                                <th>%MAP vs Penyaluran Simelon</th>
                                <th>Persentase Pencatatan Pangkalan 100%</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('jsbawah')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            //Date range picker
            $('#dtp_map').daterangepicker();

            //Buat hidden date picker kalau bukan berdasarkan_tanggal_expired
            $("div#cbo_berdasarkan_tanggal_map").hide();

            $("#tbl_map").DataTable({
                "dom": 'Bfrtip',
                "paging": true,
                "pageLength": 10,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "deferRender": true,
                "processing": true,
                "server-side": true,
                "ajax": {
                    "url": '{{ route('reports.getperformanceagen') }}',
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",
                        kriteria: document.querySelector('#cbo_periodemap').value,
                        isiFilter: ""
                    },
                    "xhrFields": {
                        withCredentials: true
                    }
                },
                "columns": [{
                    "data": "no"
                }, {
                    "data": "kota"
                }, {
                    "data": "namaagen"
                }, {
                    "data": "idagen"
                }, {
                    "data": "persentasemapvspenyaluran",
                    render: $.fn.DataTable.render.number(',', '.', 2, '')
                }, {
                    "data": "persentasepangkalan100persen",
                    render: $.fn.DataTable.render.number(',', '.', 2, '')
                }],
                "order": [
                    [4, 'desc'],
                    [5, 'desc']
                ],
                /* columnDefs: [{
                    targets: [7, 8],
                    render: $.fn.dataTable.render.number(',', '.', 2, '')
                }, {
                    targets: [2, 4, 10],
                    render: $.fn.dataTable.render.moment('D MMM YYYY')
                }], */
                /* footerCallback: function(row, data, start, end, display) {
                    let api = this.api();

                    // Remove the formatting to get integer data for summation
                    let intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    // Total over all pages
                    let grandTotalJumlah = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    let subTotalJumlah = api
                        .column(9, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer with a subtotal
                    let numFormat = $.fn.dataTable.render.number(',', '.', 2, '').display;
                    $(api.column(9).footer()).html(numFormat(subTotalJumlah) + '(' + numFormat(
                        grandTotalJumlah) + ')');
                },*/
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tbl_map_wrapper .col-md-6:eq(0)');
        });

        //FILTER
        const btnPeriodeMap = document.querySelector('#btn_periodemap');
        btnPeriodeMap.addEventListener('click', refreshMap);
        const cboPeriodeMap = document.querySelector('#cbo_periodemap');
        cboPeriodeMap.onchange = function() {
            let periodeMap = cboPeriodeMap.value;
            $("div.cbo-filter-periode-map").hide();
            $("#cbo_" + periodeMap).show();
        };

        function refreshMap() {
            let filterPeriodeMap = cboPeriodeMap.value;
            let isiFilterPeriodeMap;
            if (filterPeriodeMap == "berdasarkan_tanggal_map") {
                isiFilterPeriodeMap = document.querySelector('#dtp_map').value;
            }
            $("#tbl_map").DataTable().context[0].ajax.data._token = "{{ csrf_token() }}";
            $("#tbl_map").DataTable().context[0].ajax.data.kriteria = filterPeriodeMap;
            $("#tbl_map").DataTable().context[0].ajax.data.isiFilter = isiFilterPeriodeMap;
            $("#tbl_map").DataTable().clear().draw();
            $("#tbl_map").DataTable().ajax.url('{{ route('reports.getperformanceagen') }}').load();
        };
    </script>
@endsection
