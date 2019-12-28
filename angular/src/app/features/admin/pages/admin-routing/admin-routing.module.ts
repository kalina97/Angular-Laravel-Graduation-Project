import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { AdminComponent } from '../admin/admin.component';
import { UsersComponent } from '../users/users.component';
import { ProductsComponent } from '../products/products.component';
import { ContactAnswerComponent } from '../contact-answer/contact-answer.component';
import { TrackingComponent } from '../tracking/tracking.component';
import { BrandsComponent } from '../brands/brands.component';
import { CategoriesComponent } from '../categories/categories.component';

const routes: Routes = [
  {
    path: "",
    component: AdminComponent,
    children: [
      {
        path: "",
        redirectTo: "users",
        pathMatch: "full"
      },
      {
        path: "users",
        component: UsersComponent
      },
      {
        path: "brands",
        component: BrandsComponent
      },
      {
        path: "categories",
        component: CategoriesComponent
      },
      {
        path: "products",
        component: ProductsComponent
      },
      {
        path: "contacts",
        component: ContactAnswerComponent
      },
      {
        path: "trackings",
        component: TrackingComponent
      },
      {
        path: "**",
        redirectTo: "users"
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
export class AdminRoutingModule { }
