import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from '../index/index/index.component';
import { HomeComponent } from './home.component';
import { SharedModule } from './../../../../../shared/shared/shared.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HomeRoutingModule } from './../home-routing/home-routing.module';
import { ContactComponent } from './../contact/contact.component';
import { AuthorComponent } from './../author/author.component';
import { ProfileComponent } from '../profile/profile.component';
@NgModule({
  declarations: [HomeComponent,
                 IndexComponent,
                 ContactComponent,
                AuthorComponent,
              ProfileComponent             ],
  imports: [
  



    SharedModule,
    CommonModule,
    FormsModule,
    HomeRoutingModule
    
  ]
})
export class HomeModule { }
