import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Category } from 'src/app/shared/models/category.model';

@Injectable({
  providedIn: 'root'
})
export class AdminCategoriesService {

  private path = "http://localhost:8000/api";
  constructor(private http: HttpClient) {}

  getCategories(): Observable<Category[]> {
    return this.http.get<Category[]>(`${this.path}/adminCategoriesIndex`);
  }

  deleteCategory(data: number): Observable<number> {
    return this.http.post<number>(`${this.path}/adminCategoryDelete`, data);
  }

 

  insertCategory(
    category_name: string
  ): Observable<number> {
    return this.http.post<number>(`${this.path}/adminCategoryStore`, {
      category_name
    });
  }
  
}
