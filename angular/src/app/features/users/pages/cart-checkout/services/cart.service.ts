import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Cart } from 'src/app/shared/models/cart.model';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CartService {

  private path = "http://localhost:8000/api";

  constructor(private http: HttpClient) {}

  getUserItems(id): Observable<Cart[]> {
    return this.http.get<Cart[]>(`${this.path}/showUserCart/${id}`);
  }

  deleteFromCart(id: number): Observable<Object> {
    return this.http.post<Object>(`${this.path}/deleteUserItem`, id);
  }

  checkout(id: number): Observable<Object> {
    return this.http.post<Object>(`${this.path}/checkout`, id).pipe(
      map((reponse: Object) => {
        console.log(id, "ID USER");
        console.log(reponse, "CHECKOUT");
        return reponse;
      })
    );
  }

  showItem(id: number): Observable<Cart> {
    return this.http.get<Cart>(`${this.path}/showItem/${id}`);
  }

  addToCart(
    user_id: number,
    product_id: number,
    quantity: number
  ): Observable<Cart> {
    return this.http.post<Cart>(`${this.path}/addToCart`, {
      user_id,
      product_id,
      quantity
    });
  }
}
