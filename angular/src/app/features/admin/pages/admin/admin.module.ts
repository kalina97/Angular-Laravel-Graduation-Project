import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AdminComponent } from './admin.component';
import { BrandsComponent } from '../brands/brands.component';
import { CategoriesComponent } from './../categories/categories.component';
import { ContactAnswerComponent } from './../contact-answer/contact-answer.component';
import { ProductsComponent } from './../products/products.component';
import { TrackingComponent } from './../tracking/tracking.component';
import { UsersComponent } from '../users/users.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AdminRoutingModule } from './../admin-routing/admin-routing.module';
import { ProductsModule } from './../../../users/pages/products/products/products/products.module';
import { AdminUsersService } from '../services/admin-users.service';
import { JwPaginationComponent } from 'jw-angular-pagination';

@NgModule({
  declarations: [
    AdminComponent,
    BrandsComponent,
    CategoriesComponent,
    ContactAnswerComponent,
    ProductsComponent,
    TrackingComponent,
    UsersComponent
  ],
  imports: [
  
  CommonModule,
  FormsModule,
  ReactiveFormsModule,
  AdminRoutingModule,
  ProductsModule

  ],
  providers: [AdminUsersService]
})
export class AdminModule { }
