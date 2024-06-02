import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from "@angular/forms";
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm!: FormGroup;
  submit = false;
  constructor(private fb: FormBuilder, private router: Router) { }
  ngOnInit(): void {
    this.loginForm = this.fb.group({
      email: new FormControl("", [Validators.required, Validators.pattern("^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$")]),
      password: new FormControl("", Validators.required),
    });
  }
  get f() { return this.loginForm.controls }
  login() {
    this.submit = true
    if (this.loginForm.invalid) {
      console.log('====================================');
      console.log(this.loginForm);
      console.log('====================================');
      return
    }
    localStorage.setItem('token', '123456789')
    this.router.navigate(['/dashboard'])
  }
}
