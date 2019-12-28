import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { TestService } from "./test.service";
import { HttpClientModule } from "@angular/common/http";
import { SharedModule } from './shared/shared/shared.module';
import { HomeModule } from './features/users/pages/home/home/home.module';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { AuthorizationModule } from './features/users/pages/authorization/authorization/authorization.module';
import { ProductsModule } from './features/users/pages/products/products/products/products.module';
import { NikeProductsComponent } from './features/users/pages/products/nike-products/nike-products.component';
import { AdidasProductsComponent } from './features/users/pages/products/adidas-products/adidas-products.component';
import { AsicsProductsComponent } from './features/users/pages/products/asics-products/asics-products.component';
import { ReebokProductsComponent } from './features/users/pages/products/reebok-products/reebok-products.component';
import { PumaProductsComponent } from './features/users/pages/products/puma-products/puma-products.component';
import { NewBalanceProductsComponent } from './features/users/pages/products/new-balance-products/new-balance-products.component';
import { HummelProductsComponent } from './features/users/pages/products/hummel-products/hummel-products.component';
import { TokenService } from './shared/services/token.service';
import { LogRegService } from './shared/services/log-reg.service';
import { AuthService } from './shared/services/auth.service';
import { CartCheckoutComponent } from './features/users/pages/cart-checkout/cart-checkout/cart-checkout.component';
import { CheckoutComponent } from './features/users/pages/cart-checkout/checkout/checkout.component';
import { EditCartComponent } from './features/users/pages/cart-checkout/edit-cart/edit-cart.component';
import { ProfileComponent } from './features/users/pages/home/profile/profile.component';
import { AdminComponent } from './features/admin/pages/admin/admin.component';
import { BrandsComponent } from './features/admin/pages/brands/brands.component';
import { CategoriesComponent } from './features/admin/pages/categories/categories.component';
import { UsersComponent } from './features/admin/pages/users/users.component';
import { ProductsComponent } from './features/admin/pages/products/products.component';
import { TrackingComponent } from './features/admin/pages/tracking/tracking.component';
import { ContactAnswerComponent } from './features/admin/pages/contact-answer/contact-answer.component';
import { JwPaginationComponent } from 'jw-angular-pagination';
import { AdminModule } from './features/admin/pages/admin/admin.module';

@NgModule({
  declarations: [AppComponent],
  imports: [BrowserModule, 
            AppRoutingModule, 
            HttpClientModule,
            SharedModule,
            HomeModule,
            RouterModule,
            FormsModule,
            AuthorizationModule,
            ProductsModule
           
        ],
providers: [TestService,
  TokenService,
  LogRegService,
  AuthService

],
  bootstrap: [AppComponent]
})
export class AppModule {}
