import { Component, OnInit } from '@angular/core';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  title: any
  constructor(private nameService: NameService) { }
  ngOnInit(): void {
    this.nameService.getTitle().subscribe(res => {
      this.title = res
    })
  }
  openNav() {
    (<HTMLInputElement>document.getElementById("mySidenav")).style.width = "250px";
    (<HTMLInputElement>document.getElementById("overlay")).classList.add('active')
  }
}
