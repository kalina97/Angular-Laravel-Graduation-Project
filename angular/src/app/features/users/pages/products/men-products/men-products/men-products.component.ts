import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { ProductService } from '../../services/product.service';
import { Product } from 'src/app/shared/models/product.model';
import { AuthService } from 'src/app/shared/services/auth.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { LikeService } from '../../services/like.service';

@Component({
  selector: 'app-men-products',
  templateUrl: './men-products.component.html',
  styleUrls: ['./men-products.component.scss']
})
export class MenProductsComponent implements OnInit {

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
    private menProducts: ProductService,
    private like: LikeService,
    private token: TokenService,
    public dom: DomSanitizer,
    private auth: AuthService,
    //private cart: CartService
  ) {}

  ngOnInit() {
    this.auth.authStatus.subscribe(value => (this.loggedIn = value));
    this.menProducts.getMenProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
    this.user_id = +this.token.getUser();

    this.menProducts.menSortNameAscProducts().subscribe(
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
    this.menProducts.menSortNameAscProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }
  
  if(sortOrder == 'name-desc'){
    this.menProducts.menSortNameDescProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }


  if(sortOrder == 'price-asc'){
    this.menProducts.menSortPriceAscProducts().subscribe(
      (response: Product[]) => {
        console.log(response), (this.products = response);
      },
      error => {
        console.log(error.message);
      }
    );
  }

  if(sortOrder == 'price-desc'){
    this.menProducts.menSortPriceDescProducts().subscribe(
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
      this.menProducts.menSortNameAscProducts().subscribe(
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
