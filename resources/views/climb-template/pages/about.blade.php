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
      <a href="#!" class="btn btn-primary btn-sm w-100">Ketahui Sejarah MKK</a>
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
      <div class="col-lg-1 d-flex mr-4">
          <a class="my-auto" href="{{ $item['url'] ?? '#!' }}" title="{{ $item['name'] }}" target="_blank">
              <img class="client" src="{{ config('directus.server_url').$item['logo']['data']['asset_url']}}?key=directus-medium-contain" alt="logo {{ $item['name'] }}">
          </a>
      </div>
      @endforeach
  </div>
</div>
<div class="mb-5 w-100"></div>
<x-molecules.footer :text="$application_data['footer']" add-class="text-center" />
@endsection

@section('script')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
<script>
// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    // ['id-3700', 0],
    ['id-ac', 1, 'id-ac'],
    ['id-jt', 2],
    ['id-be', 3],
    ['id-bt', 4],
    ['id-kb', 5],
    ['id-bb', 6],
    ['id-ba', 7],
    ['id-ji', 8],
    ['id-ks', 9],
    ['id-nt', 10],
    ['id-se', 11],
    ['id-kr', 12],
    ['id-ib', 13],
    ['id-su', 14],
    ['id-ri', 15],
    ['id-sw', 16],
    ['id-ku', 17],
    ['id-la', 18],
    ['id-sb', 19],
    ['id-ma', 20],
    ['id-nb', 21],
    ['id-sg', 22],
    ['id-st', 23],
    ['id-pa', 24],
    ['id-jr', 25],
    ['id-ki', 26],
    ['id-1024', 27],
    ['id-jk', 28],
    ['id-go', 29],
    ['id-yo', 30],
    ['id-sl', 31],
    ['id-sr', 32],
    ['id-ja', 33],
    ['id-kt', 34]
];

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
                click: function (e) {
                    console.log(e.point['hc-key'])
                    var text = '<b>Clicked</b><br>Series: ' + this.name +
                            '<br>Point: ' + e.point.name + ' (' + e.point.value + ')';
                    if (!this.chart.clickLabel) {
                        this.chart.clickLabel = this.chart.renderer.label(text, 0, 250)
                            .css({
                                width: '180px'
                            })
                            .add();
                    } else {
                        this.chart.clickLabel.attr({
                            text: text
                        });
                    }
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

</script>
@endsection