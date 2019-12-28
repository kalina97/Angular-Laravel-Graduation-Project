import { Component, OnInit } from '@angular/core';
import { Product } from 'src/app/shared/models/product.model';
import { DomSanitizer } from '@angular/platform-browser';
import { ProductService } from '../services/product.service';
import { AuthService } from 'src/app/shared/services/auth.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { LikeService } from '../services/like.service';

@Component({
  selector: 'app-new-balance-products',
  templateUrl: './new-balance-products.component.html',
  styleUrls: ['./new-balance-products.component.scss']
})
export class NewBalanceProductsComponent implements OnInit {

  products: Product[];
  user_id: number;
  productsPagionation: Product[];
  pageOfItems: Array<any>;
  show: number = 6;
  loggedIn: boolean;
  //numbers;
  //oneProduct: Product;
   /*
  public form = {
    quantity: 0,
    number: 0
  };
   */
  constructor(
    private nbProducts: ProductService,
    private like: LikeService,
    private token: TokenService,
    public dom: DomSanitizer,
    private auth: AuthService,
    //private cart: CartService
  ) {}

  ngOnInit() {
    this.auth.authStatus.subscribe(value => (this.loggedIn = value));
    this.nbProducts.getNBProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
    this.user_id = +this.token.getUser();

    this.nbProducts.nbSortNameAscProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }


  onChangePage(pageOfItems: Array<any>) {
    this.pageOfItems = pageOfItems;
  }

  onChange(event) {
    console.log(event);
    this.show= +event;
  }

  //sorting data
  sort(sortOrder:any){
    if(sortOrder == 'name-asc'){
    this.nbProducts.nbSortNameAscProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }
  
  if(sortOrder == 'name-desc'){
    this.nbProducts.nbSortNameDescProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }


  if(sortOrder == 'price-asc'){
    this.nbProducts.nbSortPriceAscProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }

  if(sortOrder == 'price-desc'){
    this.nbProducts.nbSortPriceDescProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }
  


  }

  //like methods

  onLike(product_id) {
    console.log(this.user_id);
    return this.like.like(+product_id, this.user_id).subscribe(response =>
      this.nbProducts.nbSortNameAscProducts().subscribe(
        (response: Product[]) => {
          console.log(response), (this.products = response);
        },
        error => {
          console.log(error);
        }
      )
    );
  }


}
