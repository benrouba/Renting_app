import { Injectable } from '@angular/core';
import { Observable, of, } from 'rxjs';
import { environment } from "../../environments/environment";
import { HttpClient, } from '@angular/common/http';

const endpoint = environment.endpoint

@Injectable({
  providedIn: 'root'
})
export class HttpService {

  constructor(private http: HttpClient) { }
  get(url: any): Observable<any> {
    return this.http.get(endpoint + url, { headers: { "Authorization": "Bearer " + localStorage.getItem('token') }, observe: "response" }).pipe();
  }
  post(url: any,data:any): Observable<any> {
    return this.http.post(endpoint + url,data, { headers: { "Authorization": "Bearer " + localStorage.getItem('token') }, observe: "response" }).pipe();
  }
}
