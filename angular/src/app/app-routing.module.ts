import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { AuthGuard } from './shared/services/guards/auth.guard';
import { NoAuthGuard } from './shared/services/guards/no-auth.guard';
import { AdminGuard } from './shared/services/guards/admin.guard';
//import { NoAuthGuard } from './shared/services/guards/no-auth.guard';


const routes: Routes = [
  {
    path: "",
    loadChildren: "./features/users/pages/home/home/home.module#HomeModule"
  },
  {
  path: "auth",
  canActivate:[NoAuthGuard],
  loadChildren: "./features/users/pages/authorization/authorization/authorization.module#AuthorizationModule"
  },
  {
    path: "admin",
    canActivate: [AdminGuard],
    loadChildren: "./features/admin/pages/admin/admin.module#AdminModule"
  },
  {
    path:"products",
    loadChildren:"./features/users/pages/products/products/products/products.module#ProductsModule"
  },
  {
    path: "buy",
    canActivate: [AuthGuard],
    loadChildren: "./features/users/pages/cart-checkout/cart/cart.module#CartModule"
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
