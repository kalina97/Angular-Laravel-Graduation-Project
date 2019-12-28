import { Component, OnInit } from '@angular/core';
import { CartService } from '../services/cart.service';
import { ActivatedRoute, Router } from '@angular/router';
import { TokenService } from 'src/app/shared/services/token.service';
import { HttpClient } from '@angular/common/http';
import { DomSanitizer } from '@angular/platform-browser';
import { Cart } from 'src/app/shared/models/cart.model';

@Component({
  selector: 'app-edit-cart',
  templateUrl: './edit-cart.component.html',
  styleUrls: ['./edit-cart.component.scss']
})
export class EditCartComponent implements OnInit {

  private path = "http://localhost:8000/api";
  product;
  user_id;
  cart_id;
  errorQuantity='Warning! Please type positive number for quantity!';

  form = {
    quantity: null
  };

  constructor(
    private cart: CartService,
    private route: ActivatedRoute,
    private token: TokenService,
    private router: Router,
    private http: HttpClient,
    public dom: DomSanitizer
  ) {}

  ngOnInit() {
    this.user_id = this.token.getUser();
    this.cart_id = this.route.snapshot.paramMap.get("id");
    this.cart.showItem(this.cart_id).subscribe(
      (response: Cart) => {
        console.log(response, "ITEM DETAILS"), (this.product = response);
      },
      error => console.log(error)
    );
  }

  updateItem(data) {
    return this.http.post(`${this.path}/updateItem/${this.cart_id}`, data);
  }

  handleResponse(data) {
    this.cart_id;
    this.user_id;
    this.router.navigateByUrl(`buy/cart/${this.user_id}`);
  }

  handleError(error) {
    error = error;
  }

  onSubmit() {
    this.updateItem({
      quantity: this.form.quantity
    }).subscribe(data => this.handleResponse(data), error => {
     console.log(error);
     this.errorQuantity='Warning! Please type positive number for quantity!';
    });
  }
}
