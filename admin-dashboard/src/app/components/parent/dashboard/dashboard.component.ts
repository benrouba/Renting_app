import { Component, OnInit } from '@angular/core';
import { Chart } from 'chart.js';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {
  chart: any = [];
  data: any[] = []
  labels: any[] = []
  users: any
  bsInlineValue = new Date();
  constructor(private http: HttpService, private nameService: NameService) { }
  options: any = {
    plugins: {
      tooltip: {
        backgroundColor: "#192252",
        displayColors: false,
        yAlign: 'bottom',
        padding: {
          left: 15,
          right: 15,
          top: 10,
          bottom: 10
        },
        titleFont: {
          size: 14,
          family: "poppinsRegular",
        },
        callbacks: {
          title: () => null // or function () { return null; }
        }
      },
      legend: {
        backgroundColor: "#192252",
        titleFont: {
          size: 14,
          family: "poppinsRegular",
        }
      }
    },
    scales: {
      x: {
        grid: {
          display: false,
        },
        ticks: {
          color: "#C5D0E6",
          font: {
            size: 14,
            family: "poppinsRegular",
          }
        },
        border: {
          display: false
        }
      },
      y: {
        grid: {
          display: true,
          drawBorder: false,
          color: "#DFE8F6"
        },
        border: {
          dash: [3, 4],
          display: false
        },
        ticks: {
          color: "#C5D0E6",
          font: {
            size: 14,
            family: "poppinsRegular",
          }
        }
      }
    }
  }
  public barChartOptions: any = {

    responsive: true,
    legend: {
      display: false,
      position: 'bottom',
    },
    tooltips: {
      backgroundColor: "red",
      titleFontColor: "#08102B",
      titleFontFamily: "poppinsMeduim",
      bodyFontColor: "#3762F6",
      bodyFontFamily: "poppinsMeduim",
      xPadding: 20,
      borderWidth: 1,
      borderColor: "#3762F633",
      displayColors: false
    },

  };
  public barChartLegend = false;
  ngOnInit() {
    this.nameService.setTitle('Dashboard')
    this.getUsers()
    this.data = [{
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: ['#DFE8F6'],
      fill: false,
      borderRadius: 8,
      borderWidth: 1,
      pointBorderWidth: 2,
      hoverBackgroundColor: "#56CCF2",
      hoverBorderColor: "#56CCF2",
      borderColor: "#DFE8F6",
      pointRadius: 4,
    }]
    this.labels = ['01', '02', '03', '04', '05', '06']
  }
  getUsers() {
    this.http.get("users?limit=15").subscribe((res: any) => {
      if (res.status == 200) {
        console.log('====================================');
        console.log(res);
        this.users = res.body
        console.log('====================================');
      }
    })
  }
}
