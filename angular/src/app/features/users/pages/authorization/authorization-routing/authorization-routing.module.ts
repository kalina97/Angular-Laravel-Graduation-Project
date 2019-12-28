import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes } from '@angular/router';
import { LoginComponent } from '../login/login/login.component';
import { RegisterComponent } from '../register/register/register.component';
import { RouterModule } from '@angular/router';


const routes: Routes = [
  
    {
      path: "login",
      component:LoginComponent
    },
    {
      path: "register",
      component: RegisterComponent
    }

  
];

@NgModule({
  declarations: [],
  imports: [ CommonModule,RouterModule.forChild(routes)],
  exports:[RouterModule]
})
export class AuthorizationRoutingModule { }
