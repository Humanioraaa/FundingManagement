@php
    $totalItem = array_sum($ItemChartData);
@endphp

@extends('layouts.master')
@section('content')
    <div class="flex flex-col gap-4 w-full">
        <div class="grid grid-cols-3 w-full gap-6">
            <div class="col-span-3">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-4 bg-white">
                        <div class="border-b border-dashed border-slate-300 dark:border-slate-700/40 my-3"></div>
                        <div class="grid grid-cols-12 gap-4 mb-8">
                            <div class="col-span-12 sm:col-span-6">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">Edu Fund
                                    Dashboard
                                </p>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div>
        <div class="grid grid-cols-3 w-full gap-6">
            @include('partial.total-campaign', [
                'campaignChartData' => $campaignChartData,
            ])
            @include('partial.money-donation', [
                'MoneyChartData' => $MoneyChartData,
            ])
            @include('partial.item-donation', [
                'ItemChartData' => $ItemChartData,
            ])

        </div>
        <div class="grid grid-cols-4 w-full gap-4">
            <div class=" bg-white">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">
                                    Rp. {{ number_format($totalnominal, 2, ',', '.') }}
                                </p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">Jumlah Donasi
                                    Uang Terkumpul</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class=" bg-white">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase"> Rp.
                                    {{ number_format($totalnominal, 2, ',', '.') }}
                                </p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">Jumlah Donasi
                                    Uang Dicairkan</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                            </div>
                        </div>

                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class=" bg-white">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">
                                    {{ $totalItem }}
                                </p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">Jumlah Donasi
                                    Barang</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                            </div>
                        </div>

                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class=" bg-white">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">
                                    {{ $schoolCount }}</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">Jumlah Sekolah
                                    Terbantu</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                            </div>
                        </div>

                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
        </div>
        <div class="grid grid-cols-2 w-full gap-4">
            <div class=" bg-white">
                <h1>
                    <div class="flex-auto p-4 ">
                        <div class="">
                            <div id="donasi_masuk" class="apex-charts"></div>
                        </div>
                    </div>
                </h1>
            </div>
            <div class=" bg-white">
                <div class="flex-auto p-4 ">
                    <div class="">
                        <div id="total_user" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 w-full gap-4">
            <div class=" bg-white">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                    <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Metode Pembayaran</th>
                                            <th scope="col" class="px-6 py-4">Nomor Rekening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($metode as $index => $m)
                                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $m->metode_pembayaran }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $m->nomor_rekening }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" bg-white">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                    <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Nama Campaign</th>
                                            <th scope="col" class="px-6 py-4">Total Donasi Diterima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table->take(6) as $index => $d)
                                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $d->MoneyDonation->Donation->Campaign->nama_campaign }} </td>
                                                <td class="whitespace-nowrap px-6 py-4"> {{ $d->nominal_terkumpul }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pagescript')
    <script>
        // total Campaign
        var options = {
            chart: {
                height: 180,
                type: "pie",
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            series: @json($campaignChartData),
            labels: @json($campaignChartLabel),
            colors: ["#d9e6fd", "#4a8af6", "#fbc659"],
            legend: {
                show: false,
                position: "bottom",
                horizontalAlign: "center",
                verticalAlign: "middle",
                floating: false,
                fontSize: "14px",
                offsetX: 0,
                offsetY: 6,
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240,
                    },
                    legend: {
                        show: false,
                    },
                },
            }, ],
        };

        var chart = new ApexCharts(document.querySelector("#total_campaign"), options);

        chart.render();

        // Donasi Uang
        var options = {
            chart: {
                height: 180,
                type: "pie",
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            series: @json($MoneyChartData),
            labels: @json($MoneyChartLabel),
            colors: ["#d9e6fd", "#4a8af6", "#fbc659"],
            legend: {
                show: false,
                position: "bottom",
                horizontalAlign: "center",
                verticalAlign: "middle",
                floating: false,
                fontSize: "14px",
                offsetX: 0,
                offsetY: 6,
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240,
                    },
                    legend: {
                        show: false,
                    },
                },
            }, ],
        };

        var chart = new ApexCharts(document.querySelector("#donasi_uang"), options);

        chart.render();

        // Donasi Barang
        var options = {
            chart: {
                height: 180,
                type: "pie",
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            series: @json($ItemChartData),
            labels: @json($ItemChartLabel),
            colors: ["#d9e6fd", "#4a8af6", "#fbc659"],
            legend: {
                show: false,
                position: "bottom",
                horizontalAlign: "center",
                verticalAlign: "middle",
                floating: false,
                fontSize: "14px",
                offsetX: 0,
                offsetY: 6,
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240,
                    },
                    legend: {
                        show: false,
                    },
                },
            }, ],
        };

        var chart = new ApexCharts(document.querySelector("#donasi_barang"), options);

        chart.render();

        //Line chart
        var options = {
            series: [{
                name: "Rp",
                data: @json($donasiLineChart),
            }, ],
            chart: {
                height: 350,
                type: "line",
                zoom: {
                    enabled: false,
                },
            },
            colors: ["#008ffb"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "straight",
                width: [3],
            },
            title: {
                text: "Jumlah Donasi Masuk",
                align: "left",
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            xaxis: {
                categories: @json($donasiChartLabels),
            },
        };

        var chart = new ApexCharts(document.querySelector("#donasi_masuk"), options);
        chart.render();

        //Total user

        var options = {
            chart: {
                height: 380,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        position: "top", // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,

                offsetY: -20,
                style: {
                    fontSize: "12px",
                    colors: ["#304758"],
                },
            },
            colors: ["#2a76f4"],
            series: [{
                name: "Users",
                data: @json($userBarChart),
            }, ],
            xaxis: {
                categories: @json($donasiChartLabels),
                position: "top",
                labels: {
                    offsetY: -18,
                },
                axisBorder: {
                    show: true,
                    color: "#28365f",
                },
                axisTicks: {
                    show: true,
                    color: "#28365f",
                },
                crosshairs: {
                    fill: {
                        type: "gradient",
                        gradient: {
                            colorFrom: "#D8E3F0",
                            colorTo: "#BED1E6",
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        },
                    },
                },
                tooltip: {
                    enabled: true,
                    offsetY: -35,
                },
            },
            fill: {
                gradient: {
                    enabled: false,
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [50, 0, 100, 100],
                },
            },
            yaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,

                },
            },
            title: {
                text: "Jumlah User EduFund",
                floating: true,
                offsetY: 350,
                align: "center",
                style: {
                    color: "#8997bd",
                },
            },
            grid: {
                row: {
                    colors: ["#afb7d21a", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.2,
                },
                borderColor: "#f1f3fa",
            },
        };

        var chart = new ApexCharts(document.querySelector("#total_user"), options);

        chart.render();
    </script>
@endsection
