@extends('layouts.reports')
@section('title')
    <title>LPG | Data Logbook</title>
@endsection

@section('headertitle')
    <h1>REPORTS LOGBOOK</h1>
@endsection

@section('navlist')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('reports.logbook') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Logbook</p>
            </a>
        </li>
    </ul>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
    <li class="breadcrumb-item">Reports</li>
    <li class="breadcrumb-item active">Data Logbook</li>
@endsection

@section('content')
    <!-- /.row -->
    <div class="row">
        <!-- /.col -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Logbook</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control select2bs4" id="cbo_periodelogbook" style="width: 100%;">
                                    <option value="hari_ini">Hari Ini</option>
                                    <option value="3_hari">3 Hari - Hari ini</option>
                                    <option value="7_hari">7 Hari - Hari ini</option>
                                    <option value="14_hari">14 Hari - Hari ini</option>
                                    <option value="bulan_berjalan">Bulan ini</option>
                                    <option value="semua">Semua</option>
                                    <option value="berdasarkan_tanggal_logbook">Berdasarkan Tanggal Logbook</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group cbo-filter-periode-logbook" id="cbo_berdasarkan_tanggal_logbook">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="dtp_logbook">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" id="btn_periodelogbook">Submit</button>
                        </div>
                    </div>
                    <table id="tbl_logbook" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>AGEN</th>
                                <th>ID PANGKALAN</th>
                                <th>PANGKALAN</th>
                                <th>PENERIMAAN</th>
                                <th>PERSENTASE</th>
                                <th>GAP</th>
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
            $('#dtp_logbook').daterangepicker();

            //Buat hidden date picker kalau bukan berdasarkan_tanggal_expired
            $("div#cbo_berdasarkan_tanggal_logbook").hide();

            $("#tbl_logbook").DataTable({
                "dom": 'Bfrtip',
                "paging": true,
                "pageLength": 10,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "deferRender": true,
                "processing": true,
                "ajax": {
                    "url": '{{ route('reports.getlogbook') }}',
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",
                        kriteria: document.querySelector('#cbo_periodelogbook').value,
                        isiFilter: ""
                    },
                    "xhrFields": {
                        withCredentials: true
                    }
                },
                "columns": [{
                    "data": "kodeagen"
                }, {
                    "data": "idpangkalan"
                }, {
                    "data": "pangkalan"
                }, {
                    "data": "penerimaan",
                    render: $.fn.DataTable.render.number(',', '.', 0, '')
                }, {
                    "data": "persentase",
                    render: $.fn.DataTable.render.number(',', '.', 2, '')
                }, {
                    "data": "gap",
                    render: $.fn.DataTable.render.number(',', '.', 2, '')
                }],
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
            }).buttons().container().appendTo('#tbl_logbook_wrapper .col-md-6:eq(0)');
        });

        //FILTER
        const btnPeriodeLogbook = document.querySelector('#btn_periodelogbook');
        btnPeriodeLogbook.addEventListener('click', refreshLogbook);
        const cboPeriodeLogbook = document.querySelector('#cbo_periodelogbook');
        cboPeriodeLogbook.onchange = function() {
            let periodeLogbook = cboPeriodeLogbook.value;
            $("div.cbo-filter-periode-logbook").hide();
            $("#cbo_" + periodeLogbook).show();
        };

        function refreshLogbook() {
            let filterPeriodeLogbook = cboPeriodeLogbook.value;
            let isiFilterPeriodeLogbook;
            if (filterPeriodeLogbook == "berdasarkan_tanggal_penjualan") {
                isiFilterPeriodeLogbook = document.querySelector('#dtp_logbook').value;
            }
            $("#tbl_logbook").DataTable().context[0].ajax.data._token = "{{ csrf_token() }}";
            $("#tbl_logbook").DataTable().context[0].ajax.data.kriteria = filterPeriodeLogbook;
            $("#tbl_logbook").DataTable().context[0].ajax.data.isiFilter = isiFilterPeriodeLogbook;
            $("#tbl_logbook").DataTable().clear().draw();
            $("#tbl_logbook").DataTable().ajax.url('{{ route('reports.getlogbook') }}').load();
        };
    </script>
@endsection
