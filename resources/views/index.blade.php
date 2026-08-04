<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite (['resources/sass/app.scss', 'resources/js/app.js'])
  <title>The Magical Journey</title>
</head>
<body>

  <header>
    <div class="container p-2">
      <h1>The Magical Journey</h1>
    </div>
  </header>
  
  <main>
    <div class="container text-uppercase">
      <div class="table_and_caption d-flex flex-column">
        <caption>
          <div class="caption_title d-flex justify-content-between text-bg-dark">
            <h2>London King's Cross</h2>
            <h3>departures</h3>
          </div>
        </caption>
        <div class="table-responsive">
          <table class="table table-borderless table-dark table-striped">
            <thead>
              <tr>
                <th scope="col"><div class="px-2">date</div></th>
                <th scope="col"><div class="px-2">train &middot; company</div></th>
                <th scope="col"><div class="px-2">from</div></th>
                <th scope="col"><div class="px-2">destination</div></th>
                <th scope="col"><div class="px-2">dep</div></th>
                <th scope="col"><div class="px-2">exp</div></th>
                <th scope="col"><div class="px-2">plat</div></th>
                <th scope="col"><div class="px-2">status</div></th>
                <th scope="col"><div class="px-2">arr</div></th>
                <th scope="col" class="text-center"><div class="px-2">exp</div></th>
                <th scope="col" class="text-center"><div class="px-2">coach</div></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($trains as $train)
              <tr class="">
                <td><div class="px-2">{{ $train->getDepartureDay() }}</div></td>
                <td scope="row"><div class="px-2">{{ $train->train_code }} &middot; {{ $train->company }}</div></td>
                <td><div class="px-2">{{ $train->departure_station }}</div></td>
                <td><div class="px-2">{{ $train->arrival_station }}</div></td>
                <td><div class="px-2">{{ $train->getDepartureTime() }}</div></td>
                <td class="text-center"><div class="px-2">{{ $train->getExpectedDepartureTime() }}</div></td>
                <td class="text-center"><div class="px-2">{{ $train->platform }}</div></td>
                <td>
                  <div class="px-2">
                  @if ($train->is_cancelled)
                    <div><mark class="cancelled">cancelled</mark></div>
                  @else
                    @if ($train->is_on_time)
                    <div><mark class="on_time">on time</mark></div>
                    @else
                    <div><mark class="delayed">delayed</mark></div>
                    @endif
                  @endif
                  </div>
                </td>
                <td><div class="px-2">{{ $train->getArrivalTime() }}</div></td>
                <td class="text-center"><div class="px-2">{{ $train->getExpectedArrivalTime() }}</div></td>
                <td class="text-center"><div class="px-2">{{ $train->carriages }}</div></td>
              </tr>
            @endforeach  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <div class="container p-2">
      <div class="text-center">2026 &copy; The Magical Journey<br>~ Francesca Golzio ~</div>
      <div class=" img_credits text-end">
        Credits: <a href="https://commons.wikimedia.org/w/index.php?curid=19363732">background image</a> by &copy;
        <a href="//commons.wikimedia.org/wiki/User:Colin" title="User:Colin">Colin</a>
        &nbsp;/&nbsp;
        <a href="//commons.wikimedia.org/wiki/Main_Page" title="Main Page">Wikimedia Commons</a>
        &nbsp;/&nbsp; 
        <a href="https://creativecommons.org/licenses/by-sa/3.0" title="Creative Commons Attribution-Share Alike 3.0">CC BY-SA 3.0</a>
      </div>
    </div>
  </footer> 

</body>
</html>