import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CartComponent } from './cart.component';
import { CheckoutComponent } from './../checkout/checkout.component';
import { CartCheckoutComponent } from '../cart-checkout/cart-checkout.component';
import { EditCartComponent } from '../edit-cart/edit-cart.component';
import { FormsModule } from '@angular/forms';
import { CartRoutingModule } from '../cart-routing/cart-routing.module';


@NgModule({
  declarations: [CartComponent,
                 CheckoutComponent,
                 CartCheckoutComponent,
                 EditCartComponent
  ],
  imports: [
  CommonModule,
  FormsModule,
  CartRoutingModule
  ]
})
export class CartModule { }
