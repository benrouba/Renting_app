import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';
import { ModalDirective } from 'ngx-bootstrap/modal';
import { FormGroup, FormControl, Validators, FormBuilder } from "@angular/forms";

@Component({
  selector: 'app-properties',
  templateUrl: './properties.component.html',
  styleUrls: ['./properties.component.scss']
})
export class PropertiesComponent implements OnInit {
  properties: any
  page: number = 1
  currentPage: any
  client: any
  propertyForm!: FormGroup;
  submit: boolean = false;
  edit: boolean = false
  @ViewChild('childModal', { static: false }) childModal?: ModalDirective;
  @ViewChild('editModal', { static: false }) editModal?: ModalDirective;

  constructor(private http: HttpService, private route: ActivatedRoute, private nameService: NameService, private router: Router, private fb: FormBuilder) { }
  ngOnInit(): void {
    this.propertyForm = this.fb.group({
      address: new FormControl("", Validators.required),
      price: new FormControl("", Validators.required),
      province: new FormControl("", Validators.required),
      description	: new FormControl("", Validators.required),
      message: new FormControl("", Validators.required),
      rooms_number: new FormControl("", Validators.required),
      forrent: new FormControl("", Validators.required),
      is_available: new FormControl("", Validators.required),
      longitude: new FormControl("", Validators.required),
      latitude: new FormControl("", Validators.required),
    });
    this.nameService.setTitle('Properties')
    this.route.queryParamMap.subscribe(param => {
      if (Number(param.get('page'))) {
        this.currentPage = Number(param.get('page'))
        this.getproperties(this.currentPage)
      } else {
        this.currentPage = this.page;
        this.getproperties(this.page)
      }
    })
  }
  get f() { return this.propertyForm.controls }
  getproperties(page: any) {
    this.http.get("properties").subscribe((res: any) => {
      if (res.status == 200) {
        console.log(res);
        this.properties = res.body
        console.log(this.properties);
      }
    })
  }
  paginate(event: any) {
    this.page = event.page
    this.router.navigate(['/medical-history'], { queryParams: { page: this.page }, queryParamsHandling: "merge" });
  }
  showModal(client: any) {
    this.childModal?.show();
    this.client = client
  }
  deleteClient() {
    this.http.post("delete-property/" + this.client.id, {}).subscribe((res: any) => {
      if (res.status == 200) {
        console.log(res);
        this.properties.splice(this.properties.indexOf(this.client), 1)
        this.childModal?.hide();
      }
    })

  }
  editClient(client: any) {
    this.propertyForm.reset()
    this.submit = false
    this.edit = true
    this.editModal?.show();
    this.client = client
    this.propertyForm.patchValue({
      address: client.address,
      price: client.price,
      province: client.province,
      description: client.description,
      message: client.message,
      rooms_number: client.rooms_number,
      forrent: client.forrent,
      is_available: client.is_available,
      active: client.active,
      latitude: client.latitude,
      longitude: client.longitude,
    })
  }
  addClient() {
    this.edit = false
    this.propertyForm.reset()
    this.editModal?.show();
    this.submit = false
  }
  manageClient() {
    this.submit = true
    if (this.propertyForm.invalid) {
      return
    }
    this.propertyForm.value.usertype= "owner"
    if (this.edit) {
      this.http.post("update-property/" + this.client.id, this.propertyForm.value).subscribe((res: any) => {
        if (res.status == 200) {
          console.log(res);
          Object.assign(this.client, res.body)
          this.editModal?.hide();
        }
      })
    } else {
      this.http.post("register/", this.propertyForm.value).subscribe((res: any) => {

      })
      this.getproperties(this.currentPage)
      this.editModal?.hide();
    }
  }
}
