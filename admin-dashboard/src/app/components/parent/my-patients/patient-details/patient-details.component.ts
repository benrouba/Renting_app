import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HttpService } from 'src/app/services/http.service';
import { NameService } from 'src/app/services/name.service';

@Component({
  selector: 'app-patient-details',
  templateUrl: './patient-details.component.html',
  styleUrls: ['./patient-details.component.scss']
})
export class PatientDetailsComponent implements OnInit {
  patient: any
  timelineEvents = [
    {
      title: 'Event 1',
      date: 'January 2023',
      description: 'Description of Event 1.'
    },
    {
      title: 'Event 2',
      date: 'February 2023',
      description: 'Description of Event 2.'
    },
    {
      title: 'Event 3',
      date: 'March 2023',
      description: 'Description of Event 3.'
    }
  ];
  constructor(private http: HttpService, private route: ActivatedRoute, private nameService: NameService) { }
  ngOnInit(): void {
    this.getPatientDetails()
    this.nameService.setTitle('Patient Details')
  }
  getPatientDetails() {
    this.route.params.subscribe(params => {
      this.http.get("users/" + params['id']).subscribe((res: any) => {
        if (res.status == 200) {
          this.patient = res.body
        }
      })
    })

  }
}
