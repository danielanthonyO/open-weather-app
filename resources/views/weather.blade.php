@extends('layouts.app')
@section('content')
    <h1 class="title">Weather App</h1>

    <form method="get" action="{{ route('weather') }}" class="form">
        <label for="city" class="label">Enter city name</label>
        <input type="text" name="city" id="city" class="input" placeholder="e.g., London" autocomplete="off"
            value="{{ $city }}" />
        <button type="submit" class="btn">Get Weather</button>
    </form>

    @if ($error)
        <div class="alert error">
            {{ $error }}
        </div>
    @elseif (!empty($weatherData))
        <div class="results">
            <h2>Weather in {{ $weatherData['name'] }}</h2>
            <table class="weather-table">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weatherData['main'] as $key => $value)
                        <tr>
                            <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                            <td>
                                {{ is_numeric($value) ? number_format($value, 2) : $value }}
                                @if (in_array($key, ['temp', 'feels_like', 'temp_min', 'temp_max']))
                                    °C
                                @elseif($key === 'humidity')
                                    %
                                @elseif($key === 'pressure')
                                    hPa
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    </div>
@endsection()
