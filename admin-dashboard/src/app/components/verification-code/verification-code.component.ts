import { Component } from '@angular/core';

@Component({
  selector: 'app-verification-code',
  templateUrl: './verification-code.component.html',
  styleUrls: ['./verification-code.component.scss']
})
export class VerificationCodeComponent {

  onOtpChange($event: any) {
    console.log($event);
  }
}
