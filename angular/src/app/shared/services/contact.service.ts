import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Contact } from '../models/contact.model';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ContactService {

  constructor(
    private http : HttpClient
  ) { }

  insertContact(data): Observable<Contact>{
    return this.http.post<Contact>(`http://localhost:8000/api/insertContact`, data);
  }

  /*getInfos() {
    return this.http.get('http://localhost:8000/api/infos');
  }*/
}
