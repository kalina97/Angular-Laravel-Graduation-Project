import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import { CartComponent } from '../cart/cart.component';
import { CheckoutComponent } from '../checkout/checkout.component';
import { EditCartComponent } from '../edit-cart/edit-cart.component';

const routes: Routes = [
  { path: "cart/:id", component: CartComponent },
  { path: "checkout", component: CheckoutComponent },
  { path: "cart/edit/:id", component: EditCartComponent }
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,RouterModule.forChild(routes)
  ],
  exports: [RouterModule]
})
export class CartRoutingModule { }
