import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';
import { ModalDirective } from 'ngx-bootstrap/modal';
import { FormGroup, FormControl, Validators, FormBuilder } from "@angular/forms";

@Component({
  selector: 'app-property-owners',
  templateUrl: './property-owners.component.html',
  styleUrls: ['./property-owners.component.scss']
})
export class PropertyOwnersComponent implements OnInit {
  users: any
  page: number = 1
  currentPage: any
  client: any
  userForm!: FormGroup;
  submit: boolean = false;
  edit: boolean = false
  @ViewChild('childModal', { static: false }) childModal?: ModalDirective;
  @ViewChild('editModal', { static: false }) editModal?: ModalDirective;

  constructor(private http: HttpService, private route: ActivatedRoute, private nameService: NameService, private router: Router, private fb: FormBuilder) { }
  ngOnInit(): void {
    this.userForm = this.fb.group({
      email: new FormControl("", [Validators.required, Validators.pattern("^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$")]),
      name: new FormControl("", Validators.required),
      phone_number: new FormControl("", Validators.required),
      username: new FormControl("", Validators.required),
      password: new FormControl("", Validators.required),
    });
    this.nameService.setTitle('Owners')
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
  get f() { return this.userForm.controls }
  getUsers(page: any) {
    this.http.get("owners").subscribe((res: any) => {
      if (res.status == 200) {
        console.log(res);
        this.users = res.body
        console.log(this.users);
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
    this.http.post("delete-client/" + this.client.id, {}).subscribe((res: any) => {
      if (res.status == 200) {
        console.log(res);
        this.users.splice(this.users.indexOf(this.client), 1)
        this.childModal?.hide();
      }
    })

  }
  editClient(client: any) {
    this.userForm.reset()
    this.submit = false
    this.edit = true
    this.editModal?.show();
    this.client = client
    this.userForm.patchValue({
      email: client.email,
      name: client.name,
      phone_number: client.phone_number,
      username: client.username,
      password: client.password
    })
  }
  addClient() {
    this.edit = false
    this.userForm.reset()
    this.editModal?.show();
    this.submit = false
  }
  manageClient() {
    this.submit = true
    if (this.userForm.invalid) {
      return
    }
    this.userForm.value.usertype= "owner"
    if (this.edit) {
      this.http.post("edit-client/" + this.client.id, this.userForm.value).subscribe((res: any) => {
        if (res.status == 200) {
          console.log(res);
          Object.assign(this.client, res.body)
          this.editModal?.hide();
        }
      })
    } else {
      this.http.post("register/", this.userForm.value).subscribe((res: any) => {

      })
      this.getUsers(this.currentPage)
      this.editModal?.hide();
    }
  }
}
