@extends('climb-template.templates.main')

@section('style')
<style>
    img.client {
        width: 100px;
    }
</style>
@endsection

@section('content')

<h1 class="w-100 text-center text-dark my-4 mb-5">{{ $page_data['header'] }}</h1>

<div class="container">
  <div class="row g-5 mb-5">
    <div class="col-lg-6 order-2 order-lg-1">
      <div>{!! $company_data['tentang_perusahaan'] !!}</div>
    </div>
    <div class="col-lg-6 order-4 order-lg-3">
      <h5 class="card-title">Visi dan Misi</h5>
      <hr>
      <div class="card-text">
        {!! $company_data['visi_misi'] !!}
      </div>
    </div>
    <div class="col-lg-6 order-3 order-lg-4">
      {{-- <h5 class="card-title">Sejarah MKK</h5>
      <hr> --}}
      <a href="{{ $company_data['url_company_history'] }}" class="btn btn-primary btn-sm w-100">Ketahui Sejarah MKK</a>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
      <img class="w-100 img-cover" src="{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}" alt="..." style="height: 100%;">
    </div>
  </div>

  <div class="row mb-5">
      <div class="col-12">
          <div id="map-container"></div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">
          <h5>Klien</h5>
          <hr>
      </div>
      @foreach ($clients_data as $item)    
      <div class="col-6 d-flex justify-content-center">
          <a class="my-auto" href="{{ $item['url'] ?? '#!' }}" title="{{ $item['name'] }}" target="_blank">
              <img class="client" src="{{ config('directus.server_url').$item['logo']['data']['asset_url']}}?key=directus-medium-contain" alt="logo {{ $item['name'] }}">
          </a>
      </div>
      @endforeach
  </div>
</div>
<div class="mb-5 w-100"></div>
<x-molecules.footer :text="$application_data['footer']" add-class="text-center" />

<div class="modal fade" id="modalShowEmployee" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Total Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kabupaten/Kota</th>
                            <th>Total Karyawan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script>

var data = [
    ['id-3700', 1],
    ['id-ac', 1, 1],
    ['id-jt', 1, 13],
    ['id-be', 1, 7],
    ['id-bt', 1, 16],
    ['id-kb', 1, 20],
    ['id-bb', 1, 9],
    ['id-ba', 1, 17],
    ['id-ji', 1, 15],
    ['id-ks', 1, 22],
    ['id-nt', 1, 19],
    ['id-se', 1],
    ['id-kr', 1, 10],
    ['id-ib', 1],
    ['id-su', 1, 2],
    ['id-ri', 1, 4],
    ['id-sw', 1],
    ['id-ku', 1, 24],
    ['id-la', 1, 8],
    ['id-sb', 1, 3],
    ['id-ma', 1, 31],
    ['id-nb', 1, 18],
    ['id-sg', 1, 28],
    ['id-st', 1, 26],
    ['id-pa', 1, 34],
    ['id-jr', 1],
    ['id-ki', 1, 23],
    ['id-1024', 1],
    ['id-jk', 1, 11],
    ['id-go', 1, 29],
    ['id-yo', 1, 14],
    ['id-sl', 1, 27],
    ['id-sr', 1, 30],
    ['id-ja', 1, 5],
    ['id-kt', 1, 21]
];

const unit_api = async () => {
    await fetch(`https://mkk-sdm.rateamedia.site/api/units/count`)
        .then(res => res.json())
        .then(json => {
            let json_data
            
            data.map(i => {
                json_data = json[i[2]]
                i[1] = 0

                if (json_data) {
                    let count = json_data.reduce((n, i) => n+i.employee_count, 0)
                    i[1] = (count+0)
                    return i
                }

                return i
            })

            renderChart(data, json)
        })
}

unit_api()

const renderChart = (data, json) => {
    // Create the chart
    Highcharts.mapChart('map-container', {
        chart: {
            map: 'countries/id/id-all',
            backgroundColor: '#f5f5f5'
        },

        title: {
            text: 'Jumlah Cabang Kami'
        },

        subtitle: {
            text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.js">Indonesia</a>'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            },
            buttons: {
                zoomIn: {
                    align: 'right'
                },
                zoomOut: {
                    align: 'right'
                }
            }
        },

        colorAxis: {
            min: 0
        },

        plotOptions: {
            series: {
                events: {
                    click: async function (e) {
                        let _data = json[e.point.dbkey]
                        _data = _data.map(i => {
                            return `<tr>
                                    <td>${i.regency.name}</td>
                                    <td>${i.employee_count}</td>
                                </tr>`
                        })

                        let modalElement = document.getElementById('modalShowEmployee')
                        modalElement.querySelector('tbody').innerHTML = _data.join('')
                        let myModal = new bootstrap.Modal(modalElement)
                        myModal.show()
                    }
                }
            }
        },

        series: [{
            data: data,
            name: 'Jumlah',
            keys: ['hc-key', 'value', 'dbkey'],
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }],

        // tooltip: {	
        //     pointFormat: '<span>{point.name}, Rank: <b>{point.rank}</b>, Value 1: <b>{point.value}</b></span>'
        // }
    });
}

</script>
@endsection