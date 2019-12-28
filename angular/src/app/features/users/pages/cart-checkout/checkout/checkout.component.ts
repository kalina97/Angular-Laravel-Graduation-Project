import { Component, OnInit } from '@angular/core';
import { Checkout } from 'src/app/shared/models/checkout.model';
import { Cart } from 'src/app/shared/models/cart.model';
import { HttpClient } from '@angular/common/http';
import { TokenService } from 'src/app/shared/services/token.service';
import { AuthService } from 'src/app/shared/services/auth.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.scss']
})
export class CheckoutComponent implements OnInit {

  private path = "http://localhost:8000/api";
  user_id;
  checkoutItems: Checkout[];
  priceArray: number[];
  fullPrice: number;
  data: Cart[];

  constructor(private http: HttpClient, private token: TokenService, private auth: AuthService, public dom: DomSanitizer) {}

  ngOnInit() {
    this.user_id = this.token.getUser();
    console.log(this.user_id);
    this.data = history.state.data;

    this.priceArray = this.data.map(item => +item.price * item.quantity);

    this.fullPrice = this.priceArray.reduce((previous, current) => {
      return previous + current;
    }, 0);

  }

}
