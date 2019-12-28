import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HummelProductsComponent } from './hummel-products.component';

describe('HummelProductsComponent', () => {
  let component: HummelProductsComponent;
  let fixture: ComponentFixture<HummelProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HummelProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HummelProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
