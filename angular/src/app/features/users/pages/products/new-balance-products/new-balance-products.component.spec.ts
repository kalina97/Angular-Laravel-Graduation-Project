import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewBalanceProductsComponent } from './new-balance-products.component';

describe('NewBalanceProductsComponent', () => {
  let component: NewBalanceProductsComponent;
  let fixture: ComponentFixture<NewBalanceProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewBalanceProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewBalanceProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
