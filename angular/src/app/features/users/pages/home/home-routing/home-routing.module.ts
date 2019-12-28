import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes } from '@angular/router';
import { HomeComponent } from '../home/home.component';
import { IndexComponent } from '../index/index/index.component';
import { RouterModule } from '@angular/router';
import { ContactComponent } from './../contact/contact.component';
import { AuthorComponent } from '../author/author.component';
import { ProfileComponent } from '../profile/profile.component';
import { AuthGuard } from 'src/app/shared/services/guards/auth.guard';

const routes: Routes = [
  {
    path: "",
    component: HomeComponent,
    children: [
      {
        path: "",
        redirectTo: "home",
        pathMatch: "full"
      },
      {
        path: "",
        component: IndexComponent
      },
      {
        path: "contact",
        component: ContactComponent
      },
      {
        path: "author",
        component: AuthorComponent
      },
      {
        path: "profile",
        component: ProfileComponent,
        canActivate: [AuthGuard]
      },
    
      {
        path: "**",
        redirectTo: "home"
      }
    ]
  }
];

@NgModule({
  declarations: [],
  imports: [
  CommonModule,
  RouterModule.forChild(routes)
  ],
  exports:[RouterModule]
})
export class HomeRoutingModule { }
