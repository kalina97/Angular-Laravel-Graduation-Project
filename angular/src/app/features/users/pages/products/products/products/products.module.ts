import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MenProductsComponent } from '../../men-products/men-products/men-products.component';
import { WomenProductsComponent } from '../../women-products/women-products/women-products.component';
import { KidsProductsComponent } from '../../kids-products/kids-products/kids-products.component';
import { SportsProductsComponent } from '../../sports-products/sports-products/sports-products.component';
import { ProductDetailsComponent } from '../../product-details/product-details/product-details.component';
import { ProductsComponent } from '../products.component';
import { ProductsRoutingModule } from '../products-routing/products-routing.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AllProductsComponent } from './../../all-products/all-products.component';
import { JwPaginationComponent } from 'jw-angular-pagination';
import { NikeProductsComponent } from './../../nike-products/nike-products.component';
import { AdidasProductsComponent } from './../../adidas-products/adidas-products.component';
import { AsicsProductsComponent } from './../../asics-products/asics-products.component';
import { ReebokProductsComponent } from './../../reebok-products/reebok-products.component';
import { PumaProductsComponent } from './../../puma-products/puma-products.component';
import { NewBalanceProductsComponent } from './../../new-balance-products/new-balance-products.component';
import { HummelProductsComponent } from './../../hummel-products/hummel-products.component';


@NgModule({
  declarations: [
    MenProductsComponent,
    WomenProductsComponent,
    KidsProductsComponent,
    SportsProductsComponent,
    ProductDetailsComponent,
    ProductsComponent,
    AllProductsComponent,
    NikeProductsComponent,
    AdidasProductsComponent,
    AsicsProductsComponent,
    ReebokProductsComponent,
    PumaProductsComponent,
    NewBalanceProductsComponent,
    HummelProductsComponent,
    JwPaginationComponent
  ],
  imports: [
    CommonModule,
    ProductsRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  exports:[JwPaginationComponent]
})
export class ProductsModule { }
