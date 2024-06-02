import { Component, OnInit } from '@angular/core';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  constructor(private nameService: NameService) { }
  imgUrl: any
  selectedFile: any = null;
  ngOnInit(): void {

  }
  showPreviewImage(event: any,) {
    console.log(event);
    this.nameService.setTitle('Profile')
    if (event.target.files && event.target.files[0]) {
      var reader = new FileReader();
      reader.onload = (event: any) => {
        this.imgUrl = event.target.result;
      };
      reader.readAsDataURL(event.target.files[0]);
      this.selectedFile = <File>event.target.files[0];
    }
  }
}
