import { AgCartesianChartOptions } from '@ag-grid-community/core'
import * as agCharts from 'ag-charts-community'

const options: AgCartesianChartOptions = {
  container: document.getElementById('myChart'),
  data: generateSpiralData(),
  series: [
    {
      type: 'line',
      xKey: 'x',
      yKey: 'y',
      marker: {
        enabled: false,
      },
    },
  ],
  axes: [
    {
      type: 'number',
      position: 'bottom',
      tick: {
        count: 10,
      },
    },
    {
      type: 'number',
      position: 'left',
      tick: {
        count: 10,
      },
    },
  ],
  legend: {
    enabled: false,
  },
}

var chart = agCharts.AgChart.create(options)



function generateSpiralData() {
  var a = 1
  var b = 1
  var data = []
  var step = 0.1
  for (var th = 1; th < 50; th += step) {
    var r = a + b * th
    var datum = {
      x: r * Math.cos(th),
      y: r * Math.sin(th),
    }
    data.push(datum)
  }
  return data
}
