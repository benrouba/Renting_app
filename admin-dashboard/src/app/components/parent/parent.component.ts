import { Component } from '@angular/core';

@Component({
  selector: 'app-parent',
  templateUrl: './parent.component.html',
  styleUrls: ['./parent.component.scss']
})
export class ParentComponent {
  openNav() {
    (<HTMLInputElement>document.getElementById("mySidenav")).style.width = "250px";
    (<HTMLInputElement>document.getElementById("overlay")).classList.add('active')
  }

  closeNav() {
    (<HTMLInputElement>document.getElementById("mySidenav")).style.width = "0";
    (<HTMLInputElement>document.getElementById("overlay")).classList.remove('active')

  }
}
