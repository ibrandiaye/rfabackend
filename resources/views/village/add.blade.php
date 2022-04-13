{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister Département')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.2/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
<style>
    html, body, #container, #map {
    padding: 0;
    margin: 0;
    }
    html, body, #map, #container {
    height: 440px;
    }
    </style>
@endsection
@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES VILLAGES</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('village.index') }}" role="button" class="btn btn-success">Liste</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('village.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE village</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom village</label>
                                        <input type="text" name="nomv"  value="{{ old('nomv') }}" class="form-control" min="1" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="number" id="latitude" name="latitudev"  value="{{ old('latitudev') }}" step="any" class="form-control" required>
                                            </div>
                                        </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Longitude</label>
                                                    <input type="number" id="longitude" name="longitudev"  value="{{ old('longitudev') }}" step="any" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>

                                    <div class="col-lg-6">
                                        <label>Nom Commune</label>
                                        <select class="form-control" name="commune_id" required="">
                                            @foreach ($communes as $commune)
                                            <option value="{{$commune->id}}">{{$commune->nomc}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                    <div id="map"></div>
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>
                            </div>

                            </div>

            </form>
            </div>
        </div>



@endsection
@section('script')

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
  integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
  crossorigin=""></script>

<!-- Load Esri Leaflet Geocoder from CDN -->

<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js"
  integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w=="
  crossorigin=""></script>
<script>
var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> Contributors'
});
//remember last position
var map;
var marker;
$(document).ready(function () {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);

        }

});
function showPosition(position) {
    document.getElementById('latitude').value = position.coords.latitude ;
    document.getElementById('longitude').value = position.coords.longitude;
    marker.setLatLng([position.coords.latitude,position.coords.longitude]);
    map.panTo([position.coords.latitude,position.coords.longitude]);
    console.log(rememberLat);
  }

  var rememberLat = document.getElementById('latitude').value;
  var rememberLong = document.getElementById('longitude').value;
    if( !rememberLat || !rememberLong ) { rememberLat = 14.6900; rememberLong = -14.5273;}
    var map = new L.Map('map', {
    'center': [rememberLat, rememberLong],
    'zoom': 8,
    'layers': [tileLayer]
    });
    var myIcon = L.icon({
        iconUrl: '/image/icone.ico',
        iconSize: [50, 50],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76],
        shadowUrl: '/image/icone.ico',
    shadowSize: [50, 50],
    shadowAnchor: [22, 94]

    });
     marker = L.marker([rememberLat, rememberLong], {draggable: true}).addTo(map);
    marker.on('dragend', function (e) {
    updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });
    map.on('click', function (e) {
    marker.setLatLng(e.latlng);
    updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });

function updateLatLng(lat,lng,reverse) {

document.getElementById('latitude').value = marker.getLatLng().lat;
document.getElementById('longitude').value = marker.getLatLng().lng;
map.panTo([lat,lng]);

}


var searchControl = L.esri.Geocoding.geosearch({
    position: 'topright',
    placeholder: 'Enter an address or place e.g. 1 York St',
    useMapBounds: false,
    providers: [L.esri.Geocoding.arcgisOnlineProvider({
      apikey: 'AAPKdfd3d5a3ccd54600901d1a2a12de3678puADQZR0gGtxIW_LvJSZL_Wwpf12lAg0OeC4pSmGEnnd7D3zIJqpzdL-zuLp5Txy', // replace with your api key - https://developers.arcgis.com
      nearby: {
        lat: 14.6900,
        lng: -14.5273
      }
    })]
  }).addTo(map);

  var results = L.layerGroup().addTo(map);

  searchControl.on('results', function (data) {
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      //results.addLayer(L.marker(data.results[i].latlng));
      marker.setLatLng(data.results[i].latlng);
      document.getElementById('latitude').value = marker.getLatLng().lat;
    document.getElementById('longitude').value = marker.getLatLng().lng;
    }
  });

</script>
@endsection
