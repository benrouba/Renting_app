import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-medical-history',
  templateUrl: './medical-history.component.html',
  styleUrls: ['./medical-history.component.scss']
})
export class MedicalHistoryComponent implements OnInit {
  users: any
  page: number = 1
  currentPage: any
  constructor(private http: HttpService, private route: ActivatedRoute, private router: Router, private nameService: NameService) { }
  ngOnInit(): void {
    this.nameService.setTitle('Medical History')
    this.route.queryParamMap.subscribe(param => {
      if (Number(param.get('page'))) {
        this.currentPage = Number(param.get('page'))
        this.getUsers(this.currentPage)
      } else {
        this.currentPage = this.page;
        this.getUsers(this.page)
      }
    })
  }
  getUsers(page: any) {
    this.http.get("users?limit=9&skip=" + page).subscribe((res: any) => {
      if (res.status == 200) {
        console.log('====================================');
        console.log(res);
        this.users = res.body
        console.log('====================================');
      }
    })
  }
  paginate(event: any) {
    this.page = event.page
    this.router.navigate(['/medical-history'], { queryParams: { page: this.page }, queryParamsHandling: "merge" });
  }
}
