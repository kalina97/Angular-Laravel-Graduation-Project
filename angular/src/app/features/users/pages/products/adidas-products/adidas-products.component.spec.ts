import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AdidasProductsComponent } from './adidas-products.component';

describe('AdidasProductsComponent', () => {
  let component: AdidasProductsComponent;
  let fixture: ComponentFixture<AdidasProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AdidasProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AdidasProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
