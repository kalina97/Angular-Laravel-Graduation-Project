import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes } from '@angular/router';
import { ProductsComponent } from '../products.component';
import { MenProductsComponent } from '../../men-products/men-products/men-products.component';
import { WomenProductsComponent } from '../../women-products/women-products/women-products.component';
import { KidsProductsComponent } from '../../kids-products/kids-products/kids-products.component';
import { SportsProductsComponent } from '../../sports-products/sports-products/sports-products.component';
import { ProductDetailsComponent } from '../../product-details/product-details/product-details.component';
import { RouterModule } from '@angular/router';
import { AllProductsComponent } from '../../all-products/all-products.component';
import { NikeProductsComponent } from '../../nike-products/nike-products.component';
import { AdidasProductsComponent } from '../../adidas-products/adidas-products.component';
import { ReebokProductsComponent } from '../../reebok-products/reebok-products.component';
import { AsicsProductsComponent } from '../../asics-products/asics-products.component';
import { PumaProductsComponent } from '../../puma-products/puma-products.component';
import { NewBalanceProductsComponent } from '../../new-balance-products/new-balance-products.component';
import { HummelProductsComponent } from '../../hummel-products/hummel-products.component';

const routes : Routes = [
  {
      path: 'products',
      component: ProductsComponent,
      children: [
          {
              path: '', redirectTo: 'all-products', pathMatch: 'full'
          },
          {
            path: 'all-products', component: AllProductsComponent
          },
          {
              path: 'men-products', component: MenProductsComponent
          },
          {
              path: 'women-products', component: WomenProductsComponent
          },
          {
              path: 'kids-products', component: KidsProductsComponent
          },
          {
              path: 'sports-products', component: SportsProductsComponent
          },
          {
            path: 'nike', component: NikeProductsComponent
          },
          {
            path: 'adidas', component: AdidasProductsComponent
          },
          {
            path: 'reebok', component: ReebokProductsComponent
          },
          {
            path: 'asics', component: AsicsProductsComponent
          },
          {
            path: 'puma', component: PumaProductsComponent
          },
          {
            path: 'new-balance', component: NewBalanceProductsComponent
          },
          {
            path: 'hummel', component: HummelProductsComponent
          },
          {
              path: 'product-details/:id', component: ProductDetailsComponent
          },
          {
              path: '**', redirectTo: 'all-products'
          }
      ]
  }
];


@NgModule({
  declarations: [],
  imports: [
   CommonModule,RouterModule.forChild(routes)
  ],
  exports:[RouterModule]
})
export class ProductsRoutingModule { }
