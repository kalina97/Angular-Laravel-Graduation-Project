import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Brand } from 'src/app/shared/models/brand.model';

@Injectable({
  providedIn: 'root'
})
export class AdminBrandsService {

  private path = "http://localhost:8000/api";
  constructor(private http: HttpClient) {}

  getBrands(): Observable<Brand[]> {
    return this.http.get<Brand[]>(`${this.path}/adminBrandsIndex`);
  }

  deleteBrand(data: number): Observable<number> {
    return this.http.post<number>(`${this.path}/adminBrandDelete`, data);
  }

  insertBrand(formData: FormData): Observable<Object> {
    return this.http.post<Object>(`${this.path}/adminBrandStore`, formData);
  }

}
