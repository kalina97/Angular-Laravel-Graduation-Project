import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import * as fromComponents  from './../components/index';

const modules: any[] = [CommonModule, RouterModule];

@NgModule({
  declarations: [...fromComponents.components],
  imports: [
  ...modules
  ],
  exports:[...modules,...fromComponents.components]
})
export class SharedModule { }
