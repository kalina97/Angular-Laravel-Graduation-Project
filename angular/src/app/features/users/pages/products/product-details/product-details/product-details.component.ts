import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { HttpClient } from '@angular/common/http';
import { ProductService } from '../../services/product.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Product } from 'src/app/shared/models/product.model';
import { AuthService } from 'src/app/shared/services/auth.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { CartService } from '../../../cart-checkout/services/cart.service';
import { Cart } from 'src/app/shared/models/cart.model';
import { LikeService } from '../../services/like.service';


@Component({
  selector: 'app-product-details',
  templateUrl: './product-details.component.html',
  styleUrls: ['./product-details.component.scss']
})
export class ProductDetailsComponent implements OnInit {

  private path = "http://localhost:8000/api/addToCart";
  loggedIn: boolean;
  //numbers;
  product_id: number;

  public form = {
    quantity: 0
  };
  

  constructor(
    private product: ProductService,
    private route: ActivatedRoute,
    private router: Router,
    private auth: AuthService,
    private token: TokenService,
    private http: HttpClient,
    private like: LikeService,
    public dom: DomSanitizer,
    private cart: CartService
  ) {
    
  }

  details;
  user_id;
  error = [];
  errorQuantity='Warning! Please type positive number for quantity!';

  ngOnInit() {
    this.product_id = +this.route.snapshot.paramMap.get("id");
    this.auth.authStatus.subscribe(value => (this.loggedIn = value));

    this.user_id = +this.token.getUser();
    console.log(this.user_id);

    this.product.getProductDetails(this.product_id).subscribe(
      (response: Product) => {
        console.log(response);
        this.details = response;
      },
      error => {
        console.log(error);
      }
    );
  }


  /* Adding item to cart */
  onSubmit() {
    this.cart
      .addToCart(
        +this.user_id,
        +this.product_id,
        +this.form.quantity
      )
      .subscribe(
        (response: Cart) => {
          console.log(response),
            this.router.navigateByUrl(`/buy/cart/${this.user_id}`);
        },
        error => {
          console.log(error);
          
          this.errorQuantity='Warning! Please type positive number for quantity!';

        }
      );
  }

  //like method

  onLike(product_id) {
    return this.like.like(+product_id, this.user_id).subscribe(response =>
      this.product.getProductDetails(this.product_id).subscribe(
        (response: Product) => {
          console.log(response);
          this.details = response;
        },
        error => {
          console.log(error);
        }
      )
    );
  }


}
