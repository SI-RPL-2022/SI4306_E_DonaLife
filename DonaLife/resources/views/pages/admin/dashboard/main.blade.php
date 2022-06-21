<x-admin-layout title="Dashboard">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-12">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bolder text-dark">Keterangan Data</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-warning me-5">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <h3 class="fw-bolder text-gray-800 fs-6">Total User</h3>
                                </div>
                                <span class="fw-bolder text-warning py-1">{{$user}}</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-success me-5">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <h3 class="fw-bolder text-gray-800 fs-6">Uang Campaign</h3>
                                </div>
                                <span class="fw-bolder text-success py-1">{{$uangCampaign}}</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                                <span class="svg-icon svg-icon-danger me-5">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <h3 class="fw-bolder text-gray-800 fs-6">Barang Campaign</h3>
                                </div>
                                <span class="fw-bolder text-danger py-1">{{$barangCampaign}}</span>
                            </div>
                            <div class="d-flex align-items-center bg-light-info rounded p-5">
                                <span class="svg-icon svg-icon-info me-5">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <div class="flex-grow-1 me-2">
                                    <h3 class="fw-bolder text-gray-800 fs-6">Paket</h3>
                                </div>
                                <span class="fw-bolder text-info py-1">{{$paket}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var _ydata = <?php echo $months; ?>;
        var _xdata = <?php echo $monthcount; ?>;
        var _ydata2 = <?php echo $months2; ?>;
        var _xdata2 = <?php echo $monthcount2; ?>;
        var _ydata3 = <?php echo $months3; ?>;
        var _xdata3 = <?php echo $monthcount3; ?>;
    </script>
    <div class="container row"  style="height: 70rem;">
        <div class="col-sm-6">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-sm-6">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col">
            <canvas id="myChart3"></canvas>
        </div>
    </div>
    <script>
        const data = {
            labels: _ydata,
            datasets: [{
                label: 'Campaign Donasi Uang',
                backgroundColor: 'blue',
                borderColor: 'rgb(255, 99, 132)',
                data: _xdata,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        const data2 = {
            labels: _ydata2,
            datasets: [{
                label: 'Campaign Donasi Barang',
                backgroundColor: 'red',
                borderColor: 'rgb(255, 99, 132)',
                data: _xdata2,
            }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {}
        };
    </script>

    <script>
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>

    <script>
        const data3 = {
            labels: _ydata3,
            datasets: [{
                label: 'Jumlah User Donalife',
                backgroundColor: [
                    'Black',
                    'Blue',
                    'Orange',
                    'DodgerBlue',
                    'Gray',
                    'LightGray'
                ],
                borderColor: [
                    'Black',
                    'Blue',
                    'Orange',
                    'DodgerBlue',
                    'Gray',
                    'LightGray'
                ],
                data: _xdata3,
            }]
        };

        const config3 = {
            type: 'bar',
            data: data3,
            options: {}
        };
    </script>

    <script>
        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/chart.min.js" crossorigin="anonymous"></script>
</x-admin-layout>