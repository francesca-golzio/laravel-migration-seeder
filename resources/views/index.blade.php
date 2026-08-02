<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite (['resources/sass/app.scss', 'resources/js/app.js'])
  <title>laravel-migration-seeder</title>
</head>
<body>
  <h1>laravel-migration-seeder</h1>

  <caption>
    <div class="d-flex">
      <h2>London King's Cross</h2>
      <h3>departures</h3>
    </div>
  </caption>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">date</th>
          <th scope="col">company</th>
          <th scope="col">destination</th>
          <th scope="col">dep</th>
          <th scope="col">exp</th>
          <th scope="col">plat</th>
          <th scope="col">status</th>
          <th scope="col">arr</th>
          <th scope="col">exp</th>
          <th scope="col">coach</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($trains as $train)
        @if (!$train->departure_date->isPast())
          <tr class="">
            <td>{{ $train->getDepartureDay() }}</td>
            <td scope="row">{{ $train->company }}</td>
            <td>{{ $train->arrival_station }}</td>
            <td>{{ $train->getDepartureTime() }}</td>
            <td>{{ $train->getExpectedDepartureTime() }}</td>
            <td>{{ $train->platform }}</td>
            <td>
              @if ($train->is_cancelled)
              cancelled
              @else
                @if ($train->is_on_time)
                on time
                @else
                delayed
                @endif
              @endif
            </td>
            <td>{{ $train->getArrivalTime() }}</td>
            <td>{{ $train->getExpectedArrivalTime() }}</td>
            <td>{{ $train->carriages }}</td>
          </tr>
        @endif
      @endforeach  
      </tbody>
    </table>
  </div>


  

</body>
</html>