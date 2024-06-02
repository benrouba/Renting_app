import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from "@angular/router";
import { HttpClient, HttpClientModule, } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HashLocationStrategy, LocationStrategy } from '@angular/common';

// ************************************************************************ngx bootstrap ************************************************************************
import { PaginationModule } from 'ngx-bootstrap/pagination';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
// *******************************************************Chart Module*******************************************************
import { NgChartsModule } from 'ng2-charts';

// ************************************************************************Tools************************************************************************
import { FullCalendarModule } from '@fullcalendar/angular';
import { NgOtpInputModule } from 'ng-otp-input';
// ************************************************************************ngx bootstrap ************************************************************************
import { ModalModule } from 'ngx-bootstrap/modal';

// ************************************************************************Guards************************************************************************

import { authGuard } from './guards/auth.guard';

// ************************************************************************Components************************************************************************
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { LoginSignUpComponent } from './reusable/login-sign-up/login-sign-up.component';
import { SignUpComponent } from './components/sign-up/sign-up.component';
import { ForgetPasswordComponent } from './components/forget-password/forget-password.component';
import { VerificationCodeComponent } from './components/verification-code/verification-code.component';
import { ParentComponent } from './components/parent/parent.component';
import { DashboardComponent } from './components/parent/dashboard/dashboard.component';
import { MedicalHistoryComponent } from './components/parent/medical-history/medical-history.component';
import { ProfileComponent } from './components/parent/profile/profile.component';
import { MyPatientsComponent } from './components/parent/my-patients/my-patients.component';
import { HeaderComponent } from './reusable/header/header.component';
import { SideNavComponent } from './reusable/side-nav/side-nav.component';
import { PatientDetailsComponent } from './components/parent/my-patients/patient-details/patient-details.component';
import { MessagesComponent } from './components/parent/messages/messages.component';
import { AppointmentComponent } from './components/parent/appointment/appointment.component';
import { PropertiesComponent } from './components/properties/properties.component';
import { ClientsComponent } from './components/clients/clients.component';
import { PropertyOwnersComponent } from './components/property-owners/property-owners.component';


const routes: Routes = [

  {
    path: "",
    component: ParentComponent,
    children: [
      { path: "dashboard", component: DashboardComponent },
      { path: "medical-history", component: MedicalHistoryComponent },
      { path: "my-patients", component: MyPatientsComponent },
      { path: "appointment", component: AppointmentComponent },
      { path: "messages", component: MessagesComponent },
      { path: "clients", component: ClientsComponent },
      { path: "owners", component: PropertyOwnersComponent },
      { path: "properties", component: PropertiesComponent },
      { path: "my-patients/patient-details/:id", component: PatientDetailsComponent },
      { path: '', redirectTo: 'dashboard', pathMatch: 'full' },
    ]
  },
  { path: "profile", component: ProfileComponent, canActivate: [authGuard] },
]
@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    LoginSignUpComponent,
    SignUpComponent,
    ForgetPasswordComponent,
    VerificationCodeComponent,
    ParentComponent,
    DashboardComponent,
    MedicalHistoryComponent,
    MyPatientsComponent,
    ProfileComponent,
    HeaderComponent,
    SideNavComponent,
    PatientDetailsComponent,
    MessagesComponent,
    AppointmentComponent,
    PropertiesComponent,
    ClientsComponent,
    PropertyOwnersComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    RouterModule.forRoot(routes),
    PaginationModule.forRoot(),
    NgOtpInputModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    NgChartsModule,
    BsDatepickerModule.forRoot(),
    ModalModule.forRoot(),
    BrowserAnimationsModule,
    FullCalendarModule

  ],
  providers: [authGuard, { provide: LocationStrategy, useClass: HashLocationStrategy },],
  bootstrap: [AppComponent]
})
export class AppModule { }
