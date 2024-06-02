import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-my-patients',
  templateUrl: './my-patients.component.html',
  styleUrls: ['./my-patients.component.scss']
})
export class MyPatientsComponent implements OnInit {
  constructor(private http: HttpService, private route: ActivatedRoute, private router: Router, private nameService: NameService) { }
  patients: any
  page: number = 1
  currentPage: any

  ngOnInit(): void {
    this.nameService.setTitle('Patient List')
    this.route.queryParamMap.subscribe(param => {
      if (Number(param.get('page'))) {
        this.currentPage = Number(param.get('page'))
        this.getPatients(this.currentPage)
      } else {
        this.currentPage = this.page;
        this.getPatients(this.page)
      }
    })
  }
  getPatients(page: any) {
    this.http.get("users?limit=8&skip=" + page).subscribe((res: any) => {
      if (res.status == 200) {
        console.log('====================================');
        console.log(res);
        this.patients = res.body
        console.log('====================================');
      }
    })
  }
  paginate(event: any) {
    this.page = event.page
    this.router.navigate(['/my-patients'], { queryParams: { page: this.page }, queryParamsHandling: "merge" });
  }
}
