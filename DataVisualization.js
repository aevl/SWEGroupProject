      google.charts.load('current', {
        'packages': ['bar']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Normal Users', 'Corportate Users'],
          ['2015', 1170, 460],
          ['2016', 660, 1120],
          ['2017', 1030, 540]
        ]);

        var options = {
          chart: {
            title: 'User Growth',
            subtitle: 'Users and Companies',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {
            format: 'decimal'
          },
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function(e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
