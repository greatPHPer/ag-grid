import { AgCartesianChartOptions } from '@ag-grid-community/core'
import * as agCharts from 'ag-charts-community'

const options: AgCartesianChartOptions = {
  container: document.getElementById('myChart'),
  data: [
    { os: 'Windows', share: 88.07 },
    { os: 'macOS', share: 9.44 },
    { os: 'Linux', share: 1.87 },
  ],
  series: [
    {
      type: 'column',
      xKey: 'os',
      yKey: 'share',
    },
  ],
  axes: [
    {
      type: 'category',
      position: 'bottom',
      title: {
        text: 'Desktop Operating Systems',
        enabled: false,
      },
    },
    {
      type: 'number',
      position: 'left',
      title: {
        text: 'Market Share (%)',
        enabled: false,
      },
    },
  ],
  legend: {
    enabled: false,
  },
}

var chart = agCharts.AgChart.create(options)



