import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RegisterComponent } from '../register/register/register.component';
import { LoginComponent } from '../login/login/login.component';
import { AuthorizationComponent } from './authorization.component';
import { AuthorizationRoutingModule } from '../authorization-routing/authorization-routing.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [AuthorizationComponent, LoginComponent, RegisterComponent],
  imports: [
    CommonModule,
    AuthorizationRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ]
})
export class AuthorizationModule { }
