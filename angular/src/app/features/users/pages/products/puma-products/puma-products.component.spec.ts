import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PumaProductsComponent } from './puma-products.component';

describe('PumaProductsComponent', () => {
  let component: PumaProductsComponent;
  let fixture: ComponentFixture<PumaProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PumaProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PumaProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
