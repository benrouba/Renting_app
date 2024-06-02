import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-side-nav',
  templateUrl: './side-nav.component.html',
  styleUrls: ['./side-nav.component.scss']
})
export class SideNavComponent {
  @Input() display: any;
  closeNav() {
    (<HTMLInputElement>document.getElementById("mySidenav")).style.width = "0";
    (<HTMLInputElement>document.getElementById("overlay")).classList.remove('active')

  }
}
